<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconOnClick extends Component
{
    public string $function;
    public string|null $class;
    public string|null $id;

    public string $icon;
    public string $color;
    public string|null $htmlColor;
    public int $opacity;
    public string $tooltip;
    public float $size;
    public bool $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $function, string $icon, string $class = null, string $id = null, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $disabled = false)
    {
        $this->function = $function;
        $this->class = $class;
        $this->id = $id;

        $this->icon = $icon;
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
        return view('components.buttons.icon-on-click');
    }
}
