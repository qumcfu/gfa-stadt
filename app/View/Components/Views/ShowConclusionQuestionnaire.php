<?php

namespace App\View\Components\Views;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowConclusionQuestionnaire extends Component
{
    public Questionnaire $questionnaire;
    public ProjectStageType $stageType;
    public Project $project;

    /**
     * Create a new component instance.
     */
    public function __construct(Questionnaire $questionnaire, ProjectStageType $stageType, Project $project)
    {
        $this->questionnaire = $questionnaire;
        $this->stageType = $stageType;
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.show-conclusion-questionnaire');
    }
}
