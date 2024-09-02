<?php

namespace App\View\Components\Modals;

use App\Models\Effect;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteEffect extends Component
{
    public Effect $effect;

    /**
     * Create a new component instance.
     */
    public function __construct(Effect $effect)
    {
        $this->effect = $effect;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.delete-effect');
    }
}
