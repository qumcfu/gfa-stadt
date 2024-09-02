<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Script extends ContentForm
{
    public $scripts;

    public function __construct($scripts = null, $content = null)
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
        return view('components.forms.script');
    }
}
