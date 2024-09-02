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
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Content extends Model
{
    // protected $fillable = ['question'];
    // assigning an empty array to guarded turns off mass assignment protection for this model
    protected $guarded = [];

    use HasFactory;

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Entry::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(ContentType::class);
    }

    public function effects(): HasMany
    {
        return $this->hasMany(Effect::class);
    }

    public function screeningItem(): BelongsTo
    {
        return $this->belongsTo(Content::class, 'screening_id');
    }

    public function appraisalItems(): HasMany
    {
        return $this->hasMany(Content::class, 'screening_id')->orderBy('order_id');
    }

    public function states()
    {
        return $this->hasMany(ContentState::class, 'original_id');
    }

    public function entries()
    {
        return $this->hasMany(Entry::class)->orderBy('created_at');
    }

    public function previous()
    {
        return Content::where([['questionnaire_id', '=', $this['questionnaire_id']], ['order_id', '=', $this['order_id'] - 1]])->first();
    }

    public function next()
    {
        return Content::where([['questionnaire_id', '=', $this['questionnaire_id']], ['order_id', '=', $this['order_id'] + 1]])->first();
    }

    public function isLast(): bool
    {
        return is_null($this->next());
    }

    public function getEntries(Project $project)
    {
        return $this['entries']->where('stage.membership.project_id', '=', $project['id'])->where('stage.active', '=', true)->where('stage.membership.active', '=', true);
    }

    public function getEntry(ProjectStage $stage)
    {
        return $this['entries']->where('stage_id', '=', $stage['id'])->first();
    }

    public function getUniqueNumber(): string
    {
        return strtoupper(substr($this['questionnaire']['type']['shortname'], 0, 1)) . ' ' . $this['questionnaire']['order_id'] . '.' . $this['order_id'];
    }

    public function getPositiveEffectSize(): int
    {
        $size = 0;
        foreach ($this['effects'] ?? [] as $effect) $size += ($effect->getPositiveSize());
        return $size;
    }

    public function getNegativeEffectSize(): int
    {
        $size = 0;
        foreach ($this['effects'] ?? [] as $effect) $size += ($effect->getNegativeSize());
        return $size;
    }

    public function getPositiveAbsEffectSize(): int
    {
        $size = 0;
        foreach ($this['effects'] ?? [] as $effect) $size += abs($effect['size_y']);
        return $size;
    }

    public function getNegativeAbsEffectSize(): int
    {
        $size = 0;
        foreach ($this['effects'] ?? [] as $effect) $size += abs($effect['size_n']);
        return $size;
    }

    public function isFocused(Project $project): bool
    {
        if($this['type']['shortname'] === 'vulnerable-group-item') return $this->isRelevant($project);
        return !is_null(FocusedItem::where([['project_id', '=', $project['id']], ['content_id', '=', $this['id']], ['is_focused', '=', true]])->first());
    }

    public function hasAppraisalItems(): bool
    {
        return count($this['appraisalItems'] ?? []) > 0;
    }

    // if $includeAll is set to true, the sum will be divided by the amount of all entries related to this project and content
    // by default, it is set to false and will ignore "unknown" and "unrated" entries
    public function getMeanValue(Project $project, string $key, bool $includeAll = false): float
    {
        $sum = 0.0;
        $amount = 0;

        foreach ($this->getEntries($project) as $entry)
        {
            $value = $entry->getValue($key) ?? -1;
            if ($value >= 0) $sum += $value;
            if ($value >= ($includeAll ? -1 : 0)) $amount++;
        }

        if($amount === 0) return 0.0;
        return $sum / $amount;
    }

    public function getMaxValue(Project $project, string $key): float
    {
        $maxValue = 0;

        foreach ($this->getEntries($project) as $entry)
        {
            $value = $entry->getValue($key) ?? -1;
            if ($value > $maxValue)
            {
                $maxValue = $value;
            }
        }

        return $maxValue;
    }

    public function getValue(Project $project, string $valueType, string $key): float
    {
        return match ($valueType) {
            'mean', 'average' => $this->getMeanValue($project, $key),
            'max' => $this->getMaxValue($project, $key),
            default => -1.0,
        };
    }

    public function getNoImpactCount(Project $project): int
    {
        $count = 0;

        foreach ($this->getEntries($project) as $entry)
        {
            if (($entry->getValue('positive') ?? -4) + ($entry->getValue('negative') ?? -4) === 0) $count++;
        }

        return $count;
    }

    public function getUnknownCount(Project $project): int
    {
        $count = 0;

        foreach ($this->getEntries($project) as $entry)
        {
            if (($entry->getValue('positive') ?? -4) === -1) $count++;
        }

        return $count;
    }

    public function getUnratedCount(Project $project): int
    {
        $count = 0;

        foreach ($this->getEntries($project) as $entry)
        {
            if (($entry->getValue('positive') ?? -4) === -4) $count++;
        }

        return $count;
    }

    // currently not in use
    public function getMeanValueAsText(Project $project): string
    {
        $positive = $this->getMeanValue($project, 'positive');
        $negative = $this->getMeanValue($project, 'negative');
        if ($positive <= 0.0001 && $negative <= 0.0001) return __('not affected');
        if ($positive > 0 && $negative <= 0.0001) return __('positive');
        if ($positive <= 0.0001 && $negative > 0) return __('negative');
        if (abs($positive - $negative) < 0.0002) return __('both positive and negative');
        if ($positive > $negative) return __('mostly positive');
        if ($positive < $negative) return __('mostly negative');
        return __('unknown');
    }

    public function getMeanValueColor(Project $project): string
    {
        $positive = $this->getMeanValue($project, 'positive');
        $negative = $this->getMeanValue($project, 'negative');
        if ($positive <= 0.0001 && $negative <= 0.0001) return $project->darkColor;
        if ($positive > 0 && $negative <= 0.0001) return $project->positiveColor;
        if ($positive <= 0.0001 && $negative > 0) return $project->negativeColor;
        if (abs($positive - $negative) < 0.0002) return $project->neutralColor;
        if ($positive > $negative) return $project->mostlyPositiveColor;
        if ($positive < $negative) return $project->mostlyNegativeColor;
        return $project->darkColor;
    }

    public function getIcon(Project $project, string $valueType, string $key, float|null $value = null): string
    {
        if(!isset($value)) $value = $this->getValue($project, $valueType, $key);
        return $project->getIcon($value);
    }

    public function getTooltip(Project $project, string $valueType, string $key, float|null $value): string
    {
        if(!isset($value)) $value = $this->getValue($project, $valueType, $key);
        return $key !== 'potential' ? $project->impactToString($value) : $project->potentialToString($value);
    }

    public function getValueCount($project, $key): int
    {
        $count = 0;
        foreach ($this->getEntries($project) as $entry)
        {
            $value = ($entry[$key] ?? -1);
            if ($value >= 0) $count++;
        }
        return $count;
    }

    public function getScatteredValues(Project $project, string $key, bool $normalized = false, bool $asString = false): array|string
    {
        $values = [0, 0, 0, 0, 0, 0, 0, 0];
        $count = 0;
        $entries = $this->getEntries($project);
        foreach ($entries as $entry)
        {
            if(isset($entry[$key]))
            {
                if($entry[$key] >= 0)
                {
                    $values[$entry[$key]]++;
                    $count++;
                }
                else $values[6]++; // unknown
            }
            else $values[7]++; // no answer
        }
        $values[7] += (count($project->getActiveMemberships()) - count($entries)); // count missing entries as no answer
        if($normalized)
        {
            for($i = 0; $i < count($values); $i++) $values[$i] /= max($count, 1);
        }
        if($asString)
        {
            $string = '';
            for($i = 0; $i < count($values); $i++)
            {
                $string .= $values[$i];
                if($i < count($values) - 1) $string .= ', ';
            }
            $values = $string;
        }
        return $values;
    }

    // is this item relevant according to project settings?
    public function isRelevant(Project $project, string $key = 'all'): bool
    {
        $settings = $project['settings'];
        $metConditions = 0;
        $operator = $settings['operator'];

        switch ($operator)
        {
            case '>=':
                if(in_array($key, ['positive', 'all']) && $this->normalize($this->getMeanValue($project, 'positive')) >= $settings['mean_positive_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['negative', 'all']) && $this->normalize($this->getMeanValue($project, 'negative')) >= $settings['mean_negative_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['potential', 'all']) && $this->getMeanValue($project, 'potential') >= $settings['mean_potential_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['positive', 'all']) && $this->normalize($this->getMaxValue($project, 'positive')) >= $settings['max_positive_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['negative', 'all']) && $this->normalize($this->getMaxValue($project, 'negative')) >= $settings['max_negative_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['potential', 'all']) && $this->getMaxValue($project, 'potential') >= $settings['max_potential_th']) $metConditions++;
                return $metConditions >= $settings['min_met_conditions'];
            case '>':
                if(in_array($key, ['positive', 'all']) && $this->normalize($this->getMeanValue($project, 'positive')) > $settings['mean_positive_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['negative', 'all']) && $this->normalize($this->getMeanValue($project, 'negative')) > $settings['mean_negative_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['potential', 'all']) && $this->getMeanValue($project, 'potential') > $settings['mean_potential_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['positive', 'all']) && $this->normalize($this->getMaxValue($project, 'positive')) > $settings['max_positive_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['negative', 'all']) && $this->normalize($this->getMaxValue($project, 'negative')) > $settings['max_negative_th']) $metConditions++;
                if($metConditions >= $settings['min_met_conditions']) return true;
                if(in_array($key, ['potential', 'all']) && $this->getMaxValue($project, 'potential') > $settings['max_potential_th']) $metConditions++;
                return $metConditions >= $settings['min_met_conditions'];
        }
        return false;
    }

    private function normalize($value): float
    {
        switch ($this['type']['shortname'])
        {
            case 'vulnerable-group-item': return $value * 5.0;
            default: return $value;
        }
    }

    public function getRelevanceReasons(Project $project): array
    {
        // 0: not relevant | 1: reason is mean value | 2: reason is max value | 3: reason is both mean and max value
        $reasons = ['positive' => 0, 'negative' => 0, 'potential' => 0];

        $settings = $project['settings'];
        $operator = $settings['operator'];

        switch ($operator)
        {
            case '>=':
                if($this->normalize($this->getMeanValue($project, 'positive')) >= $settings['mean_positive_th']) $reasons['positive'] += 1;
                if($this->normalize($this->getMeanValue($project, 'negative')) >= $settings['mean_negative_th']) $reasons['negative'] += 1;
                if($this->getMeanValue($project, 'potential') >= $settings['mean_potential_th']) $reasons['potential'] += 1;
                if($this->normalize($this->getMaxValue($project, 'positive')) >= $settings['max_positive_th']) $reasons['positive'] += 2;
                if($this->normalize($this->getMaxValue($project, 'negative')) >= $settings['max_negative_th']) $reasons['negative'] += 2;
                if($this->getMaxValue($project, 'potential') >= $settings['max_potential_th']) $reasons['potential'] += 2;
                break;
            case '>':
                if($this->normalize($this->getMeanValue($project, 'positive')) > $settings['mean_positive_th']) $reasons['positive'] += 1;
                if($this->normalize($this->getMeanValue($project, 'negative')) > $settings['mean_negative_th']) $reasons['negative'] += 1;
                if($this->getMeanValue($project, 'potential') > $settings['mean_potential_th']) $reasons['potential'] += 1;
                if($this->normalize($this->getMaxValue($project, 'positive')) > $settings['max_positive_th']) $reasons['positive'] += 2;
                if($this->normalize($this->getMaxValue($project, 'negative')) > $settings['max_negative_th']) $reasons['negative'] += 2;
                if($this->getMaxValue($project, 'potential') > $settings['max_potential_th']) $reasons['potential'] += 2;
                break;
        }

        return $reasons;
    }

    public function getComments(Project $project)
    {
        return $this['comments']->where('entry.stage.membership.project_id', '=', $project['id']);
    }

    public function getReplies(Project $project): Collection
    {
        $comments = $this->getComments($project);
        $replies = new Collection();
        foreach ($comments as $comment)
        {
            foreach ($comment['replies'] as $reply)
            {
                $replies->push($reply);
            }
        }
        return $replies;
    }

    public function getSortedComments(Project $project)
    {
        $comments = $this->getComments($project)->values();
        $count = count($comments);

        for ($i = 0; $i < $count; $i++) {
            for ($j = 0; $j < $count - 1; $j++) {
                $k = $j + 1;
                if ($comments[$k]->getReplyTimestamp() > $comments[$j]->getReplyTimestamp() || ($comments[$k]['active'] && !$comments[$j]['active'])) {
                    // Swap elements at indices: $j, $k
                    list($comments[$j], $comments[$k]) = array($comments[$k], $comments[$j]);
                }
            }
        }
        return $comments;
    }

    public function isQuestion()
    {
        return $this->category === 'question';
    }

    public function getHyperlinkedInfo(): string
    {
        if(!isset($this['info']) || is_null($this['info'])) return "";

        $info = $this['info'] ?? '';

        $info = str_replace('[', '<a class="btn-link text-decoration-none cursor-pointer" data-previous="#offcanvas-' . $this['id'] . '" data-bs-toggle="modal" data-bs-target="#show-references-modal-' . $this['questionnaire_id'] . '">[', $info);
        $info = str_replace(']', ']</a>', $info);

        return $info;
    }

    use TimeStampTrait;
}
