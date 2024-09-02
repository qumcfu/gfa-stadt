<?php

namespace App\View\Components\Modals;

use App\Models\Script;
use Illuminate\View\Component;

class DeleteScript extends Component
{
    public $script;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Script $script)
    {
        $this->script = $script;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete-script');
    }
}
