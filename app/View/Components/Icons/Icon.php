<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class Icon extends Component
{
    public $icon;
    public $color;
    public $htmlColor;
    public $opacity;
    public $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, $color = 'primary', $htmlColor = null, int $opacity = 100, $size = 0.9)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icons.icon');
    }
}
