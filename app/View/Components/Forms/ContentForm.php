<?php

namespace App\View\Components\Forms;

use App\Models\Content;
use Illuminate\View\Component;

class ContentForm extends Component
{
    public Content $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Content $content = null)
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
        return view('components.forms.content-form');
    }
}
