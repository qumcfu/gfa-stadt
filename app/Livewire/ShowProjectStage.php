<?php

namespace App\Livewire;

use App\Models\ProjectStage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowProjectStage extends Component
{
    public ProjectStage $stage;

    public function mount(ProjectStage $stage)
    {
        $this->stage = $stage;
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
        return view('livewire.show-project-stage');
    }
}
