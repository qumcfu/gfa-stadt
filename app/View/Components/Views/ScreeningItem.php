<?php

namespace App\View\Components\Views;

use Illuminate\View\Component;

class ScreeningItem extends ContentView
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.screening-item');
    }
}
