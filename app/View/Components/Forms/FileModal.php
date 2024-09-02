<?php

namespace App\View\Components\Forms;

use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FileModal extends Component
{
    public File|null $file;
    public Collection $projects;
    public Collection $types;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $projects, Collection $types, File $file = null)
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
        return view('components.forms.file-modal');
    }
}
