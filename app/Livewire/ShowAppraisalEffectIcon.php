<?php

namespace App\Livewire;

use App\Models\Content;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowAppraisalEffectIcon extends Component
{
    public Content $content;

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function placeholder()
    {
        return <<<'HTML'
            <span><i class="bi-question-circle text-secondary"></i></span>
            HTML;
    }

    public function render()
    {
        return view('livewire.show-appraisal-effect-icon');
    }
}
