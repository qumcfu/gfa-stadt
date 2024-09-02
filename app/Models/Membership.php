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

use Database\Seeders\RoleSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return$this->belongsTo(Role::class);
    }

    public function stages()
    {
        return $this->hasMany(ProjectStage::class)->orderBy('type_id')->orderBy('active', 'DESC')->orderBy('updated_at', 'DESC');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class);
    }

    public function setStageActive(string $type, int $id)
    {
        $typeId = ProjectStageType::where('shortname', '=', $type)->pluck('id')->first();
        $stagesOfType = $this['stages']->where('type_id', '=', $typeId);

        foreach ($stagesOfType as $stage)
        {
            $stage['active'] = ($stage['id'] === $id);
            if($stage->isDirty())
            {
                $stage->timestamps = false;
                $stage->save();
            }
        }
    }

    public function getActiveStages()
    {
        return $this['stages']->where('active', '=', 1);
    }

    public function getProjectStage(int $typeId, bool $createIfNecessary = true): ?ProjectStage
    {
        $stage = $this->getActiveStages()->where('type_id', '=', $typeId)->first();

        if(!isset($stage) && $createIfNecessary)
        {
            $stage = new ProjectStage();
            $stage['membership_id'] = $this['id'];
            $stage['type_id'] = $typeId;
            $stage['author_id'] = Auth::id();
            $stage['active'] = true;
            $stage->save();
        }
        return $stage;
    }

    public function getScreeningStage(bool $createIfNecessary = true): ?ProjectStage
    {
        return $this->getProjectStage(ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(), $createIfNecessary);
    }

    public function getAppraisalStage(bool $createIfNecessary = true): ?ProjectStage
    {
        return $this->getProjectStage(ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(), $createIfNecessary);
    }

    public function getProgress(): float|int
    {
        $maxEntries = 0;
        $entries = 0;
        $stages = $this['stages']->where('active');
        foreach ($stages as $stage) {
            $maxEntries += $stage->getMaxEntryCount();
            foreach ($stage['entries'] as $entry)
            {
                if(isset($entry['positive']) || isset($entry['negative'])) $entries++;
            }
        }
        if ($maxEntries === 0) return 0;
        return $entries / (float)$maxEntries;
    }
}
