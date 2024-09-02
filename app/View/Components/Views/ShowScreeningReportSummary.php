<?php

namespace App\View\Components\Views;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ShowScreeningReportSummary extends Component
{
    public Project $project;
    public Collection $questionnaires;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, Collection $questionnaires)
    {
        $this->project = $project;
        $this->questionnaires = $questionnaires;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.show-screening-report-summary');
    }
}
