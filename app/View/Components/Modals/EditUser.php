<?php

namespace App\View\Components\Modals;

use App\Models\User;
use Illuminate\View\Component;

class EditUser extends Component
{
    public $user;
    public $groups;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, $groups)
    {
        $this->user = $user;
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.edit-user');
    }
}
