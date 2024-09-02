<?php

namespace App\Livewire;

use App\Models\Membership;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class EditProjectMemberships extends Component
{
    public Project $project;
    public Membership $ownMembership;
    public Collection $roles;

    public function mount(Project $project, Membership $ownMembership, Collection $roles)
    {
        $this->project = $project;
        $this->ownMembership = $ownMembership;
        $this->roles = $roles;
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
        return view('livewire.edit-project-memberships');
    }
}
