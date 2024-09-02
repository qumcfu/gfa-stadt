<?php

namespace App\Livewire\Screening;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateDataButton extends Component
{
    public Project $project;
    public string $buttonLabel;
    public string $buttonClass;

    public function mount(Project $project)
    {
        $this->buttonLabel = ($project['scr_changes'] > 0 ? ($project['scr_changes'] > 1 ? ':n changes since last report' : ':n change since last report') : 'Data is up-to-date');
        $this->buttonClass = $project['scr_changes'] > 0 ? ($project['scr_changes'] > 50 ? 'bg-danger-subtle border-danger-subtle' : 'bg-warning-subtle border-warning-subtle') : 'bg-success-subtle border-success-subtle';
        // $this->buttonLabel = ($project['scr_changes'] > 0 ? 'Update data' : 'Data is up-to-date');
        // $this->buttonClass = ($project['scr_changes'] > 0 ? 'btn-success' : 'btn-outline-success disabled');
        $this->project = $project;
    }

    #[On('prepare-update-screening-data')]
    public function initiateUpdate(): void
    {
        $this->buttonLabel = 'Updating...';
        $this->buttonClass = 'btn-outline-success disabled';
        $this->dispatch('update-screening-data');
    }

    #[On('update-screening-data')]
    public function performUpdate(): void
    {
        $this->project->updateScreeningData();
        $this->dispatch('hide-screening-loading');
        $this->buttonLabel = 'Data has been updated';
    }

    public function updateData(): void
    {
        $this->dispatch('prepare-update-screening-data');
    }

    public function render()
    {
        return view('livewire.screening.update-data-button');
    }
}
