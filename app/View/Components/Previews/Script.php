<?php

namespace App\View\Components\Previews;

use App\Models\Content;
use Illuminate\View\Component;

class Script extends ContentPreview
{
    public $scripts;

    public function __construct(Content $content, $scripts = null)
    {
        parent::__construct($content);
        $this->scripts = $scripts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.previews.script');
    }
}
