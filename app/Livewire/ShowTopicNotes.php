<?php

namespace App\Livewire;

use App\Models\Topic;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowTopicNotes extends Component
{
    public Topic $topic;

    public function mount(Topic $topic)
    {
        $this->topic = $topic;
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
        return view('livewire.show-topic-notes');
    }
}
