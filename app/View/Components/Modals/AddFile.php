<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AddFile extends Component
{
    public Collection $projects;
    public Collection $types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $projects, Collection $types)
    {
        $this->projects = $projects;
        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.add-file');
    }
}
