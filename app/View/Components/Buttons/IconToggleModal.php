<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconToggleModal extends Component
{
    public string $icon;
    public string|null $color;
    public string|null $htmlColor;
    public int $opacity;
    public string $tooltip;
    public float $size;
    public bool $disabled;

    public string $target;
    public string|null $origin;
    public string|null $type;
    public string|null $value;
    public string|null $name;
    public int|null $id;
    public int|null $modalId;
    public int|null $orderId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $target, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $origin = null, $type = null, $value = null, $name = null, $id = null, $modalId = null, $orderId = null, $disabled = false)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->disabled = $disabled;

        $this->target = $target;
        $this->origin = $origin;
        $this->type = $type;
        $this->value = $value;
        $this->name = $name;
        $this->id = $id;
        $this->modalId = $modalId;
        $this->orderId = $orderId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.icon-toggle-modal');
    }
}
