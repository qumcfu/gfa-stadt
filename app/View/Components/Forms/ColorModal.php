<?php

namespace App\View\Components\Forms;

use App\Models\ColorCode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColorModal extends Component
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
        return view('components.forms.color-modal');
    }
}
