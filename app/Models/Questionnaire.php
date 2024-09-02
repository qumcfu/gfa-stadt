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
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(ColorCode::class);
    }

    public function path()
    {
        return url('/questionnaires/' . $this['id']);
    }

    public function entries(): HasManyThrough
    {
        return $this->hasManyThrough(Entry::class, Content::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contents(): HasMany
    {
        return $this->hasMany(Content::class)->orderBy('order_id');
    }

    public function topic(): HasOne
    {
        return $this->hasOne(Topic::class);
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectStageType::class, 'type_id');
    }

    public function screeningQuestionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class, 'screening_id');
    }

    public function appraisalQuestionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class, 'screening_id');
    }

    // used by project stages to determine the amount of content items
    // this varies in appraisal due to the results of the conclusion of the screening
    public function getContentCount(Project $project = null): int
    {
        if(is_null($project) || in_array($this['type']['shortname'], ['screening', 'scoping'])) return count($this['contents'] ?? []);

        return $this->getAppraisalItemCount($project);
    }

    public function getAppraisalItems(Project $project): Collection
    {
        $items = new Collection();
        foreach ($this['contents'] as $content) {
            if($content->isFocused($project))
            {
                foreach ($content['appraisalItems'] as $appraisalItem)
                {
                    if($appraisalItem['priority'] >= $project['app_mode']) $items->push($appraisalItem ?? []);
                }
            }
        }
        return $items;
    }

    public function getAppraisalItemCount(Project $project): int
    {
        $count = 0;
        $screeningQuestionnaire = $this['screeningQuestionnaire'];
        $appMode = $project['app_mode'];

        foreach ($screeningQuestionnaire['contents'] as $content) {
            if($content->isFocused($project))
            {
                foreach($content['appraisalItems'] as $appraisalItem)
                {
                    if($appraisalItem['priority'] >= $appMode) $count++;
                }
            }
        }
        return $count;
    }

    public function getEffectTypeCount(Membership $membership): int
    {
        $appraisalStage = $membership->getAppraisalStage(false);
        if(!isset($appraisalStage)) return 0;

        $effectTypes = [];

        $entries = $appraisalStage['entries']->filter(function ($entry) {
            return $entry['positive'] > 0 || $entry['negative'] > 0;
        });

        foreach ($entries as $entry)
        {
            if(!isset($entry['content'])) continue;
            foreach ($entry['content']['effects'] as $effect)
            {
                if(!in_array($effect['type']['shortname'], $effectTypes)) $effectTypes[] = $effect['type']['shortname'];
            }
        }

        return count($effectTypes);
    }

    public function getPrevious(): Questionnaire|null
    {
        if($this['type']['shortname'] === 'screening' || $this['type']['shortname'] === 'scoping')
        {
            $stageIds = ProjectStageType::where('shortname', '=', 'screening')->orWhere('shortname', '=', 'scoping')->pluck('id');
            $questionnaires = Questionnaire::whereIn('type_id', $stageIds)->get();
        }
        else $questionnaires = Questionnaire::where('type_id', '=', $this['type_id'])->get();
        return $questionnaires->where('order_id', '=', $this['order_id'] - 1)->first();
    }

    // get the previous appraisal questionnaire
    public function getPreviousFocused(Project $project): Questionnaire|null
    {
        $previous = (is_null($this['screening_id']) ? $this->getPrevious() : $this['screeningQuestionnaire']->getPrevious());
        while(isset($previous))
        {
            if($previous->hasFocusedContent($project) && isset($previous['appraisalQuestionnaire'])) return $previous['appraisalQuestionnaire'];
            $previous = $previous->getPrevious();
        }
        return null;
    }

    public function getNext(): Questionnaire|null
    {
        if($this['type']['shortname'] === 'screening' || $this['type']['shortname'] === 'scoping')
        {
            $stageIds = ProjectStageType::where('shortname', '=', 'screening')->orWhere('shortname', '=', 'scoping')->pluck('id');
            $questionnaires = Questionnaire::whereIn('type_id', $stageIds)->get();
        }
        else $questionnaires = Questionnaire::where('type_id', '=', $this['type_id'])->get();
        return $questionnaires->where('order_id', '=', $this['order_id'] + 1)->first();
    }

    // get the next appraisal questionnaire
    public function getNextFocused(Project $project): Questionnaire|null
    {
        $next = (is_null($this['screening_id']) ? $this->getNext() : $this['screeningQuestionnaire']->getNext());
        while(isset($next))
        {
            if($next->hasFocusedContent($project) && isset($next['appraisalQuestionnaire'])) return $next['appraisalQuestionnaire'];
            $next = $next->getNext();
        }
        return null;
    }

    // returns only those contents that belong to that particular stage type
    public function getStageContents(Project|null $project, ProjectStageType|null $stageType): Collection
    {
        if(!isset($project) || !isset($stageType)) return $this['contents'];
        $contents = new Collection();
        if($stageType['shortname'] === 'appraisal')
        {
            $contents = $this['screeningQuestionnaire']->getAppraisalItems($project);
        } else {
            $contents = $this['contents']->where('type.stage_type_id', '=', $stageType['id']);
        }

        return $contents;
    }

    public function getEntries(Project $project): Collection
    {
        // get only entries that belong to active memberships and active project stages
        $entries = $this['entries']->where('stage.active', '=', true)->where('stage.membership.active', '=', true);
        // now return only those that belong to this questionnaire's contents and this very project
        return $entries->where('content.questionnaire_id', '=', $this['id'])->where('stage.membership.project_id', '=', $project['id']);
    }

    // get mean values for a whole project
    public function getMeanValue(Project $project, string $key): float
    {
        $sum = 0.0;
        $amount = 0;

        foreach ($this['contents'] as $content)
        {
            $votes = $content->getValueCount($project, $key);
            $sum += $content->getMeanValue($project, $key) * $votes;
            $amount += $votes;
        }

        if($amount === 0) return 0.0;
        return $sum / $amount;
    }

    // get max values for a whole project
    public function getMaxValue(Project $project, string $key): float
    {
        $maxValue = 0;

        foreach ($this['contents'] as $content)
        {
            $value = $content->getMaxValue($project, $key);
            if ($value > $maxValue)
            {
                $maxValue = $value;
            }
        }

        return $maxValue;
    }

    // get mean values for a single project stage of a user
    public function getMeanValueForStage(ProjectStage $stage, string $key): float
    {
        $sum = 0.0;
        $amount = 0;

        foreach ($this['contents'] as $content)
        {
            $entry = $content->getEntry($stage);
            if(!is_null($entry) && $entry->hasBeenRated())
            {
                $value = $entry->getValue($key);
                if($value >= 0)
                {
                    $sum += $value;
                    $amount++;
                }
            }
        }

        if($amount === 0) return 0.0;
        return $sum / $amount;
    }

    // get max values for a single project stage of a user
    public function getMaxValueForStage(ProjectStage $stage, string $key): float
    {
        $maxValue = 0;

        foreach ($this['contents'] as $content)
        {
            $entry = $content->getEntry($stage);
            if(!is_null($entry) && $entry->hasBeenRated())
            {
                $value = $entry->getValue($key);
                if($value > $maxValue) $maxValue = $value;
            }
        }

        return $maxValue;
    }

    public function getScatteredValues(Project $project, string $key, bool $normalized = false, bool $asString = false): array|string
    {
        $values = [0, 0, 0, 0, 0, 0, 0, 0];
        $count = 0;
        foreach ($this['contents'] as $content)
        {
            $contentValues = $content->getScatteredValues($project, $key, $normalized, false);
            $hasValueFlag = false;
            for($i = 0; $i < count($values); $i++)
            {
                $values[$i] += $contentValues[$i];
                if($i <= 5 && $contentValues[$i] > 0) $hasValueFlag = true;
            }
            if($hasValueFlag) $count++;
        }
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

    public function getRelevantContents(Project $project, string $key = 'all'): array
    {
        $contents = [];
        foreach ($this['contents'] as $content)
        {
            if($content->isRelevant($project, $key)) $contents[] = $content;
        }
        return $contents;
    }

    public function getCommentedContents(Project $project): array
    {
        $contents = [];
        foreach ($this['contents'] as $content)
        {
            if(count($content->getComments($project)) > 0) $contents[] = $content;
        }
        return $contents;
    }

    public function hasRelevantContent(Project $project, string $key = 'all'): bool
    {
        foreach ($this['contents'] as $content)
        {
            if($content->isRelevant($project, $key)) return true;
        }
        return false;
    }

    public function hasFocusedContent(Project $project): bool
    {
        if($this['type']['shortname'] === 'appraisal')
        {
            return $this['screeningQuestionnaire']->hasFocusedContent($project);
        }

        foreach ($this['contents'] as $content)
        {
            // also check whether that content has related appraisal items
            // otherwise, empty questionnaires might appear in appraisal
            if($content->isFocused($project) && $content->hasAppraisalItems()) return true;
        }

        return false;
    }

    public function itemCount()
    {
        if ($this->contents() == null)
        {
            return 0;
        }
        $typeIds = ContentType::where('shortname', 'like', '%item%')->pluck('id');
        return $this->contents()->whereIn('type_id', $typeIds)->count();
    }

    public function undefinedItemCount()
    {
        if ($this->contents() == null)
        {
            return 0;
        }
        $typeIds = ContentType::where('category', '=', 'question')->pluck('id');
        return $this['contents']->whereIn('type_id', $typeIds)->where('item_id', '=', 0)->count();
    }

    public function getMaxScore()
    {
        $maxScore = 0;
        $itemId = ContentType::where('shortname', '=', 'item')->pluck('id')->first();
        foreach ($this->contents()->where('type_id', '=', $itemId)->get() as $item)
        {
            $maxScore += ($item['size'] ?? 0);
        }
        return $maxScore;
    }

    public function getMainContentType(): string
    {
        $types = [];
        $max = 0;
        $shortname = '';
        foreach ($this['contents'] as $content)
        {
            if(!isset($types[$content['type']['shortname']])) $types[$content['type']['shortname']] = 0;
            $types[$content['type']['shortname']]++;
            if ($types[$content['type']['shortname']] > $max)
            {
                $max = $types[$content['type']['shortname']];
                $shortname = $content['type']['shortname'];
            }
        }
        return $shortname;
    }

    use TimeStampTrait;
}
