<?php

namespace App\View\Components\Navigation;

use App\Models\Membership;
use Illuminate\View\Component;

class ScopingBar extends Component
{
    public $membership;
    public $currentPage;
    public $pageCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Membership $membership, $currentPage, int $pageCount)
    {
        $this->membership = $membership;
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
        return view('components.navigation.scoping-bar');
    }
}
