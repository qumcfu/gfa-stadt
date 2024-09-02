<?php

namespace App\Livewire;

use App\Models\Content;
use App\Models\Project;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowGeneralScreeningAssessment extends Component
{
    public Content $content;
    public Project $project;
    public array $values;

    public function mount(Content $content, Project $project)
    {
        $this->content = $content;
        $this->project = $project;
        $this->values = $project->getValues($content);
    }

    public function placeholder()
    {
        return <<<'HTML'
            <span class="placeholder-glow">
                <span class="placeholder col-9 me-1"></span><span class="placeholder col-2"></span>
            </span>
            HTML;
    }

    public function render()
    {
        return view('livewire.show-general-screening-assessment');
    }
}
