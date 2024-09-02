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

use App\Traits\TimeStampTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectStage extends Model
{
    use HasFactory;

    // colors are also defined in project and entry models
    public string $positiveColor = '#198754';
    public string $mostlyPositiveColor = '#9acd32';
    public string $neutralColor = '#ffc107';
    public string $mostlyNegativeColor = '#fd7e14';
    public string $negativeColor = '#dc3545';
    public string $potentialColor = '#0d6efd';
    public string $darkColor = '#212529';

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class, 'stage_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectStageType::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getProject(): Project
    {
        return $this['membership']['project'];
    }

    public function getUsername(): string
    {
        return $this['membership']['user']['username'] ?? __('Unknown User');
    }

    public function getEntry(Content $content)
    {
        return $this['entries']->where('content_id', '=', $content['id'])->first();
    }

    public function getEntries(ProjectStageType $stageType)
    {
        return $this['entries']->where('stage.type_id', '=', $stageType['id']);
    }

    public function getTimestampOfLatestEntry($includeEditor = false, $html = false)
    {
        return $this['entries']->sortByDesc('updated_at')->first()->getUpdatedAtTimestamp($includeEditor, $html) ?? null;
    }

    public function getSortedEntries()
    {
        return $this['entries']->sortBy('content.order_id')->sortBy('content.questionnaire.order_id');
    }

    public function getFocusedEntryCount(): int
    {
        $filteredEntries = new Collection();
        foreach ($this['entries'] as $entry)
        {
            $screeningItem = $entry['content']['screeningItem'] ?? null;
            if(is_null($screeningItem) || $screeningItem->isFocused($this['membership']['project']))
            {
                $filteredEntries->push($entry);
            }
        }
        return count($filteredEntries);
    }

    public function getEffectScore(Questionnaire $questionnaire, EffectType $effectType, bool $detailed = false): int|array
    {
        $positive = 0;
        $negative = 0;
        $entries = $this['entries']->where('content.questionnaire.id', '=', $questionnaire['id']);
        foreach ($entries as $entry)
        {
            if($entry['positive'] > 0)
            {
                foreach ($entry['content']['effects'] as $effect)
                {
                    if($effect['type']['id'] === $effectType['id'])
                    {
                        if($effect['size_y'] > 0 && $effect['type']['is_positive']) $positive += $effect['size_y'];
                        else if($effect['size_y'] < 0 && $effect['type']['is_positive']) $negative -= $effect['size_y'];
                        else if($effect['size_y'] > 0 && !$effect['type']['is_positive']) $negative += $effect['size_y'];
                        else if($effect['size_y'] < 0 && !$effect['type']['is_positive']) $positive -= $effect['size_y'];
                    }
                }
            }
            if($entry['negative'] > 0)
            {
                foreach ($entry['content']['effects'] as $effect)
                {
                    if($effect['type']['id'] === $effectType['id'])
                    {
                        if($effect['size_n'] > 0 && $effect['type']['is_positive']) $positive += $effect['size_n'];
                        else if($effect['size_n'] < 0 && $effect['type']['is_positive']) $negative -= $effect['size_n'];
                        else if($effect['size_n'] > 0 && !$effect['type']['is_positive']) $negative += $effect['size_n'];
                        else if($effect['size_n'] < 0 && !$effect['type']['is_positive']) $positive -= $effect['size_n'];
                    }
                }
            }
        }
        if(!$detailed) return $positive - $negative;
        else return ['total' => $positive - $negative, 'positive' => $positive, 'negative' => $negative];
    }

    public function getEffectTypeCount(Questionnaire $questionnaire): int
    {
        $types = [];
        $entries = $this['entries']->where('content.questionnaire.id', '=', $questionnaire['id']);

        foreach ($entries as $entry)
        {
            if($entry['positive'] > 0 || $entry['negative'] > 0)
            {
                foreach ($entry['content']['effects'] as $effect)
                {
                    if(!isset($types[$effect['type']['id']])) $types[$effect['type']['id']] = 0;
                }
            }
        }
        return sizeof($types);
    }

    public function getQuestionnaires() {
        if($this['type']['shortname'] === 'screening')
        {
            $typeIds = ProjectStageType::where('shortname', '=', 'screening')->orWhere('shortname', '=', 'scoping')->pluck('id');
            return Questionnaire::whereIn('type_id', $typeIds)->get();
        }
        return Questionnaire::where('type_id', '=', $this['type']['id'])->get();
    }

    // returns the questionnaire with the lowest stage_order_id that has not been completed (or null)
    public function getCurrentQuestionnaire(): Questionnaire|null
    {
        $questionnaires = $this->getQuestionnaires();
        if($this['complete'])
        {
            if($this['type']['shortname'] === 'appraisal')
            {
                foreach ($questionnaires as $questionnaire)
                {
                    if ($questionnaire['screeningQuestionnaire']->hasFocusedContent($this['membership']['project'])) return $questionnaire;
                }
            }
            return $questionnaires[0] ?? null;
        }
        foreach ($questionnaires as $questionnaire)
        {
            // if this is an appraisal stage, skip questionnaires without focused contents
            if($this['type']['shortname'] === 'appraisal' && isset($questionnaire['screeningQuestionnaire']) && !$questionnaire['screeningQuestionnaire']->hasFocusedContent($this['membership']['project'])) continue;
            if (!$this->hasCompletedQuestionnaire($questionnaire)) return $questionnaire;
        }
        return null;
    }

    // returns the questionnaire with the highest stage_order_id
    public function getLastQuestionnaire(): Questionnaire
    {
        $questionnaires = $this->getQuestionnaires();
        return $questionnaires->where('stage_order_id', '=', $questionnaires->max('stage_order_id'))->first();
    }

    public function getEntriesWithImpact()
    {
        return $this['entries']->filter->hasImpact()->values();
    }

    public function getEntriesWithPositiveImpact()
    {
        // returns screening items only!
        return $this['entries']->where('content.type.shortname', '=', 'screening-item')->where('positive', '>', 0)->sortByDesc(function ($entry, $key) {
            return $entry['positive'] - ($entry['negative'] ?? 0) * 0.01;
        });
    }

    public function getEntriesWithNegativeImpact()
    {
        // returns screening items only!
        return $this['entries']->where('content.type.shortname', '=', 'screening-item')->where('negative', '>', 0)->sortByDesc(function ($entry, $key) {
            return $entry['negative'] - ($entry['positive'] ?? 0) * 0.01;
        });
    }

    public function getEntriesWithPotential()
    {
        return $this->getEntriesWithImpact()->filter->hasPotential()->values()->sortByDesc(function ($entry, $key) {
            return $entry['potential'] * ($entry['negative'] ?? 0);
        });
    }

    public function hasCompletedQuestionnaire(Questionnaire $questionnaire): bool
    {
        // works only for screening and appraisal stages
        $contentIds = $questionnaire['contents']->pluck('id');
        $entries = $this['entries']->whereIn('content_id', $contentIds);
        $entryContentIds = $entries?->pluck('content_id');

        if($contentIds->sum() !== $entryContentIds?->sum() ?? 0) return false;
        foreach ($entries as $entry)
        {
              if(!isset($entry['positive']) && !isset($entry['negative'])) return false;
        }
        return true;
    }

    public function getProgressForQuestionnaire(Questionnaire $questionnaire): float
    {
        $maxEntries = $questionnaire->getContentCount($this['membership']['project']);
        if ($maxEntries === 0) return 0;

        $entries = 0;
        $appMode = $this['membership']['project']['app_mode'];
        foreach ($this['entries']->where('content.questionnaire_id', '=', $questionnaire['id']) as $entry)
        {
            if(($entry['content']['priority'] ?? 0) < $appMode) continue;
            $screeningItem = $entry['content']['screeningItem'];
            if(isset($screeningItem) && !$screeningItem->isFocused($this['membership']['project'])) continue;
            if(isset($entry['positive']) || isset($entry['negative'])) $entries++;
        }

        return $entries / (float)$maxEntries;
    }

    public function getPositiveValuesAsStrings(): array
    {
        $positiveMean = '';
        $positiveMax = '';
        $questionnaires = Questionnaire::where('type_id', '=', $this['type_id'])->get();
        foreach ($questionnaires as $key => $questionnaire)
        {
            $entries = $this['entries']->where('content.questionnaire_id', '=', $questionnaire['id']);
            $values = $this->getPositiveValues($entries);
            $positiveMean .= ($values['mean'] >= 0.0 ? $values['mean'] : 0) . ($key < count($questionnaires) - 1 ? ',' : '');
            $positiveMax .= $values['max'] . ($key < count($questionnaires) - 1 ? ',' : '');
        }
        return ['mean' => $positiveMean, 'max' => $positiveMax];
    }

    public function getNegativeValuesAsStrings(): array
    {
        $negativeMean = '';
        $negativeMax = '';
        $questionnaires = Questionnaire::where('type_id', '=', $this['type_id'])->get();
        foreach ($questionnaires as $key => $questionnaire)
        {
            $entries = $this['entries']->where('content.questionnaire_id', '=', $questionnaire['id']);
            $values = $this->getNegativeValues($entries);
            $negativeMean .= ($values['mean'] >= 0.0 ? $values['mean'] : 0) . ($key < count($questionnaires) - 1 ? ',' : '');
            $negativeMax .= $values['max'] . ($key < count($questionnaires) - 1 ? ',' : '');
        }
        return ['mean' => $negativeMean, 'max' => $negativeMax];
    }

    public function getPotentialValuesAsStrings(): array
    {
        $potentialMean = '';
        $potentialMax = '';
        $questionnaires = Questionnaire::where('type_id', '=', $this['type_id'])->get();
        foreach ($questionnaires as $key => $questionnaire)
        {
            $entries = $this['entries']->where('content.questionnaire_id', '=', $questionnaire['id']);
            $values = $this->getPotentialValues($entries);
            $potentialMean .= ($values['mean'] >= 0.0 ? $values['mean'] : 0) . ($key < count($questionnaires) - 1 ? ',' : '');
            $potentialMax .= $values['max'] . ($key < count($questionnaires) - 1 ? ',' : '');
        }
        return ['mean' => $potentialMean, 'max' => $potentialMax];
    }

    public function getPositiveValues($entries): array
    {
        $total = 0.0;
        $max = 0.0;
        $count = 0;
        foreach ($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $score = $entry->getPositiveScore();
                $total += $score;
                if($score > $max) $max = $score;
                $count++;
            }
        }
        $mean = $count > 0 ? ($total / $count) : -1.0;
        return ['mean' => $mean, 'max' => $max];
    }

    public function getNegativeValues($entries): array
    {
        $total = 0.0;
        $max = 0.0;
        $count = 0;
        foreach ($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $score = $entry->getNegativeScore();
                $total += $score;
                if($score > $max) $max = $score;
                $count++;
            }
        }
        $mean = $count > 0 ? ($total / $count) : -1.0;
        return ['mean' => $mean, 'max' => $max];
    }

    public function getPotentialValues($entries): array
    {
        $total = 0.0;
        $max = 0.0;
        $count = 0;
        foreach ($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $score = $entry->getPotentialScore();
                $total += $score;
                if($score > $max) $max = $score;
                $count++;
            }
        }
        $mean = $count > 0 ? ($total / $count) : -1.0;
        return ['mean' => $mean, 'max' => $max];
    }

    public function getImportanceValues($entries): array
    {
        $total = 0.0;
        $max = 0.0;
        $count = 0;
        foreach ($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $score = $entry->getImportance();
                $total += $score;
                if($score > $max) $max = $score;
                $count++;
            }
        }
        $mean = $count > 0 ? ($total / $count) : -1.0;
        return ['mean' => $mean, 'max' => $max];
    }

    public function getStageInfo(Questionnaire $questionnaire)
    {
        $info = [];

        $entries = $this['entries']->where('content.questionnaire_id', '=', $questionnaire['id']);
        $info['positiveMean'] = $this->getPositiveValues($entries)['mean'];
        $info['negativeMean'] = $this->getNegativeValues($entries)['mean'];
        $info['potentialMean'] = $this->getPotentialValues($entries)['mean'];

        $distributionString = $this->distributionToString($entries);
        $importanceString = $this['membership']['project']->impactToString($this->getImportanceValues($entries)['mean']);

        $info['iconName'] = $this->getDistributionMeanIconName($entries);
        $info['iconColor'] = $this->getDistributionMeanIconColor($distributionString);

        $mainContentType = $questionnaire->getMainContentType();
        if ($mainContentType === 'screening-item') $info['iconTooltip'] = $this->getDistributionMeanTooltip($distributionString, $importanceString);
        if ($mainContentType === 'vulnerable-group-item') $info['iconTooltip'] = __('On average, :name estimates the impact on vulnerable groups to be :impact.', ['name' => $this['membership']['user']['username'] ?? __('Unknown User'), 'impact' => __($distributionString)]);

        return $info;
    }

    public function getDistributionMeanIconName($entries): string
    {
        $totalImportance = 0.0;
        $count = 0;
        $noImpactCount = 0;
        $unknownCount = 0;
        foreach($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $totalImportance += ($entry->getImportance() ?? 0.0);
                $count++;
            }
            else if ($entry->hasUnknownImpact()) $unknownCount++;
            else if ($entry->hasBeenRated()) $noImpactCount++;
        }
        if($count === 0 && $noImpactCount === 0 && $unknownCount === 0) return 'exclamation-circle-fill';
        if($count === 0 && $unknownCount >= $noImpactCount) return 'question-circle';
        if($count === 0 && $noImpactCount > $unknownCount) return 'x-circle';
        $importance = $totalImportance / max($count, 1);

        if ($importance > 3.33) return 'circle-fill';
        if ($importance > 1.66) return 'circle-half';
        return 'circle';
    }

    public function getDistributionMeanIconColor($distributionString): string
    {
        switch($distributionString)
        {
            case 'positive': return $this->positiveColor;
            case 'mostly positive': return $this->mostlyPositiveColor;
            case 'neutral': return $this->neutralColor;
            case 'mostly negative': return $this->mostlyNegativeColor;
            case 'negative': return $this->negativeColor;
            default: return $this->darkColor;
        }
    }

    public function getDistributionMeanTooltip($distributionString, $importanceString): string
    {
        switch($distributionString)
        {
            case 'not rated': return __(':name has not yet rated this area.', ['name' => $this->getUsername()]);
            case 'unknown': return __(':name has indicated the impact in this area as unknown.', ['name' => $this->getUsername()]);
            case 'non-existent': return __(':name has indicated that the measures have no impact on this area.', ['name' => $this->getUsername()]);
            case 'unknown or non-existent': return __(':name has indicated that the measures have unknown or no impact on this area.', ['name' => $this->getUsername()]);
            default: return __(':name has assessed the impact of the measures in this area as :distribution and :importance on average.', ['name' => $this->getUsername(), 'distribution' => __($distributionString), 'importance' => __($importanceString)]);
        }
    }

    private function distributionToString($entries): string
    {
        $totalPositive = 0.0;
        $totalNegative = 0.0;
        $count = 0;
        $noImpactCount = 0;
        $unknownCount = 0;
        foreach($entries as $entry)
        {
            if ($entry->hasImpact())
            {
                $totalPositive += ($entry->getPositiveScore() ?? 0.0);
                $totalNegative += ($entry->getNegativeScore() ?? 0.0);
                $count++;
            }
            else if ($entry->hasUnknownImpact()) $unknownCount++;
            else if ($entry->hasBeenRated()) $noImpactCount++;
        }

        if($count === 0)
        {
            if($noImpactCount === 0 && $unknownCount === 0) return 'not rated';
            if($noImpactCount > 0 && $unknownCount === 0) return 'non-existent';
            if($noImpactCount === 0 && $unknownCount > 0) return 'unknown';
            return 'unknown or non-existent';
        }

        $positive = $totalPositive / $count;
        $negative = $totalNegative / $count;

        if ($positive == 0 && $negative > 0) return 'negative';
        if ($positive > 0 && $negative == 0) return 'positive';
        if (abs($positive - $negative) < 1) return 'neutral';
        if ($positive < $negative) return 'mostly negative';
        if ($positive > $negative) return 'mostly positive';

        return 'unknown';
    }

    public function getSummaryData(Collection $questionnaires): array
    {
        set_time_limit(300);

        $effectTypes = EffectType::all();
        $healthImpactTypes = HealthImpactType::all();

        $data = [];

        // calculate data on how QUESTIONNAIRES affect effects and health impacts
        foreach($effectTypes as $type) $data['questionnaires'][0]['effects'][$type['id']] = [ 'positive' => 0, 'negative' => 0 ];
        foreach($healthImpactTypes as $type) $data['questionnaires'][0]['healthImpacts'][$type['id']] = [ 'value' => 0, 'normalized' => 0 ];

        foreach ($questionnaires as $questionnaire)
        {
            $effects = array();
            $healthImpacts = array();

            foreach ($effectTypes as $type)
            {
                $effects[$type['id']] = [ 'positive' => 0, 'negative' => 0 ];
            }

            foreach ($healthImpactTypes as $type)
            {
                $healthImpacts[$type['id']] = [ 'value' => 0, 'normalized' => 0 ];
            }

            foreach ($effectTypes as $effectType)
            {
                $positive = $effectType->getMeanValueForStageAndQuestionnaire($this['membership']['project'], $this, $questionnaire, 'positive');
                $negative = $effectType->getMeanValueForStageAndQuestionnaire($this['membership']['project'], $this, $questionnaire, 'negative');

                $data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxPositive'] = max($data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxPositive'] ?? 0, $positive);
                $data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxNegative'] = max($data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxNegative'] ?? 0, $negative);

                $data['questionnaires'][0]['effects'][$effectType['id']]['positive'] += $positive;
                $data['questionnaires'][0]['effects'][$effectType['id']]['negative'] += $negative;
                $data['questionnaires'][0]['misc']['effects']['maxPositive'] = max($data['questionnaires'][0]['misc']['effects']['maxPositive'] ?? 0, $positive);
                $data['questionnaires'][0]['misc']['effects']['maxNegative'] = max($data['questionnaires'][0]['misc']['effects']['maxNegative'] ?? 0, $negative);

                $difference = $positive - $negative;
                foreach($effectType['healthImpacts'] as $healthImpact)
                {
                    $value = $difference * ($healthImpact['type']['is_positive'] ? 1.0 : -1.0);
                    $healthImpacts[$healthImpact['type']['id']]['value'] += $value;
                    $healthImpacts[$healthImpact['type']['id']]['normalized'] += $difference;
                    $data['questionnaires'][$questionnaire['id']]['misc']['healthImpacts']['maxNormalized'] = max($data['questionnaires'][$questionnaire['id']]['misc']['healthImpacts']['maxNormalized'] ?? 0, $difference);
                    $data['questionnaires'][$questionnaire['id']]['misc']['healthImpacts']['minNormalized'] = min($data['questionnaires'][$questionnaire['id']]['misc']['healthImpacts']['minNormalized'] ?? 0, $difference);

                    $data['questionnaires'][0]['healthImpacts'][$healthImpact['type']['id']]['value'] += $value;
                    $data['questionnaires'][0]['healthImpacts'][$healthImpact['type']['id']]['normalized'] += $difference;
                    $data['questionnaires'][0]['misc']['healthImpacts']['maxNormalized'] = max($data['questionnaires'][0]['misc']['healthImpacts']['maxNormalized'] ?? 0, $difference);
                    $data['questionnaires'][0]['misc']['healthImpacts']['minNormalized'] = min($data['questionnaires'][0]['misc']['healthImpacts']['minNormalized'] ?? 0, $difference);
                }


                $data['questionnaires'][$questionnaire['id']]['effects'] = $effects;
                $data['questionnaires'][$questionnaire['id']]['healthImpacts'] = $healthImpacts;
            }
        }

        return $data;
    }

    public function getMaxEntryCount(): int
    {
        $questionCount = 0;
        switch($this['type']['shortname'])
        {
            case 'screening':default:
                $questionnaires = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first())->orWhere('type_id', '=', ProjectStageType::where('shortname', '=', 'scoping')->pluck('id')->first())->get();
                break;
            case 'appraisal':
                $questionnaires = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first())->get();
                break;
        }
        foreach ($questionnaires as $questionnaire)
        {
            if(isset($this['membership']['project']))
            {
                $questionCount += $questionnaire->getContentCount($this['membership']['project']);
            }
        }
        return $questionCount;
    }

    public function getProgress(): float|int
    {
        $maxEntries = 0;

        $maxEntries += $this->getMaxEntryCount();
        if ($maxEntries === 0) return 0;

        $entries = $this->getEntryCount();

        return $entries / (float)$maxEntries;
    }

    public function getEntryCount(): int
    {
        $entries = 0;
        if(!isset($this['membership']['project']['app_mode'])) return $entries;

        $appMode = $this['membership']['project']['app_mode'];
        foreach ($this['entries'] as $entry)
        {
            if(!isset($entry['content'])) continue;
            if($this['type']['shortname'] === 'appraisal')
            {
                $screeningItem = $entry['content']['screeningItem'];
                if(($entry['content']['priority'] ?? 0) < $appMode) continue;
                if(isset($screeningItem) && !$screeningItem->isFocused($this['membership']['project'])) continue;
            }
            if(isset($entry['positive']) || isset($entry['negative'])) $entries++;
        }
        return $entries;
    }

    /*
    *   Updates the stage's 'entry_count' value. This gets called when entries are saved.
     */
    public function updateEntryCount(): bool
    {
        $changesMade = false;
        $this['entry_count'] = $this->getEntryCount();
        if($this->isDirty())
        {
            $this->save();
            $changesMade = true;
        }
        return $changesMade;
    }

    /*
    *   Checks the current progress and sets the 'complete' value to true if the progress is (almost) 1.
     *  If the stage has already been marked as complete, it just returns and skips the calculation.
    *   If questions are added in production mode, leaving previously completed stages incomplete,
     *  use the development command "reevaluate stages" in the dev section to do just that.
    */
    public function checkIfComplete(): void
    {
        if($this['complete']) return;
        $this['complete'] = $this->getProgress() > 0.997;
        if($this->isDirty()) $this->save();
    }

    use TimeStampTrait;
}
