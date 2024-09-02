<?php

namespace App\Livewire;

use App\Models\ProjectStage;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class QuestionnaireMenu extends Component
{
    public ProjectStage $stage;
    public int $yPosition;
    public string $currentPage;

    public function mount(ProjectStage $stage, string $currentPage = "none", int $yPosition = 5)
    {
        $this->stage = $stage;
        $this->currentPage = $currentPage;
        $this->yPosition = $yPosition;
    }

    public function render()
    {
        return view('livewire.questionnaire-menu');
    }
}
