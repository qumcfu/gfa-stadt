<?php

namespace App\Livewire\Scoping;

use App\Models\Project;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ContentSelection extends Component
{
    public Project $project;
    public Collection $questionnaires;
    public ProjectStageType $stageType;
    public int $contentCount;

    public function mount(Project $project): void
    {
        $this->project = $project;

        // stage type is screening, as the screening results are shown to help project managers choose which items to focus on during appraisal
        $this->stageType = ProjectStageType::where('shortname', '=', 'screening')->first();
        $this->questionnaires = Questionnaire::where('type_id', '=', $this->stageType['id'])->orderBy('stage_order_id')->get();

        $this->contentCount = 0;
        foreach ($this->questionnaires as $questionnaire)
        {
            $this->contentCount += count($questionnaire['contents']);
        }

    }

    public function render()
    {
        return view('livewire.scoping.content-selection');
    }
}
