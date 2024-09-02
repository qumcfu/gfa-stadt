<?php

namespace App\View\Components\Views;

use App\Models\Questionnaire;
use App\Models\Topic;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowTopicContainer extends Component
{
    public Topic $topic;
    public Questionnaire $questionnaire;
    public int $width;

    /**
     * Create a new component instance.
     */
    public function __construct(Topic $topic, Questionnaire $questionnaire, int $width = 12)
    {
        $this->topic = $topic;
        $this->questionnaire = $questionnaire;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.show-topic-container');
    }
}
