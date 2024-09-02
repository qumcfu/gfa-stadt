<?php

namespace App\View\Components\Views;

use App\Models\Comment;
use Illuminate\View\Component;

class ShowComment extends Component
{
    public Comment $comment;
    public int $level;
    public bool $allowInteraction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, int $level = 0, bool $allowInteraction = true)
    {
        $this->comment = $comment;
        $this->level = $level;
        $this->allowInteraction = $allowInteraction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.show-comment');
    }
}
