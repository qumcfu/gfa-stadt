<?php

namespace App\View\Components\Modals;

use App\Models\Section;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditSection extends Component
{
    public Section $section;

    /**
     * Create a new component instance.
     */
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-section');
    }
}
