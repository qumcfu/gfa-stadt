<?php

namespace App\View\Components\Stats;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AppraisalResults extends Component
{
    public int $uniqueId;
    public Collection $questionnaires;

    public Collection $effectTypes;
    public string $totalScores;
    public string $positiveScores;
    public string $negativeScores;

    public ?string $totalMaxScores;
    public ?string $positiveMaxScores;
    public ?string $negativeMaxScores;

    public int $maxValue;
    public int $minValue;

    public string $chartType;
    public string $chartSize;
    public string $valueType;
    public string $interpolationMode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $uniqueId, Collection $questionnaires, Collection $effectTypes, string $totalScores, string $positiveScores, string $negativeScores, int $maxValue, int $minValue, string $totalMaxScores = '', string $positiveMaxScores = '', string $negativeMaxScores = '', $chartType = 'bar', $chartSize = 'default', $valueType = 'mean', $interpolationMode = 'default')
    {
        $this->uniqueId = $uniqueId;
        $this->questionnaires = $questionnaires;

        $this->effectTypes = $effectTypes;
        $this->totalScores = $totalScores;
        $this->positiveScores = $positiveScores;
        $this->negativeScores = $negativeScores;

        $this->totalMaxScores = strlen($totalMaxScores) > 0 ? $totalMaxScores : $totalScores;
        $this->positiveMaxScores = strlen($positiveMaxScores) > 0 ? $positiveMaxScores : $positiveScores;
        $this->negativeMaxScores = strlen($negativeMaxScores) > 0 ? $negativeMaxScores : $negativeScores;

        $this->maxValue = $maxValue;
        $this->minValue = $minValue;

        $this->chartType = $chartType;
        $this->chartSize = $chartSize;
        $this->valueType = $valueType;
        $this->interpolationMode = $interpolationMode;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats.appraisal-results');
    }
}
