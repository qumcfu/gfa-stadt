<?php

namespace App\View\Components\Modals;

use App\Models\HealthImpactType;
use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowRelevantHealthImpactType extends Component
{
    public Project $project;
    public HealthImpactType $impactType;

    public float $normalizedValue;
    public array $valuesPerQuestionnaire;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Project $project, HealthImpactType $impactType)
    {
        $this->project = $project;
        $this->impactType = $impactType;

        $appraisalData = json_decode($this->project['app_data'], true);

        $this->normalizedValue = $appraisalData['questionnaires'][0]['healthImpacts'][$impactType['id']]['normalized'] ?? 0;
        $this->valuesPerQuestionnaire = $appraisalData['healthImpacts'][$impactType['id']]['questionnaires'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.show-relevant-health-impact-type');
    }
}
