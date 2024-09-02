<?php

namespace App\View\Components\Scripts;

use Illuminate\View\Component;

class SortableList extends Component
{
    public $handle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $handle = false)
    {
        $this->handle = $handle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.scripts.sortable-list');
    }
}
