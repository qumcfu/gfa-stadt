<?php

namespace App\View\Components\Localization;

use App\Models\Questionnaire;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalInfo extends Component
{
    public Questionnaire $questionnaire;
    /**
     * Create a new component instance.
     */
    public function __construct(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.appraisal-info');
    }
}
