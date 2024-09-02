<?php

namespace App\View\Components\Localization;

use App\Models\HealthImpactType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowRelevantHealthImpactType extends Component
{
    public HealthImpactType $impactType;
    public string $key;
    public float $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(HealthImpactType $impactType, string $key, float $value)
    {
        $this->impactType = $impactType;
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.localization.show-relevant-health-impact-type');
    }
}
