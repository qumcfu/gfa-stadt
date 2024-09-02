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

class ColorCode extends Model
{
    use HasFactory;

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isBright(): bool
    {
        if(isset($this['is_bright'])) return $this['is_bright'];
        $aboveTh = 190 * ($this['alpha'] / 255.0);
        $belowTh = 110 * ($this['alpha'] / 255.0);
        if($this->maxRgb() > 215 * ($this['alpha'] / 255.0)) $aboveTh = 150 * ($this['alpha'] / 255.0);
        if($this->minRgb() < 41 * ($this['alpha'] / 255.0)) $belowTh = 150 * ($this['alpha'] / 255.0);
        return $this->rgbValuesAbove($aboveTh) > 1 && $this->rgbValuesBelow($belowTh) < 2;
    }

    public function maxRgb(): int
    {
        return max($this['red'], max($this['green'], $this['blue'])) ?? 0;
    }

    public function minRgb(): int
    {
        return min($this['red'], min($this['green'], $this['blue'])) ?? 0;
    }

    public function rgbValuesAbove($threshold): int
    {
        $count = 0;
        if($this['red'] > $threshold) $count++;
        if($this['green'] > $threshold) $count++;
        if($this['blue'] > $threshold) $count++;
        return $count;
    }

    public function rgbValuesBelow($threshold): int
    {
        $count = 0;
        if($this['red'] < $threshold) $count++;
        if($this['green'] < $threshold) $count++;
        if($this['blue'] < $threshold) $count++;
        return $count;
    }

    public function getTransparentColor(): string
    {
        return match (strlen(substr($this['hex'], 1))) {
            3 => $this['hex'] . '2',
            4 => substr($this['hex'], 0, 4) . (dechex(round($this['alpha'] / 128.0))),
            6 => $this['hex'] . '20',
            8 => substr($this['hex'], 0, 7) . (dechex(round($this['alpha'] / 8.0))),
            default => $this['hex'],
        };
    }

    public function getHoverColor(): string{
        $r = dechex($this['red'] >= 128 ? max($this['red'] + 8, 255) : min($this['red'] - 16, 0));
        $g = dechex($this['green'] >= 128 ? max($this['green'] + 8, 255) : min($this['green'] - 16, 0));
        $b = dechex($this['blue'] >= 128 ? max($this['blue'] + 8, 255) : min($this['blue'] - 16, 0));
        return $r . $g . $b . $this['alpha'];
    }

    public function isValid(): bool
    {
        if(!str_starts_with($this['hex'], '#')) return false;
        if(!in_array(strlen($this['hex']), [4, 5, 7, 8])) return false;
        if(preg_match_all('/[0-9A-Fa-f]{3,8}/', substr($this['hex'], 1)) !== 1) return false;
        return true;
    }

    public function updateRgbValues()
    {
        $rgba = $this->hexToRGBA(substr($this['hex'], 1));
        $this['red'] = $rgba['red'];
        $this['green'] = $rgba['green'];
        $this['blue'] = $rgba['blue'];
        $this['alpha'] = $rgba['alpha'];
    }

    private function hexToRGBA(string $hex): array
    {
        return match (strlen($hex)) {
            3 => ['red' => hexdec(str_repeat(substr($hex, 0, 1), 2)), 'green' => hexdec(str_repeat(substr($hex, 1, 1), 2)), 'blue' => hexdec(str_repeat(substr($hex, 2, 1), 2)), 'alpha' => 255],
            4 => ['red' => hexdec(str_repeat(substr($hex, 0, 1), 2)), 'green' => hexdec(str_repeat(substr($hex, 1, 1), 2)), 'blue' => hexdec(str_repeat(substr($hex, 2, 1), 2)), 'alpha' => hexdec(str_repeat(substr($hex, 3, 1), 2))],
            6 => ['red' => hexdec(substr($hex, 0, 2)), 'green' => hexdec(substr($hex, 2, 2)), 'blue' => hexdec(substr($hex, 4, 2)), 'alpha' => 255],
            8 => ['red' => hexdec(substr($hex, 0, 2)), 'green' => hexdec(substr($hex, 2, 2)), 'blue' => hexdec(substr($hex, 4, 2)), 'alpha' => hexdec(substr($hex, 6, 2))],
            default => ['red' => 0, 'green' => 0, 'blue' => 0, 'alpha' => 0],
        };
    }

    use TimeStampTrait;
}
