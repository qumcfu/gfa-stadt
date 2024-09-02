<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AddEffect extends Component
{
    public Collection $types;
    public Collection $questionnaires;
    public int $contentId;

    /**
     * Create a new component instance.
     */
    public function __construct(Collection $types, Collection $questionnaires, int $contentId = -1)
    {
        $this->types = $types;
        $this->questionnaires = $questionnaires;
        $this->contentId = $contentId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.add-effect');
    }
}
