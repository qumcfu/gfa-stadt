<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use Illuminate\View\Component;

class DeleteProject extends Component
{
    public $project;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete-project');
    }
}
