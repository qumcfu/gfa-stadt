<?php

namespace App\Livewire\Appraisal;

use App\Models\Project;
use App\Models\Questionnaire;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class DetailedQuestionnaire extends Component
{
    public Project $project;
    public Questionnaire $questionnaire;
    public bool $isActive = false;
    public string $label = 'Show Results';
    public string $iconName = 'caret-down';

    public function mount(Project $project, Questionnaire $questionnaire): void
    {
        $this->project = $project;
        $this->questionnaire = $questionnaire;
    }

    public function toggle()
    {
        $this->isActive = !$this->isActive;
        $this->label = $this->isActive ? 'Hide Results' : 'Show Results';
        $this->iconName = $this->isActive ? 'caret-up' : 'caret-down';
        $this->dispatch('reinitialize-tooltips');
    }

    public function render(): View
    {
        return view('livewire.appraisal.detailed-questionnaire');
    }
}
