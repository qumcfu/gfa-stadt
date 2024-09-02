<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use Illuminate\View\Component;

class ShowProject extends Component
{
    public Project $project;
    public int $activeMemberships;
    public int $inactiveMemberships;
    public int $activeStages;
    public int $inactiveStages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, int $activeMemberships, int $inactiveMemberships, int $activeStages, int $inactiveStages)
    {
        $this->project = $project;
        $this->activeMemberships = $activeMemberships;
        $this->inactiveMemberships = $inactiveMemberships;
        $this->activeStages = $activeStages;
        $this->inactiveStages = $inactiveStages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-project');
    }
}
