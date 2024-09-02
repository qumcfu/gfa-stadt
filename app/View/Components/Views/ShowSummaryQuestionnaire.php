<?php

namespace App\View\Components\Views;

use App\Models\ProjectStage;
use App\Models\Questionnaire;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ShowSummaryQuestionnaire extends Component
{
    public Questionnaire $questionnaire;
    public ProjectStage $stage;
    public ?Collection $effectTypes;
    /**
     * Create a new component instance.
     */
    public function __construct(Questionnaire $questionnaire, ProjectStage $stage, $effectTypes = null)
    {
        $this->questionnaire = $questionnaire;
        $this->stage = $stage;
        $this->effectTypes = $effectTypes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.show-summary-questionnaire');
    }
}
