<?php

namespace App\Livewire;

use App\Models\Content;
use App\Models\Project;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ShowVulnerableGroup extends Component
{
    public Content $group;
    public Project $project;

    public function mount(Content $group, Project $project)
    {
        $this->group = $group;
        $this->project = $project;
    }

    public function placeholder()
    {
        return match (rand(0, 4)) {
            0 => <<<'HTML'
                    <div class="row"><div class="col-6 placeholder-wave"><span class="placeholder col-4"></span></div></div>
                    HTML,
            1 => <<<'HTML'
                    <div class="row"><div class="col-6 placeholder-wave"><span class="placeholder col-1 me-1"></span><span class="placeholder col-2"></span></div></div>
                    HTML,
            2 => <<<'HTML'
                    <div class="row"><div class="col-6 placeholder-wave"><span class="placeholder col-3 me-1"></span><span class="placeholder col-1"></span></div></div>
                    HTML,
            default => <<<'HTML'
                    <div class="row"><div class="col-6 placeholder-wave"><span class="placeholder col-2 me-1"></span><span class="placeholder col-3"></span></div></div>
                    HTML,
        };
    }

    public function render()
    {
        return view('livewire.show-vulnerable-group');
    }
}
