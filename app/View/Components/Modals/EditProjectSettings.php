<?php

namespace App\View\Components\Modals;

use App\Models\Project;
use App\Models\ProjectSettings;
use Illuminate\View\Component;

class EditProjectSettings extends Component
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
        return view('components.modals.edit-project-settings');
    }
}
