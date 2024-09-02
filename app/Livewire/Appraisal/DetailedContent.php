<?php

namespace App\Livewire\Appraisal;

use App\Models\Content;
use App\Models\Project;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class DetailedContent extends Component
{
    public Project $project;
    public Content $content;

    public int $yesAnswerCount;
    public bool $yesIsMostCommonAnswer;
    public bool $yesIsPositive;
    public int $noAnswerCount;
    public bool $noIsMostCommonAnswer;
    public bool $noIsPositive;
    public int $unknownAnswerCount;
    public bool $unknownIsMostCommonAnswer;
    public int $irrelevantAnswerCount;
    public bool $irrelevantIsMostCommonAnswer;
    public int $ratedCount;
    public int $totalMembershipCount;

    public function mount(Project $project, Content $content): void
    {
        $this->project = $project;
        $this->content = $content;

        $entries = $content->getEntries($project);

        $yes = 0; $no = 0; $unknown = 0; $irrelevant = 0;

        foreach ($entries as $entry)
        {
            if($entry['positive'] === 1.0)
            {
                $yes++;
            }
            else if ($entry['negative'] === 1.0)
            {
                $no++;
            }
            else if ($entry['positive'] === -1.0 && $entry['negative'] === -1.0)
            {
                $unknown++;
            }
            else if ($entry['positive'] === -2.0 && $entry['negative'] === -2.0)
            {
                $irrelevant++;
            }
        }
        $this->yesIsMostCommonAnswer = $yes > 0 && $yes >= $no && $yes >= $unknown && $yes >= $irrelevant;
        $this->noIsMostCommonAnswer = $no > 0 && $no >= $yes && $no >= $unknown && $no >= $irrelevant;
        $this->unknownIsMostCommonAnswer = $unknown > 0 && $unknown >= $yes && $unknown >= $no && $unknown >= $irrelevant;
        $this->irrelevantIsMostCommonAnswer = $irrelevant > 0 && $irrelevant >= $yes && $irrelevant >= $no && $irrelevant >= $unknown;

        $this->yesAnswerCount = $yes;
        $this->noAnswerCount = $no;
        $this->unknownAnswerCount = $unknown;
        $this->irrelevantAnswerCount = $irrelevant;
        $this->ratedCount = $yes + $no + $unknown + $irrelevant;
        $this->totalMembershipCount = count($project->getActiveMemberships());

        $yesEffectSize = $content->getPositiveEffectSize();
        $noEffectSize = $content->getNegativeEffectSize();

        $this->yesIsPositive = $yesEffectSize > 0;
        $this->noIsPositive = $noEffectSize > 0;
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div class="placeholder-glow placeholder-wave col-6">
                <div class="placeholder col-2 bg-secondary"></div>
                <div class="placeholder col-3 bg-secondary"></div>
                <div class="placeholder col-1 bg-secondary"></div>
            </div>
            HTML;
    }

    public function render(): View
    {
        return view('livewire.appraisal.detailed-content');
    }
}
