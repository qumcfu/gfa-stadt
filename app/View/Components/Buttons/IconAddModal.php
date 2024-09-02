<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconAddModal extends Component
{
    public $icon;
    public $color;
    public $htmlColor;
    public $opacity;
    public $tooltip;
    public $size;
    public $disabled;

    public $target;

    public $orderId;

    public $modalTitle;
    public $modalBody;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $target, int $orderId, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $disabled = false, $modalTitle = null, $modalBody = null)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->disabled = $disabled;

        $this->target = $target;

        $this->orderId = $orderId;

        $this->modalTitle = $modalTitle;
        $this->modalBody = $modalBody;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.icon-add-modal');
    }
}
