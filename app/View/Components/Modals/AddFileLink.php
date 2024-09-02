<?php

namespace App\View\Components\Modals;

use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AddFileLink extends Component
{
    public File $file;
    public Collection $projects;
    /**
     * Create a new component instance.
     */
    public function __construct(File $file, Collection $projects)
    {
        $this->file = $file;
        $this->projects = $projects;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.add-file-link');
    }
}
