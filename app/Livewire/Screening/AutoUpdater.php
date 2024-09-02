<?php

namespace App\Livewire\Screening;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

#[Lazy]
class AutoUpdater extends Component
{
    public function mount(Project $project): Redirector|RedirectResponse
    {
        $project->updateScreeningData();
        return redirect()->route('screening.report', ['project' => $project['id']]);
    }

    public function placeholder(): string
    {
        return '<p>' . __('Changes have been made since the report was last accessed.') . ' ' . __('Please be patient for a moment while the values are recalculated.') . '</p>';
    }

    public function render(): View
    {
        return view('livewire.screening.auto-updater');
    }
}
