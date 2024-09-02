<?php

namespace App\View\Components\Modals;

use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EditFile extends Component
{
    public File $file;
    public Collection $projects;
    public Collection $types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(File $file, Collection $projects, Collection $types)
    {
        $this->file = $file;
        $this->projects = $projects;
        $this->types = $types;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-file');
    }
}
