<?php

namespace App\View\Components\Views;

use App\Models\Content;
use App\Models\Project;
use App\Models\ProjectStageType;
use Illuminate\View\Component;

class ShowRelevantItem extends Component
{
    public Project $project;
    public ProjectStageType $stageType;
    public Content $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, ProjectStageType $stageType, Content $content)
    {
        $this->project = $project;
        $this->stageType = $stageType;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.show-relevant-item');
    }
}
