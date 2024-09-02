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

@section('head')
    <x-scripts.comments-js></x-scripts.comments-js>
    <script src="{{ asset('js/screening.js') }}" defer></script>
@endsection

@section('header')
    {{ Breadcrumbs::render('screening.comments', $project) }}
@endsection

@section('title', __('Screening on :project', ['project' => $project['name'] ?? __('Unknown project')]))

@section('content')

    @php($screeningStage = $membership->getScreeningStage())

    <form method="get">
        <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-form-action :action='"/screening/report/" . $project["id"]' :onClick='"showLoading()"' :icon='"journal-bookmark-fill"' :color='"dark"' :tooltip='__("Back to Report")'></x-buttons.round-icon-form-action>
        </div>
    </form>

    <form method="get">
        <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("To Dashboard")'></x-buttons.round-icon-open-page>
        </div>

        <div class="d-flex hide-when-printing">
            <div class="position-fixed" id="show-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
                <x-buttons.round-icon-on-click :onClick='"unfoldButtons()"' :icon='"chevron-double-right"' :color='"secondary"' :tooltip='__("Show :things", ["things" => __("Questionnaires")])' :disabled='true'></x-buttons.round-icon-on-click>
            </div>
            <div class="position-fixed" id="hide-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px; display: none;">
                <x-buttons.round-icon-on-click :onClick='"collapseButtons()"' :icon='"chevron-double-left"' :color='"secondary"' :tooltip='__("Hide :things", ["things" => __("Questionnaires")])'></x-buttons.round-icon-on-click>
            </div>
            <livewire:questionnaire-menu :stage='$screeningStage' :currentPage='"comments"' :yPosition='5' />
        </div>
    </form>

    <div>

        <h4 class="color-heading report-heading br-round-top text-center {{ (isset($project['color']) && $project['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <span>{{ __('Comments on :project', ['project' => $project['name']]) }}</span>
        </h4>

        <div class="color-frame br-round-bottom mt-0 mb-3 px-0" style="border-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="d-flex justify-content-center p-0" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                <livewire:comment-counter />
            </div>
        </div>

        @forelse($questionnaires as $questionnaire)
            @php($contents = $questionnaire->getCommentedContents($project))
            @if(count($contents) > 0)
                @php($hasRelevantContent = $questionnaire->hasRelevantContent($project))
                <h5 class="color-heading report-heading br-round-top mt-2 px-1 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                    <span class="px-4">{{ $questionnaire['name'] }}</span>
                </h5>

                @php($contentIndex = 0)
                @foreach($contents as $content)
                    <div class="color-frame mt-0 px-1 py-2" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}; background-image: linear-gradient(to right, {{ isset($questionnaire['color']) ? $questionnaire['color']->getTransparentColor() : '#60606020' }} 65%, #fff0 77%);">
                        <div class="row px-4">
                            <div class="col-8">
                                <span class="fw-bold">{{ $content['short'] }}</span>&nbsp;<x-icons.tooltip-icon :actAsButton='false' :icon='"question-circle"' :color='"dark"' :tooltip='$content["text"]'></x-icons.tooltip-icon><br>
                            </div>
                            <div class="col-4 text-end">
                                <div>
                                    <livewire:show-own-screening-assessment :content='$content' :stage='$screeningStage' />
                                </div>
                                <div>
                                    <livewire:show-general-screening-assessment :content='$content' :project='$project' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="color-frame p-0">
                        <div class="px-1 pt-4 pb-2" style="margin-top: -6px; @if($contentIndex === count($contents) - 1) border-bottom-left-radius : 0.5em; border-bottom-right-radius : 0.5em; margin-bottom: 1em; @endif border-bottom: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }}; border-left: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }}; border-right: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                            <div class="pe-5">
                                @foreach($content->getSortedComments($project) as $comment)
                                    <livewire:show-comment :comment='$comment' :allowInteraction='true' />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @php($contentIndex++)
                @endforeach
            @endif
        @empty
            <span class="text-body-secondary">{{ __('The screening currently has no content.') }}</span>
        @endforelse

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-on-click :onClick='"window.print()"' :icon='"printer-fill"' :color='"secondary"' :tooltip='""'></x-buttons.round-icon-on-click>
        </div>

        <div class="d-inline-block hide-when-printing">
            <x-buttons.print-button>{{ __('Print :thing', ['thing' => __('Comments')]) }}</x-buttons.print-button>
        </div>

    </div>

@endsection
