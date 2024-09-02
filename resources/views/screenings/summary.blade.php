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
    <x-scripts.chart-js></x-scripts.chart-js>
    <script src="{{ asset('js/files.js') }}" defer></script>
    <script src="{{ asset('js/screening.js') }}" defer></script>
@endsection

@section('header')
    {{ Breadcrumbs::render('screening.summary', $stage) }}
@endsection

@section('title', __('Screening on :project', ['project' => $project['name'] ?? __('Unknown project')]))

@section('content')

    @php($previous = $stage->getLastQuestionnaire())
    <form method="get">
        <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-form-action :action='"/screening/view/" . $stage["membership"]["id"] . "/" . ($previous["stage_order_id"] ?? 0)' :icon='"arrow-left"' :colorCode='$previous["color"] ?? null' :color='"secondary"' :tooltip='isset($previous) ? __("Back to :thing", ["thing" => __(":quote", ["quote" => $previous["name"] ?? __("Unknown Questionnaire")])]) : ""' :disabled='!isset($previous)'></x-buttons.round-icon-form-action>
        </div>
    </form>

    <div class="d-flex hide-when-printing">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') + config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("To Dashboard")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    <form method="get">
        <div class="d-flex hide-when-printing">
            <div class="position-fixed" id="show-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
                <x-buttons.round-icon-on-click :onClick='"unfoldButtons()"' :icon='"chevron-double-right"' :color='"secondary"' :tooltip='__("Show :things", ["things" => __("Questionnaires")])' :disabled='true'></x-buttons.round-icon-on-click>
            </div>
            <div class="position-fixed" id="hide-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px; display: none;">
                <x-buttons.round-icon-on-click :onClick='"collapseButtons()"' :icon='"chevron-double-left"' :color='"secondary"' :tooltip='__("Hide :things", ["things" => __("Questionnaires")])'></x-buttons.round-icon-on-click>
            </div>
            <livewire:questionnaire-menu :stage='$stage' :currentPage='"summary"' :yPosition='5' />
        </div>
    </form>

    <div>
        <h4 class="color-heading report-heading br-round-top text-center {{ (isset($project['color']) && $project['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <span>{{ __('Summary of your screening data on :project', ['project' => $project['name']]) }}</span>
        </h4>

        <div class="mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 0; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="align-content-center p-3" style="text-align: center !important;">
                @php($progress = $stage->getProgress())
                <h5 class="my-0">
                    @if($progress > 0.998)
                        {{ __('You have successfully completed the screening process.') }} {{ __('Thank you very much!') }}
                    @else
                        @php($currentQuestionnaire = $stage->getCurrentQuestionnaire())
                        {{ __('You have completed :percent % of the screening so far.', ['percent' => number_format($progress * 100)]) }}@if(isset($currentQuestionnaire))<a href="/screening/view/{{ $stage['membership']['id'] }}/{{ $currentQuestionnaire['stage_order_id'] }}">&nbsp;&nbsp;{{ __('Continue now!') }}</a>@endif
                    @endif
                </h5>
                @if(!$stage['membership']['active'])<h5 class="text-danger mt-2 mb-0">{{ __('Your data will not be included in the overall report results because your membership has been set to inactive.') }}</h5>@endif
            </div>
        </div>

        <div class="color-frame br-round-bottom mt-0 px-0" style="border-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="text-button-dark d-flex justify-content-center p-0" data-bs-toggle="collapse" data-bs-target="#screening-chart" aria-expanded="{{ $config['chart_active'] ?? 0 }}" aria-controls="screening-chart" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                <div class="px-3 py-2">
                    <i class="bi-caret-{{ ($config['chart_active'] ?? false) ? 'up' : 'down' }} me-2" id="left-icon"></i>
                    <span id="chart-bar">{{ __(($config['chart_active'] ?? false) ? 'Hide summary chart' : 'Show summary chart') }}</span>
                    <i class="bi-caret-{{ ($config['chart_active'] ?? false) ? 'up' : 'down' }} ms-2" id="right-icon"></i>
                </div>
            </div>
            <div class="col-12 collapse {{ ($config['chart_active'] ?? false) ? 'show' : '' }} px-3" id="screening-chart" style="border-top: 2px solid {{ $project['color']['hex'] ?? '#606060' }};">
                <p class="mt-3">{{ __('This chart summarizes your information on the effects and potential for improvement of the project in the various areas.') . ' ' . __('You can view the data in several chart types.') }}</p>
                @php($chartValues = $project->getValuesAsString('screening', $stage))
                <x-stats.screening-results :uniqueId='0' :questionnaires='$questionnaires' :positiveMeans='$chartValues["mean"]["positive"]' :negativeMeans='$chartValues["mean"]["negative"]' :potentialMeans='$chartValues["mean"]["potential"]' :positiveMax='$chartValues["max"]["positive"]' :negativeMax='$chartValues["max"]["negative"]' :potentialMax='$chartValues["max"]["potential"]' :chartType='Auth::user()->config["chart_type"] ?? "bar"' :chartSize='Auth::user()->config["chart_size"] ?? "default"' :valueType='Auth::user()->config["value_type"] ?? "mean"' :interpolationMode='Auth::user()->config["interpolation_mode"] ?? "default"'></x-stats.screening-results>
                <x-scripts.screening-report :chartActive="$config['chart_active'] ?? false"></x-scripts.screening-report>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <x-localization.screening-summary-info :stage='$stage'></x-localization.screening-summary-info>
    </div>

    @php($index = 0)
    @php($count = 0)
    <div class="row gx-3 gy-1">
        <div class="col-sm-12 col-lg-4">
            @foreach($questionnaires as $questionnaire)
                @if($questionnaire['stage_order_id'] > $index && $count < $contentCount * 0.28125)
                    <x-views.show-summary-questionnaire :questionnaire='$questionnaire' :stage='$stage'></x-views.show-summary-questionnaire>
                    @php($index = $questionnaire['stage_order_id'])
                    @php($count += count($questionnaire['contents']))
                @endif
            @endforeach
        </div>
        <div class="col-sm-12 col-lg-4">
            @foreach($questionnaires as $questionnaire)
                @if($questionnaire['stage_order_id'] > $index && $count < $contentCount * 0.590625)
                    <x-views.show-summary-questionnaire :questionnaire='$questionnaire' :stage='$stage'></x-views.show-summary-questionnaire>
                    @php($index = $questionnaire['stage_order_id'])
                    @php($count += count($questionnaire['contents']))
                @endif
            @endforeach
        </div>
        <div class="col-sm-12 col-lg-4">
            @foreach($questionnaires as $questionnaire)
                @if($questionnaire['stage_order_id'] > $index)
                    <x-views.show-summary-questionnaire :questionnaire='$questionnaire' :stage='$stage'></x-views.show-summary-questionnaire>
                    @php($index = $questionnaire['stage_order_id'])
                    @php($count += count($questionnaire['contents']))
                @endif
            @endforeach
        </div>
    </div>

    <form method="get">
        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-form-action :action='"/screening/report/" . $project["id"]' :onClick='"showLoading()"' :icon='"journal-bookmark-fill"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Report")])'></x-buttons.round-icon-form-action>
        </div>
    </form>

    <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 1 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#show-info-modal"' :icon='"info-lg"' :color='"secondary"' :tooltip='__("About this tool")'></x-buttons.round-icon-toggle-modal>
    </div>

    <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#show-project-info-modal-" . $stage["membership"]["project"]["id"]' :icon='"images"' :color='"secondary"' :tooltip='__("Additional information")'></x-buttons.round-icon-toggle-modal>
    </div>

    <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 3 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-on-click :onClick='"window.print()"' :icon='"printer-fill"' :color='"secondary"' :tooltip='__("Print :thing", ["thing" => __("Page")])'></x-buttons.round-icon-on-click>
    </div>

    <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 4 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
    </div>

    <x-modals.show-info :activeSection='"screening"'></x-modals.show-info>
    <x-modals.show-project-info :project='$project'></x-modals.show-project-info>
    <x-modals.view-tutorial-video :page='"screening-summary"'></x-modals.view-tutorial-video>

@endsection
