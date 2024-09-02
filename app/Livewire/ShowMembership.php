<?php

namespace App\Livewire;

use App\Models\Membership;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowMembership extends Component
{
    public Membership $membership;

    public function mount(Membership $membership)
    {
        $this->membership = $membership;
    }

    public function placeholder()
    {
        return <<<'HTML'
            <div class="placeholder-glow placeholder-wave">
                <div class="placeholder col-12 bg-success"></div>
            </div>
            HTML;
    }

    public function render()
    {
        return view('livewire.show-membership');
    }
}
