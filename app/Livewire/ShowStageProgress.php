<?php

namespace App\Livewire;

use App\Models\ProjectStage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowStageProgress extends Component
{
    public ProjectStage $stage;

    public function mount(ProjectStage $stage)
    {
        $this->stage = $stage;
    }

    public function placeholder()
    {
        return <<<'HTML'
            <span>
                <h5 class="text-body-secondary my-0 py-2 text-nowrap">{!! __(':percent completed', ['percent' => '<span class="placeholder-wave"><span class="placeholder placeholder-lg col-2"></span></span> %']) !!}</h5>
            </span>
            HTML;
    }

    public function render()
    {
        return view('livewire.show-stage-progress');
    }
}
