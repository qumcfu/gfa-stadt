<?php

namespace App\Livewire;

use App\Models\Content;
use App\Models\Entry;
use App\Models\ProjectStage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowOwnScreeningAssessment extends Component
{
    public Content $content;
    public ProjectStage $stage;
    public ?Entry $entry;

    public function mount(Content $content, ProjectStage $stage)
    {
        $this->content = $content;
        $this->stage = $stage;
        $this->entry = $content->getEntry($stage);
    }

    public function placeholder()
    {
        return <<<'HTML'
            <span class="placeholder-glow">
                <span class="placeholder col-7 me-1"></span><span class="placeholder col-2"></span>
            </span>
            HTML;
    }

    public function render()
    {
        return view('livewire.show-own-screening-assessment');
    }
}
