<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowProjectInfo extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
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
        return view('livewire.show-project-info');
    }
}
