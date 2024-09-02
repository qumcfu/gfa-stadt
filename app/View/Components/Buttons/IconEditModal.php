<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconEditModal extends Component
{
    public $icon;
    public $color;
    public $htmlColor;
    public $opacity;
    public $tooltip;
    public $size;
    public bool $rotateOnHover;
    public $disabled;

    public $target;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $target, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, bool $rotateOnHover = false, $disabled = false)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->rotateOnHover = $rotateOnHover;
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
        return view('components.buttons.icon-edit-modal');
    }
}
