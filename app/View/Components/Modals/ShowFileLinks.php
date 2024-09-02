<?php

namespace App\View\Components\Modals;

use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowFileLinks extends Component
{
    public File $file;
    /**
     * Create a new component instance.
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.show-file-links');
    }
}
