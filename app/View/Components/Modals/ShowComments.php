<?php

namespace App\View\Components\Modals;

use App\Models\Content;
use App\Models\Membership;
use App\Models\Project;
use Illuminate\View\Component;

class ShowComments extends Component
{
    public Content $content;
    public Project $project;
    public Membership $membership;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Content $content, Project $project, Membership $membership)
    {
        $this->content = $content;
        $this->project = $project;
        $this->membership = $membership;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-comments');
    }
}
