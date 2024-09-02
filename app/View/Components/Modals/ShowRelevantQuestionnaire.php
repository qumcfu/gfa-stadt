<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use App\Models\Questionnaire;
use Illuminate\View\Component;

class ShowRelevantQuestionnaire extends Component
{
    public Questionnaire $questionnaire;
    public Project $project;
    public string $key;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Questionnaire $questionnaire, Project $project, string $key)
    {
        $this->questionnaire = $questionnaire;
        $this->project = $project;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-relevant-questionnaire');
    }
}
