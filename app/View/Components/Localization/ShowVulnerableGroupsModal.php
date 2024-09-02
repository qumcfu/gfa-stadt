<?php

namespace App\View\Components\Localization;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowVulnerableGroupsModal extends Component
{
    public int $groupCount;

    /**
     * Create a new component instance.
     */
    public function __construct(int $groupCount)
    {
        $this->groupCount = $groupCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.show-vulnerable-groups-modal');
    }
}
