<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewTutorialVideo extends Component
{
    public string $page;

    /**
     * Create a new component instance.
     */
    public function __construct(string $page)
    {
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.view-tutorial-video');
    }
}
