<?php

namespace App\View\Components\Navigation;

use App\Models\ProjectStage;
use App\Models\Questionnaire;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalNav extends Component
{
    public ProjectStage $stage;
    public Questionnaire $questionnaire;
    /**
     * Create a new component instance.
     */
    public function __construct(ProjectStage $stage, Questionnaire $questionnaire)
    {
        $this->stage = $stage;
        $this->questionnaire = $questionnaire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.appraisal-nav');
    }
}
