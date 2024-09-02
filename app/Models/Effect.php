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

class Effect extends Model
{
    use HasFactory;

    public string $positiveColor = '#198754';
    public string $mostlyPositiveColor = '#9acd32';
    public string $neutralColor = '#ffc107';
    public string $mostlyNegativeColor = '#fd7e14';
    public string $negativeColor = '#dc3545';
    public string $darkColor = '#212529';

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(EffectType::class, 'effect_type_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPositiveSize(): int
    {
        return $this['size_y'] * ($this['type']['is_positive'] === 1 ? 1 : -1);
    }

    public function getNegativeSize(): int
    {
        return $this['size_n'] * ($this['type']['is_positive'] === 1 ? 1 : -1);
    }

    public function getTotalPositiveSize(Project $project): float
    {
        $entries = $this['content']->getEntries($project);
        $sum = 0.0;
        foreach ($entries as $entry)
        {
            if($entry['positive'] >= 0.0) $sum += $entry['positive'];
        }
        return $sum * $this->getPositiveSize();
    }

    public function getTotalNegativeSize(Project $project): float
    {
        $entries = $this['content']->getEntries($project);
        $sum = 0.0;
        foreach ($entries as $entry)
        {
            if($entry['negative'] >= 0.0) $sum += $entry['negative'];
        }
        return $sum * $this->getNegativeSize();
    }

    public function getIconColor(float $totalPositive, float $totalNegative): string
    {
        if($totalPositive === 0.0 && $totalNegative === 0.0) return $this->darkColor;
        if($totalPositive >= 0.0 && $totalNegative >= 0.0) return $this->positiveColor;
        if($totalPositive <= 0.0 && $totalNegative <= 0.0) return $this->negativeColor;
        if(abs($totalPositive - $totalNegative) < 0.01) return $this->neutralColor;
        if($totalPositive > $totalNegative) return $this->mostlyPositiveColor;
        if($totalPositive < $totalNegative) return $this->mostlyNegativeColor;
        return $this->darkColor;
    }

    public function getIconTooltip(float $totalPositive, float $totalNegative): string
    {
        if($totalPositive === 0.0 && $totalNegative === 0.0) return __('No change in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        if($totalPositive >= 0.0 && $totalNegative >= 0.0) return $this['type']['is_positive'] ? __('An increase in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]) : __('A decrease in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        if($totalPositive <= 0.0 && $totalNegative <= 0.0) return $this['type']['is_positive'] ? __('A decrease in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]) : __('An increase in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        if(abs($totalPositive - $totalNegative) < 0.01) return __('No change in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        if($totalPositive > $totalNegative) return $this['type']['is_positive'] ? __('Overall, an increase in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]) : __('Overall, a decrease in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        if($totalPositive < $totalNegative) return $this['type']['is_positive'] ? __('Overall, a decrease in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]) : __('Overall, an increase in the direct effect :effect is to be expected.', ['effect' => __(':quote', ['quote' => __($this['type']['name'])])]);
        return __('No change in the direct effect :effect is to be expected.', ['effect' => ':quote', ['quote' => __($this['type']['name'])]]);
    }

    public function getSizeTooltip(string $type): string
    {
        $size = $type === 'negative' ? $this->getNegativeSize() : $this->getPositiveSize();
        if($this['type']['is_positive'])
        {
            if($size > 0) return __('This effect is considered positive because in this case a high value is desirable and the effect size is above zero.');
            if($size < 0) return __('This effect is considered negative because in this case a high value is desirable and the effect size is below zero.');
        }
        else
        {
            if($size > 0) return __('This effect is considered positive because in this case a low value is desirable and the effect size is below zero.');
            if($size < 0) return __('This effect is considered negative because in this case a low value is desirable and the effect size is above zero.');
        }
        return __('This effect is considered neutral because its size is zero.');
    }

    use TimeStampTrait;
}
