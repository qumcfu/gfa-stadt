<?php

namespace App\Livewire\Appraisal;

use App\Models\HealthImpactType;
use App\Models\Project;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class HealthImpactChart extends Component
{
    public Project $project;
    public Collection $questionnaires;
    private Collection $healthImpactTypes;

    public int $currentQuestionnaireId;
    public int $currentModeId;
    private bool $hasBeenInitialized = false;

    public function mount(Project $project, Collection $questionnaires)
    {
        $this->currentQuestionnaireId = 0;
        $this->currentModeId = 0;

        $this->project = $project;
        $this->questionnaires = $questionnaires;
        $this->healthImpactTypes = HealthImpactType::all();

        $this->updateChart();
    }

    public function updated()
    {
        $this->healthImpactTypes = HealthImpactType::all();
        $this->updateChart();
    }

    public function updateChart()
    {
        $labels = [];
        $valueMultiplier = 10.0;
        foreach ($this->healthImpactTypes as $type)
        {
            $labels[] = __($type['name']);
        }

        $positiveData = [];
        $negativeData = [];

        $appraisalData = json_decode($this->project['app_data'], true);

        foreach($appraisalData['questionnaires'][$this->currentQuestionnaireId]['healthImpacts'] ?? [] as $key => $impact)
        {
            $normalizeValue = $this->currentModeId === 0 ? 1 : max(count($this->healthImpactTypes[$key - 1]['healthImpacts'] ?? []), 1);

            $positiveData[] = max(($impact['normalized'] / $normalizeValue) * $valueMultiplier, 0) * ($this->healthImpactTypes[$key - 1]['is_positive'] ? 1.0 : -1.0);
            $negativeData[] = min(($impact['normalized'] / $normalizeValue) * $valueMultiplier, 0) * ($this->healthImpactTypes[$key - 1]['is_positive'] ? 1.0 : -1.0);
        }

        $positiveMax = $this->currentModeId === 0 ? (($appraisalData['questionnaires'][$this->currentQuestionnaireId]['misc']['healthImpacts']['maxNormalized'] ?? -1000) * $valueMultiplier + 1) : 1;
        $negativeMin = $this->currentModeId === 0 ? (($appraisalData['questionnaires'][$this->currentQuestionnaireId]['misc']['healthImpacts']['minNormalized'] ?? -1000) * $valueMultiplier - 1) : -1;
        $positiveLabel = __('Improvement');
        $positiveColor = '#157347';
        $negativeLabel = __('Deterioration');
        $negativeColor = '#bb2d3b';

        $chartData = [ 'labels' => $labels, 'positiveData' => $positiveData, 'negativeData' => $negativeData, 'positiveMax' => $positiveMax, 'negativeMin' => $negativeMin, 'positiveLabel' => $positiveLabel, 'positiveColor' => $positiveColor, 'negativeLabel' => $negativeLabel, 'negativeColor' => $negativeColor, 'yAxisLabel' => __('Effects') ];

        if(!$this->hasBeenInitialized)
        {
            $this->dispatch('initChart', chartData: $chartData);
            $this->hasBeenInitialized = true;
        }

        $this->dispatch('updateChart', chartData: $chartData);
    }

    public function render()
    {
        return view('livewire.appraisal.health-impact-chart');
    }
}
