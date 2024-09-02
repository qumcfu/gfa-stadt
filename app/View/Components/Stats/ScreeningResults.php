<?php

namespace App\View\Components\Stats;

use App\Models\ProjectStage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ScreeningResults extends Component
{
    public int $uniqueId;
    public Collection $questionnaires;

    public string $positiveMeans;
    public string $negativeMeans;
    public string $potentialMeans;

    public string $positiveMax;
    public string $negativeMax;
    public string $potentialMax;

    public string $chartType;
    public string $chartSize;
    public string $valueType;
    public string $interpolationMode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $uniqueId, string $positiveMeans, string $negativeMeans, string $potentialMeans, string $positiveMax, string $negativeMax, string $potentialMax, Collection $questionnaires, $chartType = 'bar', $chartSize = 'default', $valueType = 'mean', $interpolationMode = 'default')
    {
        $this->uniqueId = $uniqueId;
        $this->questionnaires = $questionnaires;

        $this->positiveMeans = $positiveMeans;
        $this->negativeMeans = $negativeMeans;
        $this->potentialMeans = $potentialMeans;

        $this->positiveMax = $positiveMax;
        $this->negativeMax = $negativeMax;
        $this->potentialMax = $potentialMax;

        $this->chartType = $chartType;
        $this->chartSize = $chartSize;
        $this->valueType = $valueType;
        $this->interpolationMode = $interpolationMode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stats.screening-results');
    }
}
