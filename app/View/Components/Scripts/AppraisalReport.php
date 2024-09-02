<?php

namespace App\View\Components\Scripts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalReport extends Component
{
    public int $chartActive; // is the chart shown on page load?

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $chartActive = 0)
    {
        $this->chartActive = $chartActive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scripts.appraisal-report');
    }
}
