<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class AddModal extends Component
{
    public $label;
    public $color;
    public $tooltip;
    public $disabled;

    public $target;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $target, $color = 'primary', $tooltip = '', $disabled = false)
    {
        $this->label = $label;
        $this->color = $color;
        $this->tooltip = $tooltip;
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
        return view('components.buttons.add-modal');
    }
}
