<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Icon extends Component
{
    public $icon;
    public $action;
    public $color;
    public $htmlColor;
    public $opacity;
    public $tooltip;
    public $size;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, $action = '/', $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $disabled = false)
    {
        $this->icon = $icon;
        $this->action = $action;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.icon');
    }
}
