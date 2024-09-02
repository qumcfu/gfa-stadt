<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class TooltipIcon extends Component
{
    public string $icon;
    public string $color;
    public string|null $htmlColor;
    public int $opacity;
    public string $tooltip;
    public float $size;
    public string $alignment;
    public string $tooltipDirection;

    // if the icon sits next to an icon button, this keeps it in line
    public bool $actAsButton;
    public string $cursor;
    public bool $isHandle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $alignment = 'center', $tooltipDirection = 'top', $actAsButton = false, $cursor = 'inherit', $isHandle = false)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->alignment = $alignment;
        $this->tooltipDirection = $tooltipDirection;

        $this->actAsButton = $actAsButton;
        $this->cursor = $cursor;
        $this->isHandle = $isHandle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icons.tooltip-icon');
    }
}
