<?php

namespace App\View\Components\Modals;

use App\Models\Membership;
use Illuminate\View\Component;

class ShowMembership extends Component
{
    public Membership $membership;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Membership $membership)
    {
        $this->membership = $membership;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-membership');
    }
}
