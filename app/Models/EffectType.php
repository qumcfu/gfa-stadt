<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EffectType extends Model
{
    use HasFactory;

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function healthImpacts(): HasMany
    {
        return $this->hasMany(HealthImpact::class);
    }

    public function isLast(): bool
    {
        return EffectType::max('order_id') === $this['order_id'];
    }

    public function getMeanValue(Project $project, string $key): float
    {
        $sum = 0.0;

        $stageType = ProjectStageType::where('shortname', '=', 'appraisal')->first();
        $entries = $project->getEntries($stageType);
        $stageCount = count($project->getActiveStagesOfType($stageType));
        if($stageCount === 0) return 0.0;

        foreach ($entries as $entry)
        {
            if(!isset($entry['content'])) continue;
            foreach ($entry['content']['effects'] as $effect)
            {
                if($effect['effect_type_id'] === $this['id'])
                {
                    $positiveSize =  $effect->getPositiveSize();
                    $negativeSize = $effect->getNegativeSize();
                    if(($entry['positive'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $positiveSize > 0) $sum += $positiveSize;
                    if(($entry['negative'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $negativeSize > 0) $sum += $negativeSize;
                    if(($entry['positive'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $positiveSize < 0) $sum += $positiveSize;
                    if(($entry['negative'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $negativeSize < 0) $sum += $negativeSize;
                }
            }
        }

        return $sum / $stageCount;
    }

    public function getMeanValueForQuestionnaire(Project $project, Questionnaire $questionnaire, string $key): float
    {
        $sum = 0.0;

        $threshold = 0;
        $appraisalItems = $questionnaire['screeningQuestionnaire']->getAppraisalItems($project);
        foreach ($appraisalItems as $appraisalItem)
        {
            $effects = $appraisalItem['effects'];
            foreach ($effects as $effect)
            {
                if($effect['effect_type_id'] === $this['id'] && (($effect['size_y'] ?? 0) !== 0 || ($effect['size_n'] ?? 0) !== 0))
                {
                    $max = max(abs($effect['size_y'] ?? 0), abs($effect['size_n'] ?? 0));
                    $threshold += $max;
                }
            }
        }
        $threshold = max($threshold, 1);
        
        foreach ($appraisalItems as $content)
        {
            $answerCount = 0;
            $contentSum = 0.0;
            foreach ($content->getEntries($project) as $entry)
            {
                if(!$entry->isValid()) continue;
                foreach ($entry['content']['effects'] as $effect)
                {
                    if($effect['effect_type_id'] === $this['id'])
                    {
                        $positiveSize = $effect->getPositiveSize();
                        $negativeSize = $effect->getNegativeSize();
                        if(($entry['positive'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $positiveSize > 0) $contentSum += $positiveSize;
                        if(($entry['negative'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $negativeSize > 0) $contentSum += $negativeSize;
                        if(($entry['positive'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $positiveSize < 0) $contentSum -= $positiveSize;
                        if(($entry['negative'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $negativeSize < 0) $contentSum -= $negativeSize;
                    }
                }
                if(($entry['positive'] ?? 0) !== -1) $answerCount++; // don't count "unknown" answers
            }
            if($answerCount === 0) continue;
            $sum += $contentSum / $answerCount;
        }

        return $sum / $threshold;
    }

    public function getMeanValueForStageAndQuestionnaire(Project $project, ProjectStage $stage, Questionnaire $questionnaire, string $key): float
    {
        $sum = 0.0;

        $threshold = 0;
        $appraisalItems = $questionnaire['screeningQuestionnaire']->getAppraisalItems($project);
        foreach ($appraisalItems as $appraisalItem)
        {
            if(!$appraisalItem['screeningItem']->isFocused($project)) continue;
            $effects = $appraisalItem['effects'];
            foreach ($effects as $effect)
            {
                if(($effect['size_y'] ?? 0) !== 0 || ($effect['size_n'] ?? 0) !== 0)
                {
                    $max = max(abs($effect['size_y'] ?? 0), abs($effect['size_y'] ?? 0));
                    $threshold += $max;
                }
            }
        }
        $threshold = max($threshold, 1);
        
        foreach ($questionnaire['contents'] as $content)
        {
            if(!$content['screeningItem']->isFocused($project)) continue;
            $answerCount = 0;
            $contentSum = 0.0;
            $entry = $content->getEntry($stage);
            if(isset($entry))
            {
                foreach ($entry['content']['effects'] as $effect)
                {
                    if($effect['effect_type_id'] === $this['id'])
                    {
                        $positiveSize =  $effect->getPositiveSize();
                        $negativeSize = $effect->getNegativeSize();
                        if(($entry['positive'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $positiveSize > 0) $contentSum += $positiveSize;
                        if(($entry['negative'] ?? 0) > 0 && in_array($key, ['positive', 'yes']) && $negativeSize > 0) $contentSum += $negativeSize;
                        if(($entry['positive'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $positiveSize < 0) $contentSum -= $positiveSize;
                        if(($entry['negative'] ?? 0) > 0 && in_array($key, ['negative', 'no']) && $negativeSize < 0) $contentSum -= $negativeSize;
                    }
                }
                if(($entry['positive'] ?? 0) !== -1) $answerCount++; // don't count "unknown" answers
            }
            if($answerCount === 0) continue;
            $sum += $contentSum / $answerCount;
        }

        return $sum / $threshold;
    }

    public function isRelevant(Project $project, string $key = 'all'): bool
    {
        $settings = $project['settings'];
        $operator = $settings['operator'];

        switch ($operator)
        {
            case '>=':
                if(in_array($key, ['positive', 'all']) && $this->getMeanValue($project, 'positive') >= $settings['mean_pos_effects_th']) return true;
                if(in_array($key, ['negative', 'all']) && abs($this->getMeanValue($project, 'negative')) >= $settings['mean_neg_effects_th']) return true;
                if(in_array($key, ['positive', 'all']) && $this->getMaxValue($project, 'positive') >= $settings['max_pos_effects_th']) return true;
                if(in_array($key, ['negative', 'all']) && abs($this->getMaxValue($project, 'negative')) >= $settings['max_neg_effects_th']) return true;
                break;
            case '>':
                if(in_array($key, ['positive', 'all']) && $this->getMeanValue($project, 'positive') > $settings['mean_pos_effects_th']) return true;
                if(in_array($key, ['negative', 'all']) && abs($this->getMeanValue($project, 'negative')) > $settings['mean_neg_effects_th']) return true;
                if(in_array($key, ['positive', 'all']) && $this->getMaxValue($project, 'positive') > $settings['max_pos_effects_th']) return true;
                if(in_array($key, ['negative', 'all']) && abs($this->getMaxValue($project, 'negative')) > $settings['max_neg_effects_th']) return true;
                break;
        }
        return false;
    }
}
