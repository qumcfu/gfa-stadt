<?php

namespace App\Livewire\Appraisal;

use App\Models\EffectType;
use App\Models\HealthImpactType;
use App\Models\Project;
use App\Models\Questionnaire;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class InteractiveHealthImpact extends Component
{
    public Project $project;
    public Collection $questionnaires;
    public Collection $effectTypes;
    public Collection $healthImpactTypes;
    public ?Questionnaire $activeQuestionnaire;
    public ?EffectType $activeEffectType;
    public ?HealthImpactType $activeHealthImpactType;

    public array $categories;
    public array $effects;
    public array $healthImpacts;

    public function mount(Project $project, Collection $questionnaires, Collection $effectTypes, Collection $healthImpactTypes)
    {
        $this->project = $project;
        $this->questionnaires = $questionnaires;
        $this->effectTypes = $effectTypes;
        $this->healthImpactTypes = $healthImpactTypes;
    }

    public function selectQuestionnaire(int $questionnaireId): void
    {
        $questionnaire = Questionnaire::where('id', $questionnaireId)->first();
        $this->activeQuestionnaire = $questionnaire;
        $this->activeEffectType = null;
        $this->activeHealthImpactType = null;
        $this->recalculateQuestionnaireData($questionnaire);

        $data = $this->getArrowData();

        $this->dispatch('updateArrows', arrowData: $data);
    }

    public function selectEffectType(int $effectTypeId): void
    {
        $effectType = EffectType::where('id', $effectTypeId)->first();
        $this->activeQuestionnaire = null;
        $this->activeEffectType = $effectType;
        $this->activeHealthImpactType = null;
        $this->recalculateEffectTypeData($effectType);

        $data = $this->getArrowData();

        $this->dispatch('updateArrows', arrowData: $data);
    }

    public function selectHealthImpactType(int $healthImpactTypeId): void
    {
        $healthImpactType = HealthImpactType::where('id', $healthImpactTypeId)->first();
        $this->activeQuestionnaire = null;
        $this->activeEffectType = null;
        $this->activeHealthImpactType = $healthImpactType;
        $this->recalculateHealthImpactTypeData($healthImpactType);

        $data = $this->getArrowData();

        $this->dispatch('updateArrows', arrowData: $data);
    }

    private function recalculateQuestionnaireData(Questionnaire $questionnaire)
    {
        $data = json_decode($this->project['app_data'], true);
        $this->effects = $data['questionnaires'][$questionnaire['id']]['effects'] ?? [];
        $this->healthImpacts = $data['questionnaires'][$questionnaire['id']]['healthImpacts'] ?? [];
    }

    private function recalculateEffectTypeData(EffectType $effectType)
    {
        $data = json_decode($this->project['app_data'], true);
        $this->effects = $data['effects'][$effectType['id']]['effects'] ?? [];
        $this->categories = $data['effects'][$effectType['id']]['questionnaires'] ?? [];
        $this->healthImpacts = $data['effects'][$effectType['id']]['healthImpacts'] ?? [];
    }

    private function recalculateHealthImpactTypeData(HealthImpactType $healthImpactType)
    {
        $data = json_decode($this->project['app_data'], true);
        $this->effects = $data['healthImpacts'][$healthImpactType['id']]['effects'] ?? [];
        $this->categories = $data['healthImpacts'][$healthImpactType['id']]['questionnaires'] ?? [];
        $this->healthImpacts = $data['healthImpacts'][$healthImpactType['id']]['healthImpacts'] ?? [];
    }

    private function getArrowData(): array
    {
        $arrowData = array();
        $index = 0;
        if(!is_null($this->activeQuestionnaire))
        {
            foreach ($this->effects as $key => $effectType)
            {
                if($effectType['positive'] > 0 || $effectType['negative'] > 0){
                    $arrowData[$index]['start'] = 'questionnaire-' . $this->activeQuestionnaire['id'];
                    $arrowData[$index]['end'] = 'effect-type-' . $key;
                    $arrowData[$index]['color'] = $effectType['arrowColor'];
                    $arrowData[$index]['width'] = 2;
                    $index++;
                }
            }

            /*
             * this produces a LOT of arrows
            foreach ($this->effects as $effectKey => $effectType)
            {
                if($effectType['positive'] > 0 || $effectType['negative'] > 0){
                    foreach($this->healthImpacts as $impactKey => $healthImpactType)
                    {
                        if($healthImpactType['value'] != 0)
                        {
                            $arrowData[$index]['start'] = 'effect-type-' . $effectKey;
                            $arrowData[$index]['end'] = 'health-impact-type-' . $impactKey;
                            $arrowData[$index]['color'] = $healthImpactType['color'];
                            $arrowData[$index]['width'] = 2;
                            $index++;
                        }
                    }
                }
            }
            */
        }
        if(!is_null($this->activeEffectType))
        {
            foreach ($this->categories as $key => $questionnaire)
            {
                if($questionnaire['positive'] > 0 || $questionnaire['negative'] > 0){
                    $arrowData[$index]['start'] = 'questionnaire-' . $key;
                    $arrowData[$index]['end'] = 'effect-type-' . $this->activeEffectType['id'];
                    $arrowData[$index]['color'] = $questionnaire['arrowColor'];
                    $arrowData[$index]['width'] = 2;
                    $index++;
                }
            }
            foreach ($this->healthImpacts as $key => $healthImpact)
            {
                if($healthImpact['value'] != 0){
                    $arrowData[$index]['start'] = 'effect-type-' . $this->activeEffectType['id'];
                    $arrowData[$index]['end'] = 'health-impact-type-' . $key;
                    $arrowData[$index]['color'] = $healthImpact['arrowColor'];
                    $arrowData[$index]['width'] = 2;
                    $index++;
                }
            }
        }
        if(!is_null($this->activeHealthImpactType))
        {
            foreach ($this->effects as $key => $effectType)
            {
                if($effectType['positive'] > 0 || $effectType['negative'] > 0){
                    $arrowData[$index]['start'] = 'effect-type-' . $key;
                    $arrowData[$index]['end'] = 'health-impact-type-' . $this->activeHealthImpactType['id'];
                    $arrowData[$index]['color'] = $effectType['arrowColor'];
                    $arrowData[$index]['width'] = 2;
                    $index++;
                }
            }
        }
        return $arrowData;
    }

    public function render(): View
    {
        return view('livewire.appraisal.interactive-health-impact');
    }
}
