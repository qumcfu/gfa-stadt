<?php

namespace App\View\Components\Modals;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SelectColor extends Component
{
    public Collection $colors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $colors)
    {
        $this->colors = $colors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.select-color');
    }
}
