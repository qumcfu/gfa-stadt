<!--
    The MIT License (MIT)

    Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
-->
@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('appraisal.view', $stage, $page) }}
    <script src="{{ asset('js/leader-line.min.js') }}"></script>
    <script src="{{ asset('js/files.js') }}" defer></script>
    <script src="{{ asset('js/appraisal.js') }}"></script>
    <x-scripts.appraisal-view></x-scripts.appraisal-view>
@endsection

@section('title', __('Appraisal of :project', ['project' => $project['name'] ?? __('Unknown project')]))

@section('content')

    @php($project = $stage->getProject())
    @php($groups = $project->getFocusedVulnerableGroups())
    <div class="row">
        <div class="col-12">

            <x-navigation.appraisal-nav :stage='$stage' :questionnaire='$questionnaire'>

                <h3 class="color-heading screening-heading br-round-top text-start {{ !is_null($project['color']) && $project['color']->isBright() ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
                    <span>{{ $project['name'] }}</span>
                </h3>

                <div class="br-round-bottom mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
                    <div class="d-flex justify-content-between px-3">
                        <h5 class="my-0 py-2">{{ __('Appraisal') }}</h5>
                        <livewire:show-stage-progress :stage='$stage' />
                    </div>
                </div>

                <h5 class="color-heading screening-heading br-round-top text-start mt-3 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                    <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} me-1" style="font-size: 1.2em;"></i>
                    <span>{{ $questionnaire['name'] }}</span>
                </h5>

                @php($hasStartedQuestionnaire = $stage->getProgressForQuestionnaire($questionnaire) > 0)
                <div class="color-frame mt-0 px-0" style="border-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
                    <div class="text-button-dark d-flex justify-content-center p-0 {{ $hasStartedQuestionnaire ? 'collapsed' : '' }}" data-bs-toggle="collapse" data-bs-target="#appraisal-info" aria-expanded="{{ !$hasStartedQuestionnaire ? 'true' : 'false' }}" aria-controls="appraisal-chart" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                        <div class="px-3 py-2" @if(!$questionnaire['color']->isBright()) style="color: {{ $questionnaire['color']['hex'] }};" @endif>
                            <i class="bi-caret-{{ $hasStartedQuestionnaire ? 'down' : 'up' }}-fill me-2" id="left-icon"></i>
                            <span class="fw-bold" id="upper-info-bar">{{ __(($hasStartedQuestionnaire ? 'Show' : 'Hide') . ' :thing', ['thing' => __('Overview of the interdependencies')]) }}</span>
                            <i class="bi-caret-{{ $hasStartedQuestionnaire ? 'down' : 'up' }}-fill ms-2" id="right-icon"></i>
                        </div>
                    </div>
                    <div class="col-12 collapse {{ !$hasStartedQuestionnaire ? 'collapsed show' : '' }}" id="appraisal-info" style="border-top: 2px solid {{ $project['color']['hex'] ?? '#606060' }};">
                        <div class="px-3">
                            <x-localization.appraisal-info :questionnaire='$questionnaire'></x-localization.appraisal-info>

                            @if(isset($questionnaire['topic']))
                                <x-views.show-topic :topic='$questionnaire["topic"]' :questionnaire='$questionnaire'></x-views.show-topic>
                            @endif
                        </div>
                        <div class="text-button-dark d-flex justify-content-center p-0" onclick="window.scroll({ top: 0, left: 0, behavior: 'smooth' });" data-bs-toggle="collapse" data-bs-target="#appraisal-info" aria-expanded="{{ !$hasStartedQuestionnaire ? 'true' : 'false' }}" aria-controls="appraisal-chart" style="border-left-width: 0; border-top-width: 2px; border-right-width: 0; border-bottom-width: 0; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }}; background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                            <div class="px-3 py-2" @if(!$questionnaire['color']->isBright()) style="color: {{ $questionnaire['color']['hex'] }};" @endif>
                                <i class="bi-caret-up-fill me-2" id="left-icon"></i>
                                <span class="fw-bold" id="lower-info-bar">{{ __('Hide :thing', ['thing' => __('Overview of the interdependencies')]) }}</span>
                                <i class="bi-caret-up-fill ms-2" id="right-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($questionnaire['description']))
                    <div class="mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                        <div class="px-3">
                            <p class="my-0 py-3">{{ $questionnaire['description'] }}</p>
                            @if(count($groups ?? []) > 0)
                                <p>
                                    <span>{{ __('The screening has shown that the following vulnerable groups are positively/negatively affected by the potential impacts of the project.') . ' ' . __('Please pay particular attention to these groups when answering the other questions.') }}</span>
                                    <ul>
                                        @foreach($groups as $group)
                                            <li>
                                                <livewire:show-vulnerable-group :group='$group' :project='$project' :key='$group->id' />
                                            </li>
                                        @endforeach
                                    </ul>
                                    <span>{{ __('Click on a group\'s name to view the participants\' assessments from the screening.') }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                @endif

                <x-views.questionnaire-contents :questionnaire='$questionnaire' :project='$project' :stage='$stage'></x-views.questionnaire-contents>

            </x-navigation.appraisal-nav>
        </div>
    </div>

    <x-modals.show-info :activeSection='"appraisal"'></x-modals.show-info>
    <x-modals.show-project-info :project='$project'></x-modals.show-project-info>
    <x-modals.show-references :questionnaire='$questionnaire'></x-modals.show-references>
    <x-modals.view-tutorial-video :page='"appraisal"'></x-modals.view-tutorial-video>
    @if(isset($questionnaire['topic']))
        <x-views.show-topic-notes :topic='$questionnaire["topic"]'></x-views.show-topic-notes>
    @endif

@endsection
