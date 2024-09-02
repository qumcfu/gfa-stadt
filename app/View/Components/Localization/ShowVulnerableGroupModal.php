<?php

namespace App\View\Components\Localization;

use App\Models\Content;
use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowVulnerableGroupModal extends Component
{
    public Content $group;
    public Project $project;

    /**
     * Create a new component instance.
     */
    public function __construct(Content $group, Project $project)
    {
        $this->group = $group;
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.show-vulnerable-group-modal');
    }
}
