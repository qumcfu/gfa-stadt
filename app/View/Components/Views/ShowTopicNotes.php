<?php

namespace App\View\Components\Views;

use App\Models\Topic;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowTopicNotes extends Component
{
    public Topic $topic;

    /**
     * Create a new component instance.
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.show-topic-notes');
    }
}
