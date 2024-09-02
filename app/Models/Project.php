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

use App\Traits\MembershipCountTrait;
use App\Traits\StageCountTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;

    // colors are also defined in entry and project stage models
    public string $positiveColor = '#198754';
    public string $mostlyPositiveColor = '#9acd32';
    public string $neutralColor = '#ffc107';
    public string $mostlyNegativeColor = '#fd7e14';
    public string $negativeColor = '#dc3545';
    public string $potentialColor = '#0d6efd';
    public string $darkColor = '#212529';

    protected $guarded = [];

    public function color(): BelongsTo
    {
        return $this->belongsTo(ColorCode::class);
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    public function stages(): HasManyThrough
    {
        return $this->hasManyThrough(ProjectStage::class, Membership::class);
    }

    public function settings(): HasOne
    {
        return $this->hasOne(ProjectSettings::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function fileLinks(): HasMany
    {
        return $this->hasMany(FileLink::class);
    }

    public function focusedItems(): HasMany
    {
        return $this->hasMany(FocusedItem::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSortedMemberships(string $key, string $order = 'asc')
    {
        if(in_array($order, ['desc', 'DESC'])) return $this['memberships']->sortByDesc('user.last_login');
        return $this['memberships']->sortBy('user.last_login');
    }

    public function getMembershipOf(int $userId)
    {
        return $this['memberships']->where('user_id', '=', $userId)->first();
    }

    public function getMyMembership()
    {
        return $this->getMembershipOf(Auth::id());
    }

    public function getActiveMemberships()
    {
        return $this['memberships']->where('active', '=', true);
    }

    public function getActiveStages(): Collection
    {
        return $this['stages']->where([['active', '=', true], ['membership.active', '=', true]]);
    }

    public function getStagesOfType(ProjectStageType $type)
    {
        return $this['stages']->where('type_id', '=', $type['id']);
    }

    public function getActiveStagesOfType(ProjectStageType $type)
    {
        return $this->getStagesOfType($type)->where('active', true)->where('membership.active', true);
    }

    public function getCompletedStageCountOfType(ProjectStageType $type): int
    {
        $completedCount = 0;
        $stages = $this->getActiveStagesOfType($type);
        foreach ($stages as $stage)
        {
            if($stage['complete']) $completedCount++;
        }
        return $completedCount;
    }

    public function getEntries(ProjectStageType $type): Collection
    {
        $stages = $this->getActiveStagesOfType($type);
        $entries = new Collection();

        foreach ($stages as $stage) $entries = $entries->concat($stage['entries']);

        return $entries;
    }

    public function enroll(User $user, string $roleShortname = 'participant'): ?Membership
    {
        $existing = $this->memberships()->where('user_id', '=', $user['id'])->first();
        if ($existing != null) return null;

        $membership = new Membership();

        $membership['project_id'] = $this['id'];
        $membership['user_id'] = $user['id'];
        $membership['role_id'] = Role::where('shortname', '=', $roleShortname)->pluck('id')->first();
        $membership['active'] = true;
        $membership['author_id'] = $user['id'];
        $membership['order_id'] = Membership::all()->count() + 1;

        $membership->save();

        return $membership;
    }

    public function getCommentCount(ProjectStageType $stageType): int
    {
        $count = 0;
        // if we are looking at screening, include scoping questionnaire as well
        if($stageType['shortname'] === 'screening') $questionnaires = Questionnaire::where('type_id', '=', $stageType['id'])->orWhere('type_id', '=', ProjectStageType::where('shortname', '=', 'scoping')->pluck('id')->first())->get();
        else $questionnaires = Questionnaire::where('type_id', '=', $stageType['id'])->get();

        foreach ($questionnaires as $questionnaire)
        {
            foreach ($questionnaire->getCommentedContents($this) as $content)
            {
                $count += count($content->getComments($this));
            }
        }
        return $count;
    }

    public function getCommentedItemCount(ProjectStageType $stageType): int
    {
        $count = 0;
        // if we are looking at screening, include scoping questionnaire as well
        if($stageType['shortname'] === 'screening') $questionnaires = Questionnaire::where('type_id', '=', $stageType['id'])->orWhere('type_id', '=', ProjectStageType::where('shortname', '=', 'scoping')->pluck('id')->first())->get();
        else $questionnaires = Questionnaire::where('type_id', '=', $stageType['id'])->get();

        foreach ($questionnaires as $questionnaire)
        {
            foreach ($questionnaire['contents'] as $content)
            {
                if(count($content->getComments($this)) > 0) $count ++;
            }
        }
        return $count;
    }

    public function hasRelevantContent($key = 'all'): bool
    {
        foreach (Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first())->get() ?? [] as $questionnaire)
        {
            if($questionnaire->hasRelevantContent($this, $key)) return true;
        }
        return false;
    }

    public function hasRelevantEffectType($key = 'all'): bool
    {
        foreach (EffectType::all() as $type)
        {
            if($type->isRelevant($this, $key)) return true;
        }
        return false;
    }

    public function hasPositiveHealthImpacts(): bool
    {
        $data = json_decode($this['app_data'], true);
        foreach ($data['questionnaires'][0]['healthImpacts'] ?? [] as $impact)
        {
            if($impact['normalized'] > 0) return true;
        }
        return false;
    }

    public function hasNegativeHealthImpacts(): bool
    {
        $data = json_decode($this['app_data'], true);
        foreach ($data['questionnaires'][0]['healthImpacts'] ?? [] as $impact)
        {
            if($impact['normalized'] < 0) return true;
        }
        return false;
    }

    public function getLinkedFiles(): Collection
    {
        $ids = $this['fileLinks']->pluck('file_id');
        return File::whereIn('id', $ids)->get();
    }

    public function getDefaultFile(): ?File
    {
        $link = $this['fileLinks']->where('default', '=', true)->first();
        return $link['file'] ?? null;
    }

    public function getIcon(float $value, string $contentType = ''): string
    {
        if($contentType === 'vulnerable-group-item') $value *= 5.0;
        return $value > 3.33 ? "circle-fill" : ($value > 1.66 ? "circle-half" : ($value > 0.001 ? "circle" : "x-circle"));
    }

    public function hasScopingBeenCompleted(): bool
    {
        return $this['app_active'] ?? false;
    }

    // returns only focused items that have their 'is_focused' value set to true
    public function getFocusedItems(): Collection
    {
        return $this['focusedItems']->where('is_focused');
    }

    // returns all focused vulnerable group items for this project
    public function getFocusedVulnerableGroups(): Collection
    {
        $groups = Content::where('type_id', '=', ContentType::where('shortname', '=', 'vulnerable-group-item')->pluck('id')->first())->get();
        return $groups->filter->isFocused($this)->values();
    }

    // get strings of comma-separated mean and max values for all questionnaires that are part of the screening
    // or of effect sizes for a given appraisal stage
    public function getValuesAsString(string $stageType, ProjectStage $stage = null): array
    {
        $questionnaires = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first())->get();
        $index = 0;

        if($stageType === 'screening')
        {
            $positiveMeanString = '';
            $negativeMeanString = '';
            $potentialMeanString = '';

            $positiveMaxString = '';
            $negativeMaxString = '';
            $potentialMaxString = '';

            foreach ($questionnaires as $questionnaire)
            {
                $positiveMeanString .= (is_null($stage) ? $questionnaire->getMeanValue($this, 'positive') : $questionnaire->getMeanValueForStage($stage, 'positive')) . ($index < count($questionnaires) - 1 ? ',' : '');
                $negativeMeanString .= (is_null($stage) ? $questionnaire->getMeanValue($this, 'negative') : $questionnaire->getMeanValueForStage($stage, 'negative')) . ($index < count($questionnaires) - 1 ? ',' : '');
                $potentialMeanString .= (is_null($stage) ? $questionnaire->getMeanValue($this, 'potential') : $questionnaire->getMeanValueForStage($stage, 'potential')) . ($index < count($questionnaires) - 1 ? ',' : '');

                $positiveMaxString .= (is_null($stage) ? $questionnaire->getMaxValue($this, 'positive') : $questionnaire->getMaxValueForStage($stage, 'positive')) . ($index < count($questionnaires) - 1 ? ',' : '');
                $negativeMaxString .= (is_null($stage) ? $questionnaire->getMaxValue($this, 'negative') : $questionnaire->getMaxValueForStage($stage, 'negative')) . ($index < count($questionnaires) - 1 ? ',' : '');
                $potentialMaxString .= (is_null($stage) ? $questionnaire->getMaxValue($this, 'potential') : $questionnaire->getMaxValueForStage($stage, 'potential')) . ($index < count($questionnaires) - 1 ? ',' : '');

                $index++;
            }
            return [
                'mean' => [
                    'positive' => $positiveMeanString,
                    'negative' => $negativeMeanString,
                    'potential' => $potentialMeanString
                ],
                'max' => [
                    'positive' => $positiveMaxString,
                    'negative' => $negativeMaxString,
                    'potential' => $potentialMaxString
                ],
            ];
        }
        else if ($stageType === 'appraisal')
        {
            $effectTypes = EffectType::all();

            $totalScoreString = '';
            $positiveScoreString = '';
            $negativeScoreString = '';

            $totalMaxScoreString = '';
            $positiveMaxScoreString = '';
            $negativeMaxScoreString = '';

            $stageType = ProjectStageType::where('shortname', '=', 'appraisal')->first();
            $entries = is_null($stage) ? $this->getEntries($stageType) : $stage->getEntries($stageType);

            $stageCount = is_null($stage) ? count($this->getActiveStagesOfType($stageType)) : 1;
            $entryCount = count($entries);
            $ratedEntryCount = 0;

            $total = [];
            $positive = [];
            $negative = [];

            $maxValue = 0;
            $minValue = 0;

            // to do: calculate max values
            $effectMaxValue = [];
            $effectMinValue = [];

            foreach ($effectTypes as $type)
            {
                $total[$type['shortname']] = 0;
                $positive[$type['shortname']] = 0;
                $negative[$type['shortname']] = 0;
            }

            foreach ($entries as $entry)
            {
                if($entry['positive'] > 0)
                {
                    foreach ($entry['content']['effects'] ?? [] as $effect)
                    {
                        $total[$effect['type']['shortname']] += $effect['size_y'];
                        $isPositive = $effect['type']['is_positive'];

                        if($effect['size_y'] > 0 && $isPositive) $positive[$effect['type']['shortname']] += $effect['size_y'];
                        else if($effect['size_y'] < 0 && $isPositive) $negative[$effect['type']['shortname']] += $effect['size_y'];
                        else if($effect['size_y'] > 0 && !$isPositive) $negative[$effect['type']['shortname']] -= $effect['size_y'];
                        else if($effect['size_y'] < 0 && !$isPositive) $positive[$effect['type']['shortname']] -= $effect['size_y'];
                    }
                }
                if(($entry['negative'] ?? 0) > 0)
                {
                    foreach ($entry['content']['effects'] ?? [] as $effect)
                    {
                        $total[$effect['type']['shortname']] += $effect['size_n'];
                        $isPositive = $effect['type']['is_positive'];

                        if($effect['size_n'] > 0 && $isPositive) $positive[$effect['type']['shortname']] += $effect['size_n'];
                        else if($effect['size_n'] < 0 && $isPositive) $negative[$effect['type']['shortname']] += $effect['size_n'];
                        else if($effect['size_n'] > 0 && !$isPositive) $negative[$effect['type']['shortname']] -= $effect['size_n'];
                        else if($effect['size_n'] < 0 && !$isPositive) $positive[$effect['type']['shortname']] -= $effect['size_n'];
                    }
                }
                if($entry->hasBeenRated()) $ratedEntryCount++;
            }

            if($stageCount > 1)
            {
                // calculate mean values
                $percentRated = (float)$ratedEntryCount / max((float)$entryCount, 1.0);

                foreach ($effectTypes as $type)
                {
                    $total[$type['shortname']] /= max($stageCount, 1);
                    $positive[$type['shortname']] /= max($stageCount, 1);
                    $negative[$type['shortname']] /= max($stageCount, 1);
                    $maxValue /= max($stageCount * $percentRated, 1);
                    $minValue /= max($stageCount * $percentRated, 1);
                }
            }

            foreach ($effectTypes as $type)
            {
                $totalScoreString .= (strlen($totalScoreString) > 0 ? ', ' : '') . $total[$type['shortname']];
                $positiveScoreString .= (strlen($positiveScoreString) > 0 ? ', ' : '') . $positive[$type['shortname']];
                $negativeScoreString .= (strlen($negativeScoreString) > 0 ? ', ' : '') . $negative[$type['shortname']];
                $maxValue = max($maxValue, $positive[$type['shortname']]);
                $minValue = min($minValue, $negative[$type['shortname']]);
            }

            return [
                'effects' => [
                    'total' => $totalScoreString,
                    'positive' => $positiveScoreString,
                    'negative' => $negativeScoreString,
                    'totalMax' => 0,
                    'positiveMax' => 0,
                    'negativeMax' => 0,
                    'max' => $maxValue,
                    'min' => $minValue
                ]
            ];
        }
        return [];
    }

    // get mean and max values for an entire questionnaire
    public function getValuesForQuestionnaire(Questionnaire $questionnaire): array
    {
        $totalPositive = 0.0;
        $totalNegative = 0.0;
        $totalPotential = 0.0;
        $countPositive = 0;
        $countNegative = 0;
        $countPotential = 0;
        $maxPositive = 0.0;
        $maxNegative = 0.0;
        $maxPotential = 0.0;
        $maxMeanPositive = 0.0;
        $maxMeanNegative = 0.0;
        $maxMeanPotential = 0.0;

        $totalUnknownPositiveImpact = 0;
        $totalUnknownNegativeImpact = 0;
        $totalUnknownPotential = 0;
        $totalNoPositiveImpact = 0;
        $totalNoNegativeImpact = 0;
        $totalNoPotential = 0;

        foreach ($this->getActiveMemberships() as $membership)
        {
            $screeningStage = $membership->getScreeningStage();
            if($screeningStage == null) continue;

            foreach($questionnaire['contents'] as $content)
            {
                $values = $this->getValues($content);
                if($values['mean']['positive'] > 0.0 || $content['type']['shortname'] === 'vulnerable-group-item')
                {
                    $totalPositive += $values['mean']['positive'];
                    if($values['max']['positive'] > $maxPositive) $maxPositive = $values['max']['positive'];
                    if($values['mean']['positive'] > $maxMeanPositive) $maxMeanPositive = $values['mean']['positive'];
                    $countPositive++;
                }
                else if($values['mean']['positive'] == 0.0) $totalNoPositiveImpact++;
                else $totalUnknownPositiveImpact++;

                if($values['mean']['negative'] > 0.0 || $content['type']['shortname'] === 'vulnerable-group-item')
                {
                    $totalNegative += $values['mean']['negative'];
                    if($values['max']['negative'] > $maxNegative) $maxNegative = $values['max']['negative'];
                    if($values['mean']['negative'] > $maxMeanNegative) $maxMeanNegative = $values['mean']['negative'];
                    $countNegative++;
                }
                else if($values['mean']['negative'] == 0.0) $totalNoNegativeImpact++;
                else $totalUnknownNegativeImpact++;

                if($values['mean']['potential'] > 0.0)
                {
                    $totalPotential += $values['mean']['potential'];
                    if($values['max']['potential'] > $maxPotential) $maxPotential = $values['max']['potential'];
                    if($values['mean']['potential'] > $maxMeanPotential) $maxMeanPotential = $values['mean']['potential'];
                    $countPotential++;
                }
                else if($values['mean']['potential'] == 0.0) $totalNoPotential++;
                else $totalUnknownPotential++;
            }
        }
        return [
            'mean' => [
                'positive' => $countPositive > 0 ? $totalPositive / $countPositive : ($totalUnknownPositiveImpact > $totalNoPositiveImpact ? -1.0 : 0.0),
                'negative' => $countNegative > 0 ? $totalNegative / $countNegative : ($totalUnknownNegativeImpact > $totalNoNegativeImpact ? -1.0 : 0.0),
                'potential' => $countPotential > 0 ? $totalPotential / $countPotential : ($totalUnknownPotential > $totalNoPotential ? -1.0 : 0.0)
            ],
            'max' => [
                'positive' => $maxPositive,
                'negative' => $maxNegative,
                'potential' => $maxPotential
            ],
            'maxMean' => [
                'positive' => $maxMeanPositive,
                'negative' => $maxMeanNegative,
                'potential' => $maxMeanPotential
            ],
            'type' => $questionnaire->getMainContentType() . '-summary'
        ];
    }

    // get mean and max values of all entries for a single content
    public function getValues(Content $content): array
    {
        $totalPositive = 0.0;
        $totalNegative = 0.0;
        $totalPotential = 0.0;
        $maxPositive = 0.0;
        $maxNegative = 0.0;
        $maxPotential = 0.0;
        $count = 0;

        $totalUnknownImpact = 0;
        $totalUnknownPotential = 0;
        $totalNoImpact = 0;
        $totalNoPotential = 0;

        foreach($this->getActiveMemberships() as $membership)
        {
            $screeningStage = $membership->getScreeningStage();
            if ($screeningStage == null) continue;
            $entry = $screeningStage['entries']->where('content_id', '=', $content['id'])->first();
            if ($entry == null) continue;
            if (!$entry->hasUnknownImpact())
            {
                $positiveScore = $entry->getPositiveScore();
                $negativeScore = $entry->getNegativeScore();

                $totalPositive += $positiveScore;
                $totalNegative += $negativeScore;

                if($positiveScore > $maxPositive) $maxPositive = $positiveScore;
                if($negativeScore > $maxNegative) $maxNegative = $negativeScore;

                if (!$entry->hasImpact()) $totalNoImpact++;
                $count++;
            }
            else {
                $totalUnknownImpact++;
            }

            if (!$entry->hasUnknownPotential())
            {
                $potentialScore = $entry->getPotentialScore();

                $totalPotential += $potentialScore;

                if($potentialScore > $maxPotential) $maxPotential = $potentialScore;

                if (!$entry->hasPotential()) $totalNoPotential++;
            }
            else {
                $totalUnknownPotential++;
            }
        }
        $meanPositive = $count > 0 ? ($totalPositive > 0 ? $totalPositive / $count : ($totalUnknownImpact > $totalNoImpact ? -1.0 : 0.0)) : -1.0;
        $meanNegative = $count > 0 ? ($totalNegative > 0 ? $totalNegative / $count : ($totalUnknownImpact > $totalNoImpact ? -1.0 : 0.0)) : -1.0;
        $meanPotential = $count > 0 ? ($totalPotential > 0 ? $totalPotential / $count : ($totalUnknownPotential > $totalNoPotential ? -1.0 : 0.0)) : -1.0;
        // the getXYIconTooltip functions only receive the mean or max arrays, but still need to know about the type
        // to prevent errors, the top-level type value stays in its place for now, but might be deleted later on
        return [
            'mean' => [
                'positive' => $meanPositive,
                'negative' => $meanNegative,
                'potential' => $meanPotential,
                'type' => $content['type']['shortname']
            ],
            'max' => [
                'positive' => $maxPositive,
                'negative' => $maxNegative,
                'potential' => $maxPotential,
                'type' => $content['type']['shortname']
            ],
            'type' => $content['type']['shortname']
        ];
    }

    public function getPositiveIconColor(float $value): string
    {
        if ($value <= 0.0) return $this->darkColor;
        return $this->positiveColor;
    }

    public function getNegativeIconColor(float $value): string
    {
        if ($value <= 0.0) return $this->darkColor;
        return $this->negativeColor;
    }

    public function getPotentialIconColor(float $value): string
    {
        if ($value <= 0.0) return $this->darkColor;
        return $this->potentialColor;
    }

    public function getIconName(float $value): string
    {
        if ($value < 0.0) return 'question-circle';
        if ($value === 0.0) return 'x-circle';

        if ($value > 3.33) return 'circle-fill';
        if ($value > 1.66) return 'circle-half';
        return 'circle';
    }

    public function getPositiveIconTooltip($values): string
    {
        $positive = $values['positive'];
        if (($values['type'] ?? '') === 'vulnerable-group-item')
        {
            if ($positive > 0) return __('On average, the impact on this group has been estimated to be :impact.', ['impact' => $this->impactToString($positive, 'positive')]);
            return __('It is believed that there is no positive impact on this group.');
        }
        if (($values['type'] ?? '') === 'vulnerable-group-item-summary') return $positive > 0 ? __('Overall, the positive impact on vulnerable groups has been estimated to be :impact.', ['impact' => $this->impactToString($positive, 'positive')]) : __('It is believed that there is no positive impact on vulnerable groups.');
        if ($positive < 0.0) return __('The majority of participants indicated that :thing of the measures on this is unknown.', ['thing' => __('the positive impact')]);
        if ($positive == 0.0) return __('The majority of participants have indicated that the measures have :thing on this.', ['thing' => __('no positive impact')]);
        return __('On average, the impact of the measures on this area was rated as :impact.', ['impact' => $this->impactToString($positive, 'positive')]);
    }

    public function getNegativeIconTooltip($values): string
    {
        $negative = $values['negative'];
        if (($values['type'] ?? '') === 'vulnerable-group-item')
        {
            if ($negative > 0) return __('On average, the negative impact on this group has been estimated to be :impact.', ['impact' => $this->impactToString($negative, 'negative')]);
            return __('It is believed that there is no negative impact on this group.');
        }
        if ($negative < 0.0) return __('The majority of participants indicated that :thing of the measures on this is unknown.', ['thing' => __('the negative impact')]);
        if ($negative == 0.0) return __('The majority of participants have indicated that the measures have :thing on this.', ['thing' => __('no negative impact')]);
        return __('On average, the impact of the measures on this area was rated as :impact.', ['impact' => $this->impactToString($negative, 'negative')]);
    }

    public function getPotentialIconTooltip($values): string
    {
        $potential = $values['potential'];
        if (($values['type'] ?? '') === 'vulnerable-group-item')
        {
            return __('...');
        }
        if ($potential < 0.0) return __('The majority of participants have indicated that the measures have an unknown potential for improvement.');
        if ($potential == 0.0) return __('The majority of participants have indicated that the measures have no potential for improvement.');
        return __('On average, :potential was recognized through alternative planning in this area.', ['potential' => $this->potentialToString($potential)]);
    }

    // helper functions
    public function impactToString(float $importance, string $contentType = ''): string
    {
        if($contentType === 'vulnerable-group-item')
        {
            if($importance > 0.95) return __('existent');
            if($importance > 0.66) return __('probably existent');
            if($importance > 0.1) return __('possibly existent');
            if($importance > 0.01) return __('barely existent');
            return __('not existent');
        }
        if($importance > 4.0) return __('very important');
        if($importance > 3.0) return __('quite important');
        if($importance > 2.0) return __('somewhat important');
        if($importance > 1.0) return __('less important');
        if($importance > 0.01) return __('rather unimportant');
        return __('no effects');
    }

    public function potentialToString($potential): string
    {
        if($potential > 4.0) return __('great potential for improvement');
        if($potential > 3.0) return __('high potential for improvement');
        if($potential > 2.0) return __('average potential for improvement');
        if($potential > 1.0) return __('some potential for improvement');
        if($potential > 0.01) return __('low potential for improvement');
        return __('no potential for improvement');
    }

    /*
    *  Determines the number of screening questions to reduce queries for calculation purposes.
     * If questions are added during production mode, use the development command
    *  "reevaluate projects" in the dev section to update this value.
     */
    public function updateScreeningCount(): bool
    {
        $changesMade = false;
        $screeningType = ProjectStageType::where('shortname', '=', 'screening')->first();
        $scopingType = ProjectStageType::where('shortname', '=', 'scoping')->first();
        $screeningQuestionnaireIds = Questionnaire::where('type_id', '=', $screeningType['id'])->orWhere('type_id', '=', $scopingType['id'])->pluck('id');
        $this['scr_count'] = Content::whereIn('questionnaire_id', $screeningQuestionnaireIds)->count();
        if($this->isDirty())
        {
            $this->timestamps = false;
            $this->save();
            $changesMade = true;
        }
        return $changesMade;
    }

    /*
    *  Determines the number of appraisal questions to reduce queries for calculation purposes.
     * If questions are added during production mode, use the development command
    *  "reevaluate projects" in the dev section to update this value.
     */
    public function updateAppraisalCount(): bool
    {
        $changesMade = false;
        $focusedIds = FocusedItem::where([['project_id', $this['id']], ['is_focused', true]])->pluck('content_id');
        $this['app_count'] = Content::whereIn('screening_id', $focusedIds)->where('priority', '>=', $this['app_mode'])->count();
        if($this->isDirty())
        {
            $this->timestamps = false;
            $this->save();
            $changesMade = true;
        }
        return $changesMade;
    }

    public function updateScreeningData(): void
    {
        $data = [];

        $this['scr_data'] = json_encode($data);
        $this['scr_changes'] = 0;
        $this->timestamps = false;
        $this->save();
    }

    public function updateAppraisalData(): void
    {
        set_time_limit(1500);

        $maxAlpha = 255.0;
        $addToArrowAlpha = 32.0;

        $stageType = ProjectStageType::where('shortname', 'appraisal')->first();
        $questionnaires = Questionnaire::where('type_id', $stageType['id'])->get();
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

            foreach ($healthImpactTypes as $type)
            {
                $healthImpacts[$type['id']] = [ 'value' => 0, 'normalized' => 0, 'color' => 'fff0', 'arrowColor' => 'fff0' ];
            }

            foreach ($effectTypes as $effectType)
            {
                $positive = $effectType->getMeanValueForQuestionnaire($this, $questionnaire, 'positive');
                $negative = $effectType->getMeanValueForQuestionnaire($this, $questionnaire, 'negative');

                $effects[$effectType['id']]['positive'] = $positive;
                $effects[$effectType['id']]['negative'] = $negative;
                $data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxPositive'] = max($data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxPositive'] ?? 0, $positive);
                $data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxNegative'] = max($data['questionnaires'][$questionnaire['id']]['misc']['effects']['maxNegative'] ?? 0, $negative);

                $data['questionnaires'][0]['effects'][$effectType['id']]['positive'] += $positive;
                $data['questionnaires'][0]['effects'][$effectType['id']]['negative'] += $negative;
                $data['questionnaires'][0]['misc']['effects']['maxPositive'] = max($data['questionnaires'][0]['misc']['effects']['maxPositive'] ?? 0, $positive);
                $data['questionnaires'][0]['misc']['effects']['maxNegative'] = max($data['questionnaires'][0]['misc']['effects']['maxNegative'] ?? 0, $negative);

                $difference = $positive - $negative;
                $sum = abs($positive) + abs($negative);
                $alpha = min((abs($difference) + $sum * 0.0625), 1.0);
                $alpha = round($alpha * $maxAlpha);
                $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                $color = ($difference >= 0.0 ? '#198754' : '#dc3545') . $alphaHex;
                $arrowColor = ($difference >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));

                $effects[$effectType['id']]['color'] = $color;
                $effects[$effectType['id']]['arrowColor'] = $arrowColor;
                $effects[$effectType['id']]['alpha'] = $alpha;

                foreach ($effectType['healthImpacts'] as $healthImpact)
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

                foreach ($healthImpacts as $key => $healthImpact)
                {
                    $alpha = min(abs($healthImpact['normalized']), 1.0);
                    $alpha = round($alpha * $maxAlpha);
                    $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                    $color = ($healthImpact['normalized'] >= 0.0 ? '#198754' : '#dc3545') . $alphaHex;
                    $arrowColor = ($healthImpact['normalized'] >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));
                    $healthImpacts[$key]['color'] = $color;
                    $healthImpacts[$key]['arrowColor'] = $arrowColor;
                    $healthImpacts[$key]['alpha'] = $alpha;
                }
            }

            $data['questionnaires'][$questionnaire['id']]['effects'] = $effects;
            $data['questionnaires'][$questionnaire['id']]['healthImpacts'] = $healthImpacts;
        }

        // calculate data on how EFFECTS affect health impacts and are affected by questionnaires in turn
        foreach($questionnaires as $questionnaire) $data['effects'][0]['questionnaires'][$questionnaire['id']] = [ 'positive' => 0, 'negative' => 0 ];
        foreach($healthImpactTypes as $type) $data['effects'][0]['healthImpacts'][$type['id']] = [ 'value' => 0, 'normalized' => 0 ];
        $effects = array();

        foreach ($effectTypes as $effectType)
        {
            $effects[$effectType['id']] = [ 'positive' => 0, 'negative' => 0 ];
            $healthImpacts = array();
            $categories = array();

            foreach ($healthImpactTypes as $type)
            {
                $healthImpacts[$type['id']] = [ 'value' => 0, 'normalized' => 0, 'color' => 'fff0', 'arrowColor' => 'fff0' ];
            }

            $questionnaireCount = 0;
            foreach ($questionnaires as $questionnaire)
            {
                $positive = $data['questionnaires'][$questionnaire['id']]['effects'][$effectType['id']]['positive'];
                $negative = $data['questionnaires'][$questionnaire['id']]['effects'][$effectType['id']]['negative'];

                $categories[$questionnaire['id']]['positive'] = $positive;
                $categories[$questionnaire['id']]['negative'] = $negative;
                $effects[$effectType['id']]['positive'] += $positive;
                $effects[$effectType['id']]['negative'] += $negative;
                if($positive !== 0.0 || $negative !== 0.0) $questionnaireCount++;

                $data['effects'][0]['questionnaires'][$questionnaire['id']]['positive'] += $positive;
                $data['effects'][0]['questionnaires'][$questionnaire['id']]['negative'] += $negative;

                $difference = $positive - $negative;
                $sum = abs($positive) + abs($negative);
                $alpha = min((abs($difference) + $sum * 0.125) * 1.5, 1.0);
                $alpha = round($alpha * $maxAlpha);
                $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                $color = ($difference >= 0.0 ? '#198754' : '#dc3545') . $alphaHex;
                $arrowColor = ($difference >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));

                $categories[$questionnaire['id']]['color'] = $color;
                $categories[$questionnaire['id']]['arrowColor'] = $arrowColor;

                $categories[$questionnaire['id']]['alpha'] = $alpha;
            }

            // adjust values
            if($questionnaireCount >= 1)
            {
                $effects[$effectType['id']]['positive'] /= $questionnaireCount;
                $effects[$effectType['id']]['negative'] /= $questionnaireCount;

                // health impacts for EFFECTS view
                foreach($effectType['healthImpacts'] as $healthImpact)
                {
                    $difference = $effects[$effectType['id']]['positive'] - $effects[$effectType['id']]['negative'];
                    $value = $difference * ($healthImpact['type']['is_positive'] ? 1.0 : -1.0);
                    $healthImpacts[$healthImpact['type']['id']]['value'] += $value;
                    $healthImpacts[$healthImpact['type']['id']]['normalized'] += $difference;

                    $data['effects'][0]['healthImpacts'][$healthImpact['type']['id']]['value'] += $value;
                    $data['effects'][0]['healthImpacts'][$healthImpact['type']['id']]['normalized'] += $difference;
                }
            }

            foreach($healthImpacts as $key => $healthImpact)
            {
                $alpha = min(abs($healthImpact['normalized']), 1.0);
                $alpha = round($alpha * $maxAlpha);
                $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                $color = ($healthImpact['normalized'] >= 0.0 ? '#198754' : '#dc3545') . $alphaHex;
                $arrowColor = ($healthImpact['normalized'] >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));
                $healthImpacts[$key]['color'] = $color;
                $healthImpacts[$key]['alpha'] = $alpha;
                $healthImpacts[$key]['arrowColor'] = $arrowColor;
            }

            if($questionnaireCount > 1)
            {
                $data['effects'][0]['questionnaires'][$questionnaire['id']]['positive'] /= $questionnaireCount;
                $data['effects'][0]['questionnaires'][$questionnaire['id']]['negative'] /= $questionnaireCount;
            }

            $positive = $effects[$effectType['id']]['positive'];
            $negative = $effects[$effectType['id']]['negative'];
            $difference = $positive - $negative;
            $sum = abs($positive) + abs($negative);
            $alpha = min((abs($difference) + $sum * 0.0625) * 1.5, 1.0);
            $alpha = round($alpha * $maxAlpha);
            $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
            $color = ($difference >= 0.0 ? '#198754' : '#dc3545') . $alphaHex;
            $effects[$effectType['id']]['color'] = $color;
            $effects[$effectType['id']]['alpha'] = $alpha;

            $data['effects'][$effectType['id']]['questionnaires'] = $categories;
            $data['effects'][$effectType['id']]['effects'] = $effects;
            $data['effects'][$effectType['id']]['healthImpacts'] = $healthImpacts;
        }

        // calculate data on how HEALTH IMPACTS are affected by effects and what impact questionnaires have on effects
        foreach($questionnaires as $questionnaire) $data['healthImpacts'][0]['questionnaires'][$questionnaire['id']] = [ 'positive' => 0, 'negative' => 0 ];
        foreach($effectTypes as $type) $data['healthImpacts'][0]['effects'][$type['id']] = [ 'positive' => 0, 'negative' => 0 ];
        $healthImpacts = array();

        foreach ($healthImpactTypes as $impactType)
        {
            $effects = array();
            $healthImpacts[$impactType['id']] = [ 'value' => 0.0, 'normalized' => 0.0 ];
            $categories = array();

            foreach ($effectTypes as $effectType) $effects[$effectType['id']] = [ 'positive' => 0, 'negative' => 0, 'color' => 'fff0' ];
            foreach ($questionnaires as $questionnaire) $categories[$questionnaire['id']] = [ 'positive' => 0, 'negative' => 0, 'color' => 'fff0' ];

            $questionnaireCount = 0;
            foreach ($questionnaires as $questionnaire)
            {
                $hasEffect = false;
                foreach ($impactType['healthImpacts'] as $healthImpact)
                {
                    $effectType = $healthImpact['effectType'];
                    $positive = $data['effects'][$effectType['id']]['questionnaires'][$questionnaire['id']]['positive'];
                    $negative = $data['effects'][$effectType['id']]['questionnaires'][$questionnaire['id']]['negative'];
                    if($positive !== 0.0 || $negative !== 0.0) $hasEffect = true;

                    $categories[$questionnaire['id']]['positive'] += $positive;
                    $categories[$questionnaire['id']]['negative'] += $negative;

                    $data['healthImpacts'][0]['questionnaires'][$questionnaire['id']]['positive'] += $positive;
                    $data['healthImpacts'][0]['questionnaires'][$questionnaire['id']]['negative'] += $negative;
                }
                if($hasEffect) $questionnaireCount++;
            }
            $data['questionnaires'][0]['healthImpacts'][$impactType['id']]['value'] /= max($questionnaireCount, 1);
            $data['questionnaires'][0]['healthImpacts'][$impactType['id']]['normalized'] /= max($questionnaireCount, 1);

            foreach ($questionnaires as $questionnaire)
            {
                foreach ($impactType['healthImpacts'] as $healthImpact)
                {
                    $effectType = $healthImpact['effectType'];
                    $positive = $data['effects'][$effectType['id']]['questionnaires'][$questionnaire['id']]['positive'] / max($questionnaireCount, 1);
                    $negative = $data['effects'][$effectType['id']]['questionnaires'][$questionnaire['id']]['negative'] / max($questionnaireCount, 1);

                    $effects[$effectType['id']]['positive'] += $positive;
                    $effects[$effectType['id']]['negative'] += $negative;
                    $healthImpacts[$impactType['id']]['value'] += (($positive - $negative) * ($impactType['is_positive'] ? 1.0 : -1.0));

                    $data['healthImpacts'][0]['effects'][$healthImpact['effectType']['id']]['positive'] += $positive;
                    $data['healthImpacts'][0]['effects'][$healthImpact['effectType']['id']]['negative'] += $negative;
                }

                // determine colors for questionnaires
                $positive = $categories[$questionnaire['id']]['positive'];
                $negative = $categories[$questionnaire['id']]['negative'];

                $difference = $positive - $negative;
                $sum = abs($positive) + abs($negative);
                $alpha = min((abs($difference) + $sum * 0.0625), 1.0);
                // divide by a fraction of the questionnaireCount to credit the questionnaire's shared influence
                $alpha = round($alpha  * $maxAlpha);
                $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                $color = ($difference > 0.0 ? '#198754' : ($difference < 0.0 ? '#dc3545' : '#ffffff')) . $alphaHex;
                $arrowColor = ($difference >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));

                $categories[$questionnaire['id']]['color'] = $color;
                $categories[$questionnaire['id']]['arrowColor'] = $arrowColor;
                $categories[$questionnaire['id']]['alpha'] = $alpha;
            }

            // determine colors for effects
            foreach ($impactType['healthImpacts'] as $healthImpact)
            {
                $effectType = $healthImpact['effectType'];
                $positive = $effects[$effectType['id']]['positive'];
                $negative = $effects[$effectType['id']]['negative'];
                $difference = $positive - $negative;

                $sum = abs($positive) + abs($negative);
                $alpha = min((abs($difference) + $sum * 0.0625), 1.0);
                $alpha = round($alpha * $maxAlpha);
                $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
                $color = ($difference > 0.0 ? '#198754' : ($difference < 0.0 ? '#dc3545' : '#ffffff')) . $alphaHex;
                $arrowColor = ($difference > 0.0 ? '#198754' : ($difference < 0.0 ? '#dc3545' : '#ffffff')) . dechex(min($alpha + $addToArrowAlpha, 255.0));
                $effects[$effectType['id']]['color'] = $color;
                $effects[$effectType['id']]['arrowColor'] = $arrowColor;
            }

            $impactValue = $healthImpacts[$impactType['id']]['value'];
            $impactValue *= $impactType['is_positive'] ? 1.0 : -1.0;
            $alpha = min(abs($impactValue) * 0.625, 1.0);
            $alpha = round($alpha * $maxAlpha);
            $alphaHex = ($alpha < 16 ? '0' : '') . dechex($alpha);
            $color = ($impactValue > 0.0 ? '#198754' : ($impactValue < 0.0 ? '#dc3545' : '#ffffff')) . $alphaHex;
            $arrowColor = ($difference >= 0.0 ? '#198754' : '#dc3545') . dechex(min($alpha + $addToArrowAlpha, 255.0));

            $healthImpacts[$impactType['id']]['color'] = $color;
            $healthImpacts[$impactType['id']]['arrowColor'] = $arrowColor;
            $healthImpacts[$impactType['id']]['alpha'] = $alpha;

            $data['healthImpacts'][$impactType['id']]['questionnaires'] = $categories;
            $data['healthImpacts'][$impactType['id']]['effects'] = $effects;
            $data['healthImpacts'][$impactType['id']]['healthImpacts'] = $healthImpacts;
        }

        $this['app_data'] = json_encode($data);
        $this['app_changes'] = 0;
        $this->timestamps = false;
        $this->save();
    }

    use MembershipCountTrait;
    use StageCountTrait;
}
