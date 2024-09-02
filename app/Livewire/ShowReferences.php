<?php

namespace App\Livewire;

use App\Models\Questionnaire;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowReferences extends Component
{
    public Questionnaire $questionnaire;

    public function mount(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
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
        return view('livewire.show-references');
    }
}
