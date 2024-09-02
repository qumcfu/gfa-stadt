<?php

namespace App\View\Components\Forms;

use App\Models\Questionnaire;
use Illuminate\View\Component;

class QuestionnaireModal extends Component
{
    public Questionnaire|null $questionnaire;
    public string $origin;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $origin, Questionnaire $questionnaire = null)
    {
        $this->questionnaire = $questionnaire;
        $this->origin = $origin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.questionnaire-modal');
    }
}
