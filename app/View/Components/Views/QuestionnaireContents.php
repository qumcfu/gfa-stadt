<?php

namespace App\View\Components\Views;

use App\Models\Membership;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\Questionnaire;
use Illuminate\View\Component;

class QuestionnaireContents extends Component
{
    public Questionnaire $questionnaire;
    public Project|null $project;
    public ProjectStage|null $stage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Questionnaire $questionnaire, Project $project = null, ProjectStage $stage = null)
    {
        $this->questionnaire = $questionnaire;
        $this->project = $project;
        $this->stage = $stage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.questionnaire-contents');
    }
}
