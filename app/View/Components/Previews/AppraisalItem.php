<?php

namespace App\View\Components\Previews;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppraisalItem extends ContentPreview
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.previews.appraisal-item');
    }
}
