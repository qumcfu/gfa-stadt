<?php

namespace App\View\Components\Modals;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SelectIcon extends Component
{
    public Collection $icons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $icons)
    {
        $this->icons = $icons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.select-icon');
    }
}
