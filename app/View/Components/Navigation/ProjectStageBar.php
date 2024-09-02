<?php

namespace App\View\Components\Navigation;

use App\Models\ProjectStage;
use Illuminate\View\Component;

class ProjectStageBar extends Component
{
    public $stage;
    public $currentPage;
    public $pageCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ProjectStage $stage, $currentPage, int $pageCount)
    {
        $this->stage = $stage;
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
        return view('components.navigation.project-stage-bar');
    }
}
