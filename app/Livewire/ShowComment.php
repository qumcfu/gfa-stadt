<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class ShowComment extends Component
{
    public Comment $comment;
    public int $level;
    public bool $allowInteraction;

    public function mount(Comment $comment, int $level = 0, bool $allowInteraction = true): void
    {
        $this->comment = $comment;
        $this->level = $level;
        $this->allowInteraction = $allowInteraction;

        $this->dispatch('show-comment', contentId:($comment['entry']['content_id'] ?? 0));
    }

    public function render()
    {
        return view('livewire.show-comment');
    }
}
