<?php

namespace App\Livewire\Scoping;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class AppraisalModeSelection extends Component
{
    public Project $project;
    public int $appModeIndex;
    public string $appModeName;

    public int $questionCount = 100;
    public int $estimatedTime = 0;
    private int $secondsPerQuestion = 30;

    public function mount(Project $project): void
    {
        $this->appModeIndex = $this->project['app_mode'];
        $this->project = $project;
        $this->recalculateScope();
    }

    public function updateAppMode(): void
    {
        $this->project['app_mode'] = $this->appModeIndex;
        $this->project->save();
        $this->recalculateScope();
    }

    #[On('update-scoping')]
    public function recalculateScope(): void
    {
        $this->project->updateAppraisalCount();
        $this->questionCount = $this->project['app_count'];
        $this->estimatedTime = number_format(($this->questionCount * $this->secondsPerQuestion) / 60, 0);
        $this->render();
    }

    public function render()
    {

        $this->appModeName = match ($this->appModeIndex) {
            1 => 'Full HIA',
            2 => 'Compact HIA',
            3 => 'Rapid HIA',
            default => 'Unknown mode',
        };

        return view('livewire.scoping.appraisal-mode-selection');
    }
}
