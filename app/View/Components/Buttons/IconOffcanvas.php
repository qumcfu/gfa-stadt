<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconOffcanvas extends Component
{
    public $id;
    public $icon;
    public $color;
    public $tooltip;
    public $position;
    public $heading;
    public $contents;
    public $size;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $id, string $icon, string $position, string $contents, $heading = null, string $color = 'primary', string $tooltip = '', $size = 0.9, bool $disabled = false)
    {
        $this->id = $id;
        $this->icon = $icon;
        $this->position = $position;
        $this->heading = $heading;
        $this->contents = $contents;
        $this->color = $color;
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
        return view('components.buttons.icon-offcanvas');
    }
}
