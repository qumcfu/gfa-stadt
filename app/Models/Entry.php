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
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Entry extends Model
{
    use HasFactory;

    // colors are also defined in project and project stage models
    public string $positiveColor = '#198754';
    public string $mostlyPositiveColor = '#9acd32';
    public string $neutralColor = '#ffc107';
    public string $mostlyNegativeColor = '#fd7e14';
    public string $negativeColor = '#dc3545';
    public string $potentialColor = '#0d6efd';
    public string $darkColor = '#212529';

    public function comment(): HasOne
    {
        return $this->hasOne(Comment::class)->where('active', true);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(ProjectStage::class);
    }

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function hasImpact(): bool
    {
        return ($this['positive'] ?? 0) + ($this['negative'] ?? 0) > 0;
    }

    public function hasUnknownImpact(): bool
    {
        return ($this['positive'] ?? 0) + ($this['negative'] ?? 0) < 0;
    }

    public function hasBeenRated(): bool
    {
        return isset($this['positive']) && isset($this['negative']);
    }

    public function hasPotentialBeenRated(): bool
    {
        return isset($this['potential']);
    }

    public function hasPotential(): bool
    {
        return ($this['potential'] ?? 0) > 0;
    }

    public function hasUnknownPotential(): bool
    {
        return ($this['potential'] ?? 0) < 0;
    }

    public function isValid(): bool
    {
        return $this['stage']['active'] && $this['stage']['membership']['active'];
    }

    public function getValue(string $key): int|null
    {
        $value = $this[$key] ?? null;
        if($key === 'potential' && ($this['negative'] ?? 0) > 1) $value *= $this['negative'];
        return $value;
    }

    public function hasComment(): bool
    {
        return isset($this['comment']);
    }

    public function getComments(): string|null
    {
        // deprecated
        return $this['comments'] ?? null;
    }

    public function getImportance(): int
    {
        $importance = round(max(($this['positive'] ?? 0), ($this['negative'] ?? 0)));
        return match ($this['content']['type']['shortname'] ?? 'unknown') {
            'screening-item' => $importance,
            'vulnerable-group-item' => $importance * 5.0,
            default => -1.0,
        };
    }

    // only valid for appraisal items
    public function getSummarizedEffectColor(string $answer): string
    {
        $content = $this['content'];
        $effectSize = ($answer === 'yes' ? $content->getPositiveEffectSize() : $content->getNegativeEffectSize());
        $absEffectSize = ($answer === 'yes' ? $content->getPositiveAbsEffectSize() : $content->getNegativeAbsEffectSize());

        if($absEffectSize === 0) return $this->darkColor;
        if($effectSize === 0) return $this->neutralColor;
        if($effectSize > 0 && $absEffectSize === $effectSize) return $this->positiveColor;
        if($effectSize > 0 && $absEffectSize > $effectSize) return $this->mostlyPositiveColor;
        if($effectSize < 0 && $absEffectSize > abs($effectSize)) return $this->mostlyNegativeColor;
        if($effectSize < 0 && $absEffectSize === abs($effectSize)) return $this->negativeColor;
        return $this->darkColor;
    }

    public function getTooltipHeading(string $key): string
    {
        if(!isset($this['content'])) return __('Unknown Content');

        switch($this['content']['type']['shortname'])
        {
            case 'screening-item':
                if($this->hasImpact())
                {
                    if($key === 'positive') return __('Positive Effects');
                    if($key === 'negative') return __('Negative Effects');
                    if($key === 'potential') return __('Potential for improvement');
                    return __('Unknown key');
                }
                return __('Effects');
            case 'vulnerable-group-item':
                return __('This group is') . ':';
        }
        return __('Unknown Content Type');
    }

    // old system
    public function getDistribution(): int|null
    {
        switch($this->distributionToString())
        {
            case 'negative': return -2;
            case 'mostly negative': return -1;
            case 'neutral': return 0;
            case 'mostly positive': return 1;
            case 'positive': return 2;
            case 'not rated': case 'non-existent': case 'unknown': default: return null;
        }
    }

    public function getDistributionIconName(): string
    {
        if (!isset($this['positive']) || !isset($this['negative'])) return 'exclamation-circle-fill';
        if (!$this->hasImpact() && !$this->hasUnknownImpact()) return 'x-circle';
        if ($this->hasUnknownImpact()) return 'question-circle';

        if (max($this->getPositiveScore(), $this->getNegativeScore()) > 3.33) return 'circle-fill';
        if (max($this->getPositiveScore(), $this->getNegativeScore()) > 1.66) return 'circle-half';
        return 'circle';
    }

    public function getDistributionIconColor(): string
    {
        switch($this->distributionToString())
        {
            case 'negative': return $this->negativeColor;
            case 'mostly negative': return $this->mostlyNegativeColor;
            case 'neutral': return $this->neutralColor;
            case 'mostly positive': return $this->mostlyPositiveColor;
            case 'positive': return $this->positiveColor;
            case 'not rated': case 'non-existent': case 'unknown': default: return $this->darkColor;
        }
    }

    public function getDistributionTooltip()
    {
        return match ($this['content']['type']['shortname']) {
            'screening-item' => $this->impactToString(),
            'vulnerable-group-item' => $this->getVulnerableGroupTooltip(),
            default => '',
        };
    }

    public function getPositiveScore(): float
    {
        return match ($this['content']['type']['shortname'] ?? 'unknown') {
            'screening-item' => $this['positive'] ?? 0,
            'vulnerable-group-item', 'appraisal-item' => ($this['positive'] ?? 0) * 5.0,
            default => -1.0,
        };
    }

    public function getPositiveImportance(): string
    {
        if (($this['content']['type']['shortname'] ?? 'unknown') === 'vulnerable-group-item') {
            return match ((int)$this['positive'] ?? -1) {
                1 => __(':type affected', ['type' => __('positively')]),
                0 => __('not :type affected', ['type' => __('positively')]),
                default => __('not rated')
            };
        }
        else if (($this['content']['type']['shortname'] ?? 'unknown') === 'appraisal-item') {
            if(($this['positive'] ?? -1) > 0) return __('yes');
            if(($this['negative'] ?? -1) > 0) return __('no');
        }
        return $this->importanceToString($this['positive']);
    }

    public function getPositiveIconName(): string
    {
        switch($this->distributionToString())
        {
            case 'not rated': return 'exclamation-circle-fill';
            case 'non-existent': case 'negative': case 'not relevant': return 'x-circle';
            case 'unknown': return 'question-circle';
            default:
                if ($this->getPositiveScore() > 3.33) return 'circle-fill';
                if ($this->getPositiveScore() > 1.66) return 'circle-half';
                return 'circle';
        }
    }

    public function getPositiveIconColor(): string
    {
        if (!$this->hasImpact()) return $this->darkColor;
        if ($this['positive'] <= 0.0) return $this->darkColor;
        if (($this['content']['type']['shortname'] ?? 'unknown') === 'appraisal-item') return $this->getSummarizedEffectColor('yes');
        return $this->positiveColor;
    }

    public function getNegativeScore(): float
    {
        return match ($this['content']['type']['shortname'] ?? 'unknown') {
            'screening-item' => $this['negative'] ?? 0,
            'vulnerable-group-item', 'appraisal-item' => ($this['negative'] ?? 0) * 5.0,
            default => -1.0,
        };
    }

    public function getNegativeImportance(): string
    {
        if (($this['content']['type']['shortname'] ?? 'unknown') === 'vulnerable-group-item') {
            return match ((int)$this['negative'] ?? -1) {
                1 => __(':type affected', ['type' => __('negatively')]),
                0 => __('not :type affected', ['type' => __('negatively')]),
                default => __('not rated')
            };
        }
        else if (($this['content']['type']['shortname'] ?? 'unknown') === 'appraisal-item') {
            if(($this['positive'] ?? -1) > 0) return __('yes');
            if(($this['negative'] ?? -1) > 0) return __('no');
        }
        return $this->importanceToString($this['negative']);
    }

    public function getNegativeIconName(): string
    {
        switch($this->distributionToString())
        {
            case 'not rated': return 'exclamation-circle-fill';
            case 'non-existent': case 'positive': return 'x-circle';
            case 'unknown': return 'question-circle';
            default:
                if (($this['content']['type']['shortname'] ?? 'unknown') === 'appraisal-item' && $this['content']->getNegativeAbsEffectSize() === 0) return 'x-circle';
                if ($this->getNegativeScore() > 3.33) return 'circle-fill';
                if ($this->getNegativeScore() > 1.66) return 'circle-half';
                return 'circle';
        }
    }

    public function getNegativeIconColor(): string
    {
        if (($this['content']['type']['shortname'] ?? 'unknown') === 'appraisal-item' && ($this['negative'] ?? 0) > 0) return $this->getSummarizedEffectColor('no');
        if (!$this->hasImpact()) return $this->darkColor;
        if ($this['negative'] <= 0.0) return $this->darkColor;
        return $this->negativeColor;
    }

    public function getPotentialScore(): float
    {
        if (!$this->hasPotential()) return 0;
        return ($this['potential'] ?? 0) * max(($this['negative' ?? 0]), 1);
    }

    public function getPotentialIconName(): string
    {
        // if the item has no impact, it won't have potential for improvement, therefore return an x-circle icon
        if (!isset($this['potential'])) return $this->hasImpact() ? 'exclamation-circle-fill' : 'exclamation-circle';
        if ($this['potential'] === 0) return 'x-circle';
        if ($this['potential'] === -1) return 'question-circle';

        if ($this['negative'] > 3.33) return 'circle-fill';
        if ($this['negative'] > 1.66) return 'circle-half';
        return 'circle';
    }

    public function getPotentialIconColor(): string
    {
        if (!$this->hasPotential()) return $this->darkColor;
        return $this->potentialColor;
    }

    public function getPotentialTooltip(): string
    {
        if (!isset($this['potential'])) return __('not rated');
        if ($this->hasPotential())
        {
            return __('potential for improvement exists');
        }
        if ($this->hasUnknownPotential()) return __('unknown');
        return __('no potential for improvement');
    }

    // used by livewire components ShowOwnScreeningAssessment and ShowGeneralScreeningAssessment
    public function getVulnerableGroupIconName(): string
    {
        return match ($this->distributionToString()) {
            'not rated' => 'exclamation-circle-fill',
            'non-existent' => 'x-circle',
            'unknown' => 'question-circle',
            default => 'circle-fill',
        };
    }

    // used by livewire components ShowOwnScreeningAssessment and ShowGeneralScreeningAssessment
    public function getVulnerableGroupIconColor(): string
    {
        if ($this['positive'] > 0.01) return $this->positiveColor;
        if ($this['negative'] > 0.01) return $this->negativeColor;
        return $this->darkColor;
    }

    public function getSummary(): string
    {
        $summary = "<u>" . ($this['content']['short'] ?? __('Unknown Content')) . "</u>";
        if ($this['content']['type']['shortname'] === 'screening-item')
        {
            $summary .= ':<br>' . $this->impactToString() . ' ';
            if ($this->hasImpact()) $summary .= ' ' . __('The measures have :potential.', ['potential' => $this->potentialToString()]);
        }
        else if ($this['content']['type']['shortname'] === 'vulnerable-group-item')
        {
            $summary .= ' ';
            if($this->getPositiveScore() > 0.0) $summary .= __('are positively affected.');
            else if($this->getNegativeScore() > 0.0) $summary .= __('are negatively affected.');
            else if($this->hasUnknownImpact()) $summary = __('It is unclear whether') . ' ' . $summary . __('are affected') . '.';
            else $summary .= __('are not affected.');
        }
        return $summary;
    }

    private function impactToString(): string
    {
        if ($this->hasImpact()) return __('The impact of the measures was assessed as :distribution and :importance.', ['distribution' => __($this->distributionToString()), 'importance' => $this->importanceToString($this->getImportance())]);
        if ($this->hasUnknownImpact()) return __('It is unknown whether the measures will have any impact.');
        if ($this->hasBeenRated()) return __('The measures have no impact on this.');
        return __('This item has not been rated yet.');
    }

    private function getVulnerableGroupTooltip(): string
    {
        $tooltip = ($this['content']['short'] ?? __('Unknown Content')) . ' ';
        if($this->getPositiveScore() > 0.0) $tooltip .= __('are positively affected.');
        else if($this->getNegativeScore() > 0.0) $tooltip .= __('are negatively affected.');
        else $tooltip .= __('are not affected.');
        return $tooltip;
    }

    private function distributionToString(): string
    {
        if (!isset($this['positive']) || !isset($this['negative'])) return 'not rated';
        if ($this['positive'] == 0 && $this['negative'] == 0) return 'non-existent';
        if ($this['positive'] < -1 && $this['negative'] < -1) return 'not relevant';
        if ($this['positive'] < 0 && $this['negative'] < 0) return 'unknown';
        if ($this['positive'] == 0 && $this['negative'] > 0) return 'negative';
        if ($this['positive'] > 0 && $this['negative'] == 0) return 'positive';
        if ($this['positive'] == $this['negative']) return 'neutral';
        if ($this['positive'] + 0.5 < $this['negative']) return 'mostly negative';
        if ($this['positive'] > $this['negative'] + 0.5) return 'mostly positive';

        return 'unknown';
    }

    private function potentialToString(): string
    {
        return match ($this['potential'] ?? null) {
            1 => __('potential for improvement'),
            0 => __('no potential for improvement'),
            default => __('an unknown potential for improvement')
        };
    }

    private function importanceToString($importance): string
    {
        return match ((int)$importance ?? -1) {
            5 => __('very important'),
            4 => __('quite important'),
            3 => __('somewhat important'),
            2 => __('less important'),
            1 => __('rather unimportant'),
            0 => __('none'),
            -1 => __('unknown'),
            -2 => __('not relevant'),
            default => __('not rated')
        };
    }

    use TimeStampTrait;
}
