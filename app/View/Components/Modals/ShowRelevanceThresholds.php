<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use App\Models\ProjectStageType;
use Illuminate\View\Component;

class ShowRelevanceThresholds extends Component
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
        return view('components.modals.show-relevance-thresholds');
    }
}
