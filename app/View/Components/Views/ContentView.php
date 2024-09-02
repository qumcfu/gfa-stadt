<?php

namespace App\View\Components\Views;

use App\Models\Project;
use App\Models\Content;
use App\Models\ProjectStage;
use Illuminate\View\Component;

class ContentView extends Component
{
    public Content $content;
    public Project $project;
    public ProjectStage $stage;
    public bool $isLast;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Content $content, Project $project, ProjectStage $stage = null, bool $isLast = false)
    {
        $this->content = $content;
        $this->project = $project;
        $this->stage = $stage;
        $this->isLast = $isLast;

        if ($stage != null)
        {
            $this->content['text'] = $this->replaceEntries($content['text'], $this->getEntriesForContent($content, $stage));
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.content-view');
    }

    private function getEntriesForContent(Content $content, $projectData)
    {
        return str_contains($content['text'], '%') ? $projectData : [];
    }

    private function replaceEntries($text, $projectData)
    {
        $result = $text;
        $emergency = 0;

        // do that later!
        return $result;

        while ($emergency < 50)
        {
            $start = strpos($result, '%');
            if (!$start) {
                return $result;
            }

            $end = strpos($result, '%', $start + 1);
            if (!$end) {
                return $result;
            }

            $length = $end - $start + 1;

            $placeholder = substr($result, $start, $length);

            if(strlen($placeholder) <= 1)
            {
                return $result;
            }

            $inner = str_replace('%', '', str_replace('\'', '', $placeholder));
            $colon = strpos($inner, ':');
            $fallback = !$colon ? '' : substr($inner, $colon + 1);

            $key = !$colon ? $inner : substr($inner, 0, $colon);

            $bracketPos['open'] = strpos($key, '[');
            if (!$bracketPos['open']) {
                $value = $entries[$key] ?? null;
            } else {
                $value = $entries[substr($key, 0, $bracketPos['open'])] ?? $fallback;
                $key = substr($key, $bracketPos['open']);

                while(str_contains($key, '[')  && $emergency < 50) {
                    $bracketPos['open'] = strpos($key, '[');
                    $bracketPos['close'] = strpos($key, ']', $bracketPos['open']);

                    $subKeyLength = $bracketPos['close'] - $bracketPos['open'] - 1;
                    $subKey = substr($key, $bracketPos['open'] + 1, $subKeyLength);

                    $value = $value[$subKey] ?? $fallback;
                    $key = (strlen($key) > $bracketPos['close'] + 1) ? substr($key, $bracketPos['close'] + 1) : '';

                    $emergency++;
                }
            }

            if (is_array($value)) {
                $value = $fallback;
            }

            $result = str_replace($placeholder, $value ?? $fallback ?? '', $result);
        }

        return $result;
    }
}
