<?php

namespace App\View\Components\Modals;

use App\Models\Content;
use App\Models\Project;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\View\Component;

class ShowQuestionnaireResults extends Component
{
    public Project $project;
    public ProjectStageType $stageType;
    public Questionnaire $questionnaire;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, ProjectStageType $stageType, Questionnaire $questionnaire)
    {
        $this->project = $project;
        $this->stageType = $stageType;
        $this->questionnaire = $questionnaire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-questionnaire-results');
    }
}
