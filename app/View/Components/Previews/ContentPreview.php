<?php

namespace App\View\Components\Previews;

use App\Models\Content;
use Illuminate\View\Component;

class ContentPreview extends Component
{
    public $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.previews.content-preview');
    }
}
