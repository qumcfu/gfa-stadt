<?php

namespace App\Livewire\Appraisal;

use App\Models\HealthImpactType;
use App\Models\ProjectStage;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SummaryChart extends Component
{
    public ProjectStage $stage;
    public Collection $questionnaires;
    private Collection $healthImpactTypes;

    public int $currentQuestionnaireId;
    public int $currentModeId;
    private bool $hasBeenInitialized = false;

    public function mount(ProjectStage $stage, Collection $questionnaires)
    {
        $this->currentQuestionnaireId = 0;
        $this->currentModeId = 0;

        $this->stage = $stage;
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

        $data = $this->stage->getSummaryData($this->questionnaires);

        foreach($data['questionnaires'][$this->currentQuestionnaireId]['healthImpacts'] ?? [] as $key => $impact)
        {
            $normalizeValue = $this->currentModeId === 0 ? 1 : max(count($this->healthImpactTypes[$key - 1]['healthImpacts'] ?? []), 1);

            $positiveData[] = max(($impact['normalized'] / $normalizeValue) * $valueMultiplier, 0) * ($this->healthImpactTypes[$key - 1]['is_positive'] ? 1.0 : -1.0);
            $negativeData[] = min(($impact['normalized'] / $normalizeValue) * $valueMultiplier, 0) * ($this->healthImpactTypes[$key - 1]['is_positive'] ? 1.0 : -1.0);
        }

        $positiveMax = $this->currentModeId === 0 ? ($data['questionnaires'][$this->currentQuestionnaireId]['misc']['healthImpacts']['maxNormalized'] * $valueMultiplier + 1) : 1;
        $negativeMin = $this->currentModeId === 0 ? ($data['questionnaires'][$this->currentQuestionnaireId]['misc']['healthImpacts']['minNormalized'] * $valueMultiplier - 1) : -1;
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
        return view('livewire.appraisal.summary-chart');
    }
}
