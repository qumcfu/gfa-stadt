<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowProjectInfo extends Component
{
    public Project $project;

    /**
     * Create a new component instance.
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.show-project-info');
    }
}
