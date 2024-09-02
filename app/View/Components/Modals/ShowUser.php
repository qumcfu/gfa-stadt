<?php

namespace App\View\Components\Modals;

use App\Models\User;
use Illuminate\View\Component;

class ShowUser extends Component
{
    public User $user;
    public int $activeMemberships;
    public int $inactiveMemberships;
    public int $activeStages;
    public int $inactiveStages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, int $activeMemberships, int $inactiveMemberships, int $activeStages, int $inactiveStages)
    {
        $this->user = $user;
        $this->activeMemberships = $activeMemberships;
        $this->inactiveMemberships = $inactiveMemberships;
        $this->activeStages = $activeStages;
        $this->inactiveStages = $inactiveStages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.show-user');
    }
}
