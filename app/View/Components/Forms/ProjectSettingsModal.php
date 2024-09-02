<?php

namespace App\View\Components\Forms;

use App\Models\ProjectSettings;
use Illuminate\View\Component;

class ProjectSettingsModal extends Component
{
    public ProjectSettings $settings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ProjectSettings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.project-settings-modal');
    }
}
