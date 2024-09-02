<?php

namespace App\View\Components\Forms;

use App\Models\Project;
use Illuminate\View\Component;

class ProjectModal extends Component
{
    public Project|null $project;
    public string $origin;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $origin, Project $project = null)
    {
        $this->project = $project;
        $this->origin = $origin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.project-modal');
    }
}
