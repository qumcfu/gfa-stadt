<?php

namespace App\View\Components\Modals;

use App\Models\ProjectStage;
use Illuminate\View\Component;

class ShowProjectStage extends Component
{
    public ProjectStage $stage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ProjectStage $stage)
    {
        $this->stage = $stage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-project-stage');
    }
}
