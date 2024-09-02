<?php

namespace App\View\Components\Forms;

use App\Models\Section;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionModal extends Component
{
    public Section $section;
    public string $origin;

    /**
     * Create a new component instance.
     */
    public function __construct(string $origin, Section $section)
    {
        $this->section = $section;
        $this->origin = $origin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.section-modal');
    }
}
