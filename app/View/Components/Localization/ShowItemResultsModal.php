<?php

namespace App\View\Components\Localization;

use Illuminate\View\Component;

class ShowItemResultsModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.localization.show-item-results-modal');
    }
}
