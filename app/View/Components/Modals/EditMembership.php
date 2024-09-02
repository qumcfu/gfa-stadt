<?php

namespace App\View\Components\Modals;

use App\Models\Membership;
use Illuminate\View\Component;

class EditMembership extends Component
{
    public $membership;
    public $projects;
    public $users;
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Membership $membership, $roles, $projects = null, $users = null)
    {
        $this->membership = $membership;
        $this->projects = $projects;
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.edit-membership');
    }
}
