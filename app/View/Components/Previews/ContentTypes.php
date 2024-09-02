<?php

namespace App\View\Components\Previews;

use Illuminate\View\Component;

class ContentTypes extends Component
{
    public $content;
    public $scripts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content = null, $scripts = null)
    {
        $this->content = $content;
        $this->scripts = $scripts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.previews.content-types');
    }
}
