<?php

namespace App\View\Components\Forms;

use App\Models\Effect;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EffectModal extends Component
{
    public Effect|null $effect;
    public Collection $types;
    public Collection $questionnaires;

    /**
     * Create a new component instance.
     */
    public function __construct(Effect|null $effect, Collection $types, Collection $questionnaires)
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
        return view('components.forms.effect-modal');
    }
}
