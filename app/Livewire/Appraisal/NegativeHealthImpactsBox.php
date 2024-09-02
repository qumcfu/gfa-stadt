<?php

namespace App\Livewire\Appraisal;

use App\Models\HealthImpactType;
use App\Models\Project;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NegativeHealthImpactsBox extends Component
{
    public Project $project;
    public Collection $questionnaires;

    public Collection $relevantHealthImpactTypes;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->questionnaires = Questionnaire::where('type_id', ProjectStageType::where('shortname', 'appraisal')->pluck('id')->first())->get();

        $healthImpactTypes = HealthImpactType::all();
        $this->relevantHealthImpactTypes = new Collection();

        $appraisalData = json_decode($this->project['app_data'], true);

        foreach($appraisalData['questionnaires'][0]['healthImpacts'] ?? [] as $key => $impact)
        {
            if($impact['normalized'] < 0) $this->relevantHealthImpactTypes->add($healthImpactTypes[$key - 1]);
        }

        if(count($this->relevantHealthImpactTypes) === 0) $this->skipRender();
    }

    public function render()
    {
        return view('livewire.appraisal.negative-health-impacts-box');
    }
}
