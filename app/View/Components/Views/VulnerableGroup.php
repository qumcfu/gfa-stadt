<?php

namespace App\View\Components\Views;

use Illuminate\View\Component;

class VulnerableGroup extends ContentView
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.vulnerable-group');
    }
}
