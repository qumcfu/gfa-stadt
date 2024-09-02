<?php

namespace App\View\Components\Toasts;

use Illuminate\View\Component;

class Error extends Component
{
    public $message;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $message, int $id = 0)
    {
        $this->message = $message;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toasts.error');
    }
}
