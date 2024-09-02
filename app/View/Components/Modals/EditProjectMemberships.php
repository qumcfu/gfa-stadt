<?php

namespace App\View\Components\Modals;

use App\Models\Membership;
use App\Models\Project;
use App\Models\Role;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EditProjectMemberships extends Component
{
    public Project $project;
    public Membership $ownMembership;
    public Collection $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, Membership $ownMembership)
    {
        $this->project = $project;
        $this->ownMembership = $ownMembership;
        $this->roles = Role::all()->sortByDesc('id');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-project-memberships');
    }
}
