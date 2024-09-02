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
    <script src="{{ asset('js/screening.js') }}" defer></script>
@endsection

@section('header')
    {{ Breadcrumbs::render('screening.report', $project) }}
@endsection

@section('title', __('Screening Report on :project', ['project' => $project['name'] ?? __('Unknown project')]))

@section('content')

    @if(isset($membership))
        <form method="get">
            <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
                <x-buttons.round-icon-form-action :action='"/screening/summary/" . $membership["id"]' :icon='"clipboard-data"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("summary of your data")])'></x-buttons.round-icon-form-action>
            </div>
        </form>
    @endif

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
            <livewire:questionnaire-menu :stage='$membership->getScreeningStage()' :currentPage='"report"' :yPosition='5' />
        </div>
    </form>

    <div>

        <h4 class="color-heading report-heading br-round-top text-center {{ (isset($project['color']) && $project['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <span>{{ __('Screening Report on :project', ['project' => $project['name']]) }}</span>
        </h4>

        <div class="color-frame mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 0; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="align-content-center p-3" style="text-align: center !important;">
                <x-localization.screening-report-verdict :project='$project'></x-localization.screening-report-verdict>
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
                <p class="mt-3">{{ __('This chart shows the average scores of the positive and negative impacts reported by all participants during the screening process, as well as the potential for improvement in the various areas.') . ' ' . __('You can view the data in several chart types.') }}</p>
                @php($chartValues = $project->getValuesAsString('screening'))
                <x-stats.screening-results :uniqueId='0' :questionnaires='$questionnaires' :positiveMeans='$chartValues["mean"]["positive"]' :negativeMeans='$chartValues["mean"]["negative"]' :potentialMeans='$chartValues["mean"]["potential"]' :positiveMax='$chartValues["max"]["positive"]' :negativeMax='$chartValues["max"]["negative"]' :potentialMax='$chartValues["max"]["potential"]' :chartType='$config["chart_type"] ?? "bar"' :chartSize='$config["chart_size"] ?? "default"' :valueType='$config["value_type"] ?? "mean"' :interpolationMode='$config["interpolation_mode"] ?? "default"'></x-stats.screening-results>
                <x-scripts.screening-report :chartActive="$config['chart_active'] ?? false"></x-scripts.screening-report>
            </div>
        </div>

        <x-views.show-screening-report-summary :project='$project' :questionnaires='$questionnaires'></x-views.show-screening-report-summary>

        <div class="mt-4">
            <x-localization.screening-report-details :project='$project'></x-localization.screening-report-details>
        </div>

        @php($relevantCount = 0)
        @php($irrelevantQuestionnaires = [])
        @forelse($questionnaires as $questionnaire)
            <x-modals.show-questionnaire-results :questionnaire='$questionnaire' :stageType='$stageType' :project='$project'></x-modals.show-questionnaire-results>
            @foreach($questionnaire['contents'] as $content)
                <x-modals.show-item-results :content='$content' :stageType='$stageType' :project='$project'></x-modals.show-item-results>
                <x-modals.show-comments :content='$content' :project='$project' :membership='$membership'></x-modals.show-comments>
            @endforeach
            @php($relevantContents = $questionnaire->getRelevantContents($project))
            @if(count($relevantContents ?? []) > 0)
                <h5 class="color-heading report-heading br-round-top text-center mt-2 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark text-button-dark' : 'text-light text-button-light' }}" data-bs-toggle="modal" data-bs-target="#show-questionnaire-results-modal-{{ $questionnaire['id'] }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                    <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} me-3" style="font-size: 1.2em;"></i>
                    <span>{{ $questionnaire['name'] }}</span>
                    <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} ms-3" style="font-size: 1.2em;"></i>
                </h5>

                <div class="color-frame mt-0 py-2" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                    <div class="row g-1 justify-content-center">
                        <div class="col-auto">
                            <div class="me-2"><span class="text-small">{{ __('Positive Effects') }}</span></div>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($positiveMean = $questionnaire->getMeanValue($project, 'positive'))
                            @php($impact = $project->impactToString($positiveMean, $questionnaire->getMainContentType()))
                            <x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($positiveMean, 1, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMean, $questionnaire->getMainContentType())' :color='$positiveMean > 0 ? "success" : "dark"' :size='0.8' :tooltip='$impact'></x-icons.tooltip-icon>
                            <span class="me-3">&nbsp;</span>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($positiveMax = $questionnaire->getMaxValue($project, 'positive'))
                            @php($impact = $project->impactToString($positiveMax, $questionnaire->getMainContentType()))
                            <x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($positiveMax, 0, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMax, $questionnaire->getMainContentType())' :color='$positiveMax > 0 ? "success" : "dark"' :size='0.8' :tooltip='$impact'></x-icons.tooltip-icon>
                            <span class="me-5">&nbsp;</span>
                        </div>
                        <div class="col-auto">
                            <div class="me-2"><span class="text-small">{{ __('Negative Effects') }}</span></div>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($negativeMean = $questionnaire->getMeanValue($project, 'negative'))
                            @php($impact = $project->impactToString($negativeMean, $questionnaire->getMainContentType()))
                            <x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($negativeMean, 1, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $questionnaire->getMainContentType())' :color='$negativeMean > 0 ? "danger" : "dark"' :size='0.8' :tooltip='$impact'></x-icons.tooltip-icon>
                            <span class="me-3">&nbsp;</span>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($negativeMax = $questionnaire->getMaxValue($project, 'negative'))
                            @php($impact = $project->impactToString($negativeMax, $questionnaire->getMainContentType()))
                            <x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($negativeMax, 0, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $questionnaire->getMainContentType())' :color='$negativeMax > 0 ? "danger" : "dark"' :size='0.8' :tooltip='$impact'></x-icons.tooltip-icon>
                            <span class="me-5">&nbsp;</span>
                        </div>
                        <div class="col-auto">
                            <div class="me-2"><span class="text-small">{{ __('Potential for Improvement') }}</span></div>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($potentialMean = $questionnaire->getMeanValue($project, 'potential'))
                            @php($potential = $project->potentialToString($potentialMean))
                            <x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($potentialMean, 1, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='$potentialMean > 0 ? "primary" : "dark"' :size='0.8' :tooltip='$potential'></x-icons.tooltip-icon>
                            <span class="me-3">&nbsp;</span>
                        </div>
                        <div class="col-auto text-nowrap">
                            @php($potentialMax = $questionnaire->getMaxValue($project, 'potential'))
                            @php($potential = $project->potentialToString($potentialMax))
                            <x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($potentialMax, 0, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMax)' :color='$potentialMax > 0 ? "primary" : "dark"' :size='0.8' :tooltip='$potential'></x-icons.tooltip-icon>
                        </div>
                    </div>
                </div>
            @php($contentIndex = 0)
                @foreach($relevantContents as $content)
                    <div class="color-frame p-0">
                        <div class="p-0" style="@if($contentIndex === count($relevantContents) - 1) border-bottom-left-radius : 0.5em; border-bottom-right-radius : 0.5em; margin-bottom: 0.5em; @endif border-bottom: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }}; border-left: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }}; border-right: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                            <x-views.show-relevant-item :project='$project' :stageType='$stageType' :content='$content'></x-views.show-relevant-item>
                        </div>
                    </div>
                    @php($relevantCount++)
                    @php($contentIndex++)
                @endforeach
            @else
                @php($irrelevantQuestionnaires[] = $questionnaire)
            @endif
        @empty
            <span class="text-body-secondary">{{ __('The screening currently has no content.') }}</span>
        @endforelse

        @if(count($irrelevantQuestionnaires) > 0)
            <h4 class="mt-3">
                {{ __('Areas with low effects') }}
            </h4>
            <p class="mb-2">
                <span>
                    {{ __('In all areas not listed above, the impacts of the project were considered to be so minor that it is recommended that they not be considered in detail in a potential health impact assessment.') }}
                </span> <span>
                    {{ __('If you are unsure, you can view the submitted assessments for each area by clicking on the respective name.') }}
                </span>
            </p>
            <div class="mb-3">
                @foreach($irrelevantQuestionnaires as $iq)
                    <h5 class="color-frame d-inline-block w-auto me-1 my-1"><span class="badge text-{{ (isset($iq['color']) && $iq['color']->isBright()) ? 'dark text-button-dark' : 'light text-button-light' }}" data-bs-toggle="modal" data-bs-target="#show-questionnaire-results-modal-{{ $iq['id'] }}" style="background-color: {{ $iq['color']['hex'] }};"><i class="bi-{{ $iq['icon']['name'] ?? 'x' }} me-1"></i>{{ $iq['name'] }}</span></h5>
                @endforeach
            </div>

            <hr>
        @endif

        <x-modals.show-relevance-thresholds :project='$project' :stageType='$stageType'></x-modals.show-relevance-thresholds>

        <form method="get">
            <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
                <x-buttons.round-icon-form-action :action='"/screening/comments/" . $project["id"]' :icon='"chat-dots-fill"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Comments")])'></x-buttons.round-icon-form-action>
            </div>

            <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + config('settings.buttons.gap') }}px;">
                <x-buttons.round-icon-form-action :action='"/scoping/view/" . $project["id"]' :icon='"check-square-fill"' :color='"dark"' :tooltip='$membership["role"]["access_level"] >= 3 ? __("Perform Scoping") : __("The scoping can only be carried out by project managers.")' :disabled='$membership["role"]["access_level"] < 3'></x-buttons.round-icon-form-action>
            </div>
        </form>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-on-click :onClick='"window.print()"' :icon='"printer-fill"' :color='"secondary"' :tooltip='__("Print :thing", ["thing" => __("Page")])'></x-buttons.round-icon-on-click>
        </div>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 3 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
        </div>

        <x-modals.view-tutorial-video :page='"screening-report"'></x-modals.view-tutorial-video>

    </div>

@endsection
