<?php

namespace App\View\Components\Scripts;

use Illuminate\View\Component;

class ScreeningReport extends Component
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
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.scripts.screening-report');
    }
}
