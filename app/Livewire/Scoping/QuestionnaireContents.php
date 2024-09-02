<?php

namespace App\Livewire\Scoping;

use App\Models\FocusedItem;
use App\Models\Project;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuestionnaireContents extends Component
{
    public Project $project;
    public Questionnaire $questionnaire;
    public ProjectStageType $stageType;

    public array $focusedStates;

    public function mount(Project $project, Questionnaire $questionnaire, ProjectStageType $stageType): void
    {
        $this->project = $project;
        $this->questionnaire = $questionnaire;
        $this->stageType = $stageType;

        foreach ($questionnaire['contents'] as $content)
        {
            $this->focusedStates[$content['id']] = ($this->project['focusedItems']->where('content_id', $content['id'])->first()['is_focused'] ?? 0) > 0;
        }
    }

    public function toggleFocusedState(int $contentId)
    {
        $this->focusedStates[$contentId] = !$this->focusedStates[$contentId];
        $this->updateScopingContent();
    }

    public function updateScopingContent()
    {
        foreach($this->focusedStates as $key => $focusedState)
        {
            $item = $this->project['focusedItems']->where('content_id', $key)->first();
            if(!isset($item)) $item = new FocusedItem([ 'project_id' => $this->project['id'], 'content_id' => $key, 'author_id' => Auth::id(), 'is_focused' => $focusedState ]);
            else $item['is_focused'] = $focusedState;
            if($item->isDirty()) $item->save();
        }
        $this->dispatch('update-scoping');
    }

    public function render()
    {
        return view('livewire.scoping.questionnaire-contents');
    }
}
