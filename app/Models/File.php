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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(FileType::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(FileLink::class);
    }

    public function hasLinkTo(Project $project): bool
    {
        return count($this['links']->where('project_id', '=', $project['id']) ?? []) > 0;
    }

    public function getLinkTo(Project $project): FileLink|null
    {
        return $this['links']->where('project_id', '=', $project['id'])->first();
    }

    public function hasLinkToAllProjects(): bool
    {
        return count($this['links'] ?? []) >= count(Project::all());
    }

    public function createLink(int $projectId)
    {
        foreach ($this['links'] ?? [] as $link) if($link['project_id'] === $projectId) return;
        $link = new FileLink();
        $link['project_id'] = $projectId;
        $link['file_id'] = $this['id'];
        $link['author_id'] = Auth::id();
        $link->save();
    }

    public function removeLink(int $projectId)
    {
        foreach ($this['links'] ?? [] as $link) if($link['project_id'] === $projectId) $link->delete();
    }

    public function unlinkAll()
    {
        foreach ($this['links'] ?? [] as $link) $link->delete();
    }

    public function getStoragePath(): string
    {
        return Storage::url($this['path']);
    }

    public function hasPreview(): bool
    {
        return in_array($this['type']['shortname'], ['image', 'pdf', 'video', 'audio']);
    }

    public function canBeDefault(): bool
    {
        return in_array($this['type']['shortname'], ['image', 'pdf', 'video']);
    }

    use TimeStampTrait;
}
