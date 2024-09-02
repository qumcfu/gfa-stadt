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

class Topic extends Model
{
    use HasFactory;

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    // returns the parent topic
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    // returns the children topics
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function connections(): HasMany
    {
        return $this->hasMany(Topic::class, 'origin_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hasConnections(): bool
    {
        return count($this['connections'] ?? []) > 0;
    }

    public function getChildWidth(Topic $child): int
    {
        $childCount = 0;
        $childIndex = 0;
        foreach ($this['topics'] as $topic)
        {
            if($topic['type'] !== 'container')
            {
                $childIndex = $childCount;
                $childCount += $topic['width'] ?? 1;
            }
        }
        $textLength = strlen($child['name'] ?? '');
        return ($child['width'] ?? 1) * match ($childCount) {
            1 => $textLength < 28 ? 4 : ($textLength < 100 ? 6 : ($textLength < 150 ? 9 : 12)),
            2 => 6,
            3, 6, 9 => 4,
            5 => ($childIndex < 2 ? 6 : 4),
            7, 11, 15 => ($childIndex < 3 ? 4 : 3),
            10, 14 => ($childIndex < 6 ? 4 : 3),
            13 => ($childIndex < 9 ? 4 : 3),
            default => 3,
        };
    }

    public function getQuestionnaire(): Questionnaire|null
    {
        return $this['questionnaire'] ?? $this['topic']->getQuestionnaire() ?? null;
    }

    public function getHyperlinkedNotes(): string
    {
        if(!isset($this['notes']) || is_null($this['notes'])) return $this['notes'];

        $notes = $this['notes'] ?? '';

        $notes = str_replace('[', '<a class="btn-link text-decoration-none cursor-pointer" data-previous="#show-topic-notes-modal-' . $this['id'] . '" data-bs-toggle="modal" data-bs-target="#show-references-modal-' . $this->getQuestionnaire()['id'] . '">[', $notes);
        $notes = str_replace(']', ']</a>', $notes);

        return $notes;
    }
}
