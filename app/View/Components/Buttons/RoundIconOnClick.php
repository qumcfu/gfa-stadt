<?php

namespace App\View\Components\Buttons;

use App\Models\ColorCode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoundIconOnClick extends Component
{
    public string $icon;
    public string $color;
    public ?ColorCode $colorCode;
    public string $tooltip;
    public string $tooltipPosition;
    public bool $disabled;

    public string $onClick;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $onClick, $color = 'primary', ColorCode $colorCode = null, $tooltip = '', $tooltipPosition = 'right', $disabled = false)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->colorCode = $colorCode;
        $this->tooltip = $tooltip;
        $this->tooltipPosition = $tooltipPosition;
        $this->disabled = $disabled;

        $this->onClick = $onClick;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.round-icon-on-click');
    }
}
