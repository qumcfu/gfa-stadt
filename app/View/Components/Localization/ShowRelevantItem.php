<?php

namespace App\View\Components\Localization;

use App\Models\Content;
use App\Models\Project;
use App\Models\ProjectStageType;
use Illuminate\View\Component;

class ShowRelevantItem extends Component
{
    public Project $project;
    public Content $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, Content $content)
    {
        $this->project = $project;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.localization.show-relevant-item');
    }
}
