<?php

namespace App\Livewire\General;

use App\Models\Glossary;
use App\Models\Reference;
use Illuminate\Support\Collection;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Glossaries extends Component
{
    public Collection $glossaries;
    public Collection $references;

    public function mount()
    {
        $this->glossaries = Glossary::all();
        $this->references = Reference::where('questionnaire_id', 0)->get();
    }

    public function render()
    {
        return view('livewire.general.glossaries');
    }
}
