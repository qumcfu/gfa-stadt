<?php

namespace App\View\Components\Localization;

use App\Models\Project;
use App\Models\ProjectStageType;
use Illuminate\View\Component;

class ShowRelevanceThreshold extends Component
{
    public Project $project;
    public ProjectStageType $stageType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, ProjectStageType $stageType)
    {
        $this->project = $project;
        $this->stageType = $stageType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.localization.show-relevance-threshold');
    }
}
