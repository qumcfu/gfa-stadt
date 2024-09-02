<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class ToggleModal extends Component
{
    public string $color;
    public string|null $tooltip;
    public bool $disabled;
    public string|null $class;

    public string|null $icon;
    public string|null $iconHtmlColor;

    public string $target;
    public string|null $origin;
    public string|null $type;
    public string|null $value;
    public int|null $orderId;
    public int|null $currentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $target, $color = 'primary', $tooltip = '', $class= null, $icon = null, $iconHtmlColor = null, $origin = null, $type = null, $value = null, $orderId = null, $currentId = null, $disabled = false)
    {
        $this->color = $color;
        $this->tooltip = $tooltip;
        $this->disabled = $disabled;
        $this->class = $class;

        $this->icon = $icon;
        $this->iconHtmlColor = $iconHtmlColor;

        $this->target = $target;
        $this->origin = $origin;
        $this->type = $type;
        $this->value = $value;
        $this->orderId = $orderId;
        $this->currentId = $currentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.toggle-modal');
    }
}
