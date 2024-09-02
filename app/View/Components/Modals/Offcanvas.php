<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Offcanvas extends Component
{
    public int $id;
    public string $position;
    public string $heading;
    public string $contents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $id, string $position, string $contents, $heading = null)
    {
        $this->id = $id;
        $this->position = $position;
        $this->heading = $heading;
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.offcanvas');
    }
}
