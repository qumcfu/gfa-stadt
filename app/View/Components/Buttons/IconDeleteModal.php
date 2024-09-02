<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class IconDeleteModal extends Component
{
    public $icon;
    public $color;
    public $htmlColor;
    public $opacity;
    public $tooltip;
    public $size;
    public $disabled;

    public $target;

    public $id;
    public $userName;
    public $projectName;
    public $scriptName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $target, int $id, $color = 'primary', $htmlColor = null, int $opacity = 100, $tooltip = '', $size = 0.9, $disabled = false, $userName = null, $projectName = null, $scriptName = null)
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->htmlColor = $htmlColor;
        $this->opacity = $opacity;
        $this->tooltip = $tooltip;
        $this->size = $size;
        $this->disabled = $disabled;

        $this->target = $target;

        $this->id = $id;
        $this->userName = $userName;
        $this->projectName = $projectName;
        $this->scriptName = $scriptName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.icon-delete-modal');
    }
}
