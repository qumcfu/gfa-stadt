<?php

namespace App\View\Components\Modals;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CreateMembership extends Component
{
    public Authenticatable|null $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id']))
        {
            $currentUser = User::where('id', $currentUser['impersonate_id'])->first();
        }

        $this->user = $currentUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.create-membership');
    }
}
