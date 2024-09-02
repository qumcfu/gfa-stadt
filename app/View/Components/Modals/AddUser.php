<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class AddUser extends Component
{
    public $groups;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($groups)
    {
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.add-user');
    }
}
