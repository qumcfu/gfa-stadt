<?php

namespace App\View\Components\Views;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ShowAppraisalReportSummary extends Component
{
    public Project $project;
    public Collection $effectTypes;
    public Collection $questionnaires;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, Collection $effectTypes, Collection $questionnaires)
    {
        $this->project = $project;
        $this->effectTypes = $effectTypes;
        $this->questionnaires = $questionnaires;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.show-appraisal-report-summary');
    }
}
