<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconAction extends Component
{
    public string $action;
    public string|null $class;
    public string|null $id;

    public string $icon;
    public string $color;
    public string|null $htmlColor;
    public int $opacity;
    public string $tooltip;
    public string $tooltipPosition;
    public float $size;
    public bool $rotateOnHover;
    public bool $disabled;

    public ?string $onClick;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action, string $icon, $onClick = null, string $class = null, string $id = null, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $tooltipPosition = 'top', $size = 0.9, $rotateOnHover = false, $disabled = false)
    {
        $this->action = $action;
        $this->class = $class;
        $this->id = $id;

        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->tooltipPosition = $tooltipPosition;
        $this->size = $size;
        $this->rotateOnHover = $rotateOnHover;
        $this->disabled = $disabled;

        $this->onClick = $onClick;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.icon-action');
    }
}
