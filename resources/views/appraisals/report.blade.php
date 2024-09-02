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
    <x-scripts.comments-js></x-scripts.comments-js>
    <x-scripts.results-charts></x-scripts.results-charts>
    <script src="{{ asset('js/leader-line.min.js') }}"></script>
    <script src="{{ asset('js/appraisal.js') }}"></script>
@endsection

@section('header')
    {{ Breadcrumbs::render('appraisal.report', $project) }}
@endsection

@section('content')

    @if(isset($membership))
        <form method="get">
            <div class="position-fixed hide-when-printing"
                 style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
                <x-buttons.round-icon-form-action :action='"/appraisal/summary/" . $membership["id"]' :icon='"clipboard-data"' :color='"dark"'
                                                  :tooltip='__("Show :thing", ["thing" => __("summary of your data")])'></x-buttons.round-icon-form-action>
            </div>
        </form>
    @endif

    <div class="d-flex hide-when-printing">
        <div class="position-fixed"
             style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') + config('settings.buttons.gap') }}px;">
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
            <livewire:questionnaire-menu :stage='$membership->getAppraisalStage()' :yPosition='5' />
        </div>
    </form>

    <div>

        <h4 class="color-heading report-heading br-round-top text-center {{ (isset($project['color']) && $project['color']->isBright()) ? 'text-dark' : 'text-light' }}"
            style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <span>{{ __('Appraisal Report on :project', ['project' => $project['name']]) }}</span>
        </h4>

        <div class="color-frame mt-0 px-0"
             style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 0; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="align-content-center p-3" style="text-align: center !important;">
                <x-localization.appraisal-report-verdict :project='$project'></x-localization.appraisal-report-verdict>
            </div>
        </div>

        <div class="color-frame br-round-bottom mt-0 px-0"
             style="border-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="text-button-dark d-flex justify-content-center p-0" data-bs-toggle="collapse"
                 data-bs-target="#appraisal-chart" aria-expanded="{{ $config['chart_active'] ?? 0 }}"
                 aria-controls="appraisal-chart" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                <div class="px-3 py-2">
                    <i class="bi-caret-{{ ($config['chart_active'] ?? false) ? 'up' : 'down' }} me-2"
                       id="left-icon"></i>
                    <span id="chart-bar">{{ __(($config['chart_active'] ?? false) ? 'Hide summary chart' : 'Show summary chart') }}</span>
                    <i class="bi-caret-{{ ($config['chart_active'] ?? false) ? 'up' : 'down' }} ms-2"
                       id="right-icon"></i>
                </div>
            </div>
            <div class="col-12 collapse {{ ($config['chart_active'] ?? false) ? 'show' : '' }} px-3" id="appraisal-chart"
                 style="border-top: 2px solid {{ $project['color']['hex'] ?? '#606060' }};">
                <p class="mt-3">
                    Diese Grafik zeigt die zu erwartenden gesundheitlichen Auswirkungen des Vorhabens auf Basis der Einschätzungen aller Teilnehmenden. Rote Balken bedeuten eine Verschlechterung, während grüne Balken eine Verbesserung anzeigen. Die geplanten Maßnahmen wurden anhand ihrer voraussichtlichen <b>direkten Effekte</b> ausgewertet, die gemäß der Angaben aus den Schaubildern der Wirkungszusammenhänge Einfluss auf verschiedene <b>gesundheitliche Auswirkungen</b> nehmen.
                </p>
                <p>
                    Über die Auswahl eines Schwerpunktthemas können Sie nachvollziehen, wie sich die einzelnen Themen voraussichtlich auf die Gesundheit der Bevölkerung auswirken.
                </p>

                <livewire:appraisal.health-impact-chart :project='$project' :questionnaires='$questionnaires' />
                <div class="chart">
                    <canvas class="chart-canvas" id="appraisal-health-impacts" style="height: 35vh;"></canvas>
                </div>

            </div>
        </div>

        <livewire:appraisal.negative-health-impacts-box :project='$project' />
        <livewire:appraisal.positive-health-impacts-box :project='$project' />

        <br>
        <livewire:appraisal.interactive-health-impact :project='$project' :questionnaires='$questionnaires' :effectTypes='$effectTypes' :healthImpactTypes='$healthImpactTypes' />

        <div class="mt-4">
            <x-localization.appraisal-report-details :project='$project'></x-localization.appraisal-report-details>
        </div>

        @foreach($questionnaires as $questionnaire)
            <livewire:appraisal.detailed-questionnaire :project='$project' :questionnaire='$questionnaire' :key='$questionnaire["id"]' />
        @endforeach

        <x-modals.show-relevance-thresholds :project='$project' :stageType='$stageType'></x-modals.show-relevance-thresholds>
        <x-modals.view-tutorial-video :page='"appraisal-report"'></x-modals.view-tutorial-video>

        <br><br>
        <form method="get">
            <!-- comments section -->
            <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
                <x-buttons.round-icon-form-action :action='"/appraisal/comments/" . $project["id"]' :icon='"chat-dots-fill"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Comments")])'></x-buttons.round-icon-form-action>
            </div>
        </form>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 1 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-on-click :onClick='"window.print()"' :icon='"printer-fill"' :color='"secondary"' :tooltip='__("Print :thing", ["thing" => __("Page")])'></x-buttons.round-icon-on-click>
        </div>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
        </div>

    </div>

@endsection
