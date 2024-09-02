<?php

namespace App\View\Components\Previews;

use Illuminate\View\Component;

class ScreeningItem extends ContentPreview
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.previews.screening-item');
    }
}
