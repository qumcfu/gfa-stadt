<?php

namespace App\View\Components\Modals;

use App\Models\Effect;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EditEffect extends Component
{
    public Effect $effect;
    public Collection $types;
    public Collection $questionnaires;

    /**
     * Create a new component instance.
     */
    public function __construct(Effect $effect, Collection $types, Collection $questionnaires)
    {
        $this->effect = $effect;
        $this->types = $types;
        $this->questionnaires = $questionnaires;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-effect');
    }
}
