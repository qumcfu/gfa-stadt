<?php

namespace App\View\Components\Modals;

use App\Models\ColorCode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditColor extends Component
{
    public ColorCode $color;

    /**
     * Create a new component instance.
     */
    public function __construct(ColorCode $color)
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-color');
    }
}
