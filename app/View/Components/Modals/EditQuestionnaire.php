<?php

namespace App\View\Components\Modals;

use App\Models\Questionnaire;
use Illuminate\View\Component;

class EditQuestionnaire extends Component
{
    public Questionnaire $questionnaire;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.edit-questionnaire');
    }
}
