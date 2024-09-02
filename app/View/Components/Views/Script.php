<?php

namespace App\View\Components\Views;

use App\Models\Content;
use App\Models\Membership;
use Illuminate\View\Component;

class Script extends ContentView
{
    public $context;
    public $projectData;

    public function __construct(Content $content, string $context, $projectData = null)
    {
        parent::__construct($content, $projectData);
        $this->context = $context;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views.script');
    }
}
