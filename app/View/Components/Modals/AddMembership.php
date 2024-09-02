<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class AddMembership extends Component
{
    public $currentUser;
    public $currentProject;
    public $users;
    public $projects;
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($roles, $currentUser = null, $currentProject = null, $users = null, $projects = null)
    {
        $this->currentUser = $currentUser;
        $this->currentProject = $currentProject;
        $this->users = $users;
        $this->projects = $projects;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.add-membership');
    }
}
