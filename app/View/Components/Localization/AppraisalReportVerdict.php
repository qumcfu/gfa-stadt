<?php

namespace App\View\Components\Localization;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalReportVerdict extends Component
{
    public Project $project;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.appraisal-report-verdict');
    }
}
