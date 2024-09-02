<?php

namespace App\View\Components\Localization;

use Illuminate\View\Component;

class ShowRelevantQuestionnaire extends Component
{
    public string $key;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.localization.show-relevant-questionnaire');
    }
}
