<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class UserModal extends Component
{
    public $user;
    public $groups;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($groups, $user = null)
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
        return view('components.forms.user-modal');
    }
}
