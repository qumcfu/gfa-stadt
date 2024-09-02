<?php

namespace App\View\Components\Buttons;

use App\Models\ColorCode;
use Illuminate\View\Component;

class RoundIconOpenPage extends Component
{
    public string $icon;
    public string $color;
    public ?ColorCode $colorCode;
    public string $tooltip;
    public string $tooltipPosition;
    public bool $disabled;

    public string $target;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $target, $color = 'primary', ColorCode $colorCode = null, $tooltip = '', $tooltipPosition = 'right', $disabled = false)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->colorCode = $colorCode;
        $this->tooltip = $tooltip;
        $this->tooltipPosition = $tooltipPosition;
        $this->disabled = $disabled;

        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.round-icon-open-page');
    }
}
