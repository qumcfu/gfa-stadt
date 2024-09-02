<?php

namespace App\View\Components\Localization;

use App\Models\ProjectStage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalSummaryInfo extends Component
{
    public ProjectStage $stage;
    /**
     * Create a new component instance.
     */
    public function __construct(ProjectStage $stage)
    {
        $this->stage = $stage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.appraisal-summary-info');
    }
}
