<?php

namespace App\View\Components\Navigation;

use App\Models\Membership;
use App\Models\Project;
use App\Models\ProjectData;
use Illuminate\View\Component;

class ScreeningBar extends Component
{
    public $project;
    public $currentPage;
    public $pageCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, $currentPage, int $pageCount)
    {
        $this->project = $project;
        $this->currentPage = $currentPage;
        $this->pageCount = $pageCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation.screening-bar');
    }
}
