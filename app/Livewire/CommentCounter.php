<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CommentCounter extends Component
{
    public int $commentCount = 0;
    public int $itemCount = 0;

    public int $lastContentId = 0;

    #[On('show-comment')]
    public function incrementCommentCount(int $contentId)
    {
        $this->commentCount++;
        if($contentId > 0 && $contentId !== $this->lastContentId)
        {
            $this->itemCount++;
            $this->lastContentId = $contentId;
        }
    }

    public function render()
    {
        return view('livewire.comment-counter');
    }
}
