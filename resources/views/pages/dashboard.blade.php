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
    {{ Breadcrumbs::render('home') }}
    <x-scripts.color-selection></x-scripts.color-selection>
    <x-scripts.modal-validation></x-scripts.modal-validation>
    <script src="{{ asset('js/roles.js') }}" defer></script>
@endsection

@section('title', config('app.name') . ': Dashboard')

@section('content')

    <div class="row g-3">
        <div class="col-8 offset-2 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-12 offset-xl-0">

            <a href="/"><h4 class="mb-3 color-heading bg-dashboard">{{ __('Dashboard') }}</h4></a>

            @if(Lang::locale() === 'de')
                <p>
                    Herzlich willkommen beim Online-Tool des Forschungsprojekts GFA_Stadt!
                </p>
            @elseif(Lang::locale() === 'en')
                <p>
                    Welcome to the online tool of the GFA_Stadt research project!
                </p>
            @endif

            @if(count($memberships ?? []) > 0)

                @foreach($memberships as $membership)
                    @php($project = $membership['project'])
                    @php($screeningStage = $membership->getScreeningStage())
                    @php($screeningProgress = (($screeningStage['entry_count'] ?? 0) / max($project['scr_count'], 1)) * 100)
                    @php($currentScreeningQuestionnaire = $screeningStage?->getCurrentQuestionnaire())
                    @php($isAllowedToViewReport = Gate::allows('view-report', $membership))
                    @php($hasScopingBeenCompleted = $membership['project']->hasScopingBeenCompleted())
                    @php($appraisalStage = $membership->getAppraisalStage())
                    @php($appraisalProgress = $hasScopingBeenCompleted ? (($appraisalStage['entry_count'] ?? 0) / max($project['app_count'], 1)) * 100 : 0)
                    @php($currentAppraisalQuestionnaire = $appraisalStage?->getCurrentQuestionnaire())
                    @php($currentStage = $screeningProgress < 99 ? 'screening' : (!$hasScopingBeenCompleted ? 'scoping' : 'appraisal'))

                    @php($hasBrightColor = isset($project['color']) ? $project['color']->isBright() : false)
                    <h4 class="mb-0 color-heading br-round-top {{ $hasBrightColor ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] }};">
                        {{ $membership['project']['name'] }}
                        <span class="float-end">
                            @if($membership['role']['access_level'] >= 3)
                                <x-buttons.icon-edit-modal :target='"#edit-project-modal-" . $project["id"]' :icon='"pencil"' :size='1.125' :color='$hasBrightColor ? "dark" : "light"' :rotateOnHover='true' :tooltip='__("Edit :thing", ["thing" => __("Project")])'></x-buttons.icon-edit-modal>
                                <x-buttons.icon-edit-modal :target='"#edit-project-settings-modal-" . $project["id"]' :icon='"gear"' :size='1.125' :color='$hasBrightColor ? "dark" : "light"' :rotateOnHover='true' :tooltip='__("Settings")'></x-buttons.icon-edit-modal>
                            @endif
                            @if($membership['role']['access_level'] >= 2)
                                <x-buttons.icon-edit-modal :target='"#edit-project-memberships-modal-" . $project["id"]' :icon='"person-circle"' :size='1.125' :color='$hasBrightColor ? "dark" : "light"' :rotateOnHover='true' :tooltip='__("Edit :thing", ["thing" => __("Memberships")])'></x-buttons.icon-edit-modal>
                            @endif
                            @if($membership['role']['access_level'] >= 3)
                                <form action="" method="get" class="d-inline-block">
                                    <x-buttons.icon-action :action='"projects/" . $project["id"] . "/files"' :icon='"files"' :size='1.125' :color='$hasBrightColor ? "dark" : "light"' :rotateOnHover='true' :tooltip='__("File Management")'></x-buttons.icon-action>
                                </form>
                            @endif
                        </span>
                    </h4>

                    <div class="px-4 py-3" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }}; @if($currentStage === 'screening') background-color: {{ $screeningStage['type']['color']['hex'] }}20; @endif">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="text-dark">
                                    {{ __('Screening') }} <x-buttons.icon-toggle-modal :target='"#show-screening-info-modal"' :icon='"info-circle-fill"' :color='"primary"' :tooltip='__("Explanation of the screening process")'></x-buttons.icon-toggle-modal>
                                </h5>
                                <p class="mb-3">
                                    @if($screeningProgress < 0.01)
                                        In der Vorprüfung werden Sie gebeten, die Auswirkungen des Vorhabens auf verschiedene Bereiche einzuschätzen.<br>Möchten Sie mit der Bewertung beginnen? Klicken Sie <a href="/screening/view/{{ $membership['id'] }} }}/1">hier</a>!
                                    @elseif($screeningProgress < 100)
                                        Sie haben die Vorprüfung zu <b>{{ number_format($screeningProgress) }} %</b> abgeschlossen.<br>Möchten Sie den Fragebogen zu „<a href="/screening/view/{{ $membership['id'] }}/{{ $currentScreeningQuestionnaire['stage_order_id'] ?? '1' }}" class="">{{ $currentScreeningQuestionnaire['name'] ?? __('Unknown Questionnaire') }}</a>“ aufrufen und mit der Bearbeitung fortfahren?
                                    @else
                                        Sie haben die Vorprüfung vollständig abgeschlossen. Vielen Dank für Ihre Bewertungen!
                                    @endif
                                    <br>
                                    @php($activeMembershipCount = count($project->getActiveMemberships()))
                                    @php($completedScreeningStageCount = $project->getCompletedStageCountOfType($screeningStageType))
                                    @if($completedScreeningStageCount <= 1)
                                        {{ __('Of the :n participants, :m has so far completed the :stage.', ['n' => $activeMembershipCount, 'm' => $completedScreeningStageCount === 0 ? __('no one') : __('one person'), 'stage' => __('screening')]) }} {{ $screeningStage['complete'] ? ('(' . __("And that's you!") . ')') : '' }}
                                    @else
                                        {{ __('Of the :n participants, :m persons have so far completed the :stage.', ['n' => $activeMembershipCount, 'm' => $completedScreeningStageCount === $activeMembershipCount ? __('all') : $completedScreeningStageCount, 'stage' => __('screening')]) }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-3">

                                <span data-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' title="{{ __('Progress') . ' (' . __('click for details') . ')' }}">
                                    <div class="progress-button" data-bs-toggle="modal" data-bs-target="#show-stage-progress-modal-{{ $screeningStage['id'] ?? 0 }}" style="margin-top: 5px;">
                                        <div class="progress @if($currentStage === 'screening') progress-light-bg @endif border-secondary-subtle" role="progressbar" aria-label="{{ $screeningStage['type']['name'] ?? __('Unknown Stage') }}" aria-valuenow="{{ $screeningProgress }}" aria-valuemin="0" aria-valuemax="100">
                                            @if($screeningProgress > 99)
                                                <div class="progress-bar bg-success" style="width: {{ $screeningProgress }}%"><span class="text-center">{{ number_format($screeningProgress, 0, ',', '') }} %</span></div>
                                            @elseif($screeningProgress > 75)
                                                <div class="progress-bar bg-mostly-positive" style="width: {{ $screeningProgress }}%"><span class="text-center">{{ number_format($screeningProgress, 0, ',', '') }} %</span></div>
                                            @elseif($screeningProgress >= 25)
                                                <div class="progress-bar bg-warning" style="width: {{ $screeningProgress }}%"><span class="text-center">{{ number_format($screeningProgress, 0, ',', '') }} %</span></div>
                                            @elseif($screeningProgress > 0)
                                                <div class="progress-bar bg-mostly-negative" style="width: {{ max($screeningProgress, 15) }}%"><span class="text-center">{{ number_format($screeningProgress, 0, ',', '') }} %</span></div>
                                            @else
                                                <div class="progress-bar bg-danger" style="width: 12%">0 %</div>
                                            @endif
                                        </div>
                                    </div>
                                </span>

                                <p class="mt-2 text-end">
                                    Sie haben {{ $screeningStage['entry_count'] }} von {{ $project['scr_count'] }} Fragen beantwortet.
                                </p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-inline-block w-100 mb-1">
                                    @if($screeningProgress < 100)
                                        <a href="/screening/view/{{ $membership['id'] }}/{{ $currentScreeningQuestionnaire['stage_order_id'] ?? '1' }}" class="btn btn-sm btn-{{ $currentStage === 'screening' ? 'primary' : 'outline-secondary' }} mb-1"><i class="bi-check2-square"></i>&nbsp;&nbsp;{{ $screeningProgress < 0.01 ? __('Start Screening') : __('Continue Screening') }}</a>
                                    @else
                                        <a href="/screening/view/{{ $membership['id'] }} }}/1" class="btn btn-sm btn-{{ $currentStage === 'screening' ? 'primary' : 'outline-secondary' }} mb-1"><i class="bi-check2-square"></i>&nbsp;&nbsp;{{ __('Edit Ratings') }}</a>
                                        <a href="/screening/summary/{{ $membership['id'] }}" class="btn btn-sm btn-{{ $currentStage !== 'screening' ? 'outline-' : '' }}secondary mb-1"><i class="bi-clipboard-data"></i>&nbsp;&nbsp;{{ __('Summary') }}</a>
                                    @endif
                                    <a href="/screening/report/{{ $membership['project']['id'] }}" onclick="showLoading()" class="btn btn-sm btn-{{ ($currentStage === 'appraisal' ? 'outline-' : '') . ($screeningProgress < 100 || $currentStage === 'appraisal' ? 'secondary' : 'primary') }} mb-1" @if(!$isAllowedToViewReport) disabled @endif><i class="bi-journal-bookmark-fill"></i>&nbsp;&nbsp;{{ __('Report') }}</a>
                                    <a href="/screening/comments/{{ $membership['project']['id'] }}" class="btn btn-sm btn-{{ $currentStage !== 'screening' ? 'outline-' : '' }}secondary mb-1" @if(!$isAllowedToViewReport) disabled @endif><i class="bi-chat-dots"></i>&nbsp;&nbsp;{{ __('Comments') }}</a>
                                    @if($membership['role']['access_level'] >= 2)
                                        <div class="d-inline-block float-end">
                                            <livewire:screening.update-data-button :project='$project' />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-3" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }}; @if(!$hasScopingBeenCompleted && $screeningProgress > 98) background-color: {{ $scopingStageType['color']['hex'] }}20; @endif">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">
                                    {{ __('Scoping') }}
                                </h5>
                                <p class="mb-3">
                                    @if($hasScopingBeenCompleted)
                                        @php($focusedItemCount = count($membership['project']->getFocusedItems() ?? []))
                                        {{ __('The scoping has been completed.') }} {!! __(':a topics are examined.', ['a' => '<span class="fw-bold">' . $focusedItemCount . '</span>']) !!}
                                        @if($membership['role']['access_level'] >= 3)
                                            <br>
                                            Als Projektleitung können Sie die derzeitige <a href="/scoping/view/{{ $membership['project']['id'] }}" class="">Themenauswahl anpassen</a>.
                                        @endif
                                    @else
                                        {{ __('The scoping has not yet been completed.') }}
                                        @if($membership['role']['access_level'] >= 3)
                                            <br>
                                            Als Projektleitung haben Sie die Möglichkeit, die <a href="/scoping/view/{{ $membership['project']['id'] }}" class="">Analysevorbereitung durchzuführen</a>. Stellen Sie zuvor jedoch sicher, dass alle Teilnehmenden ausreichend Gelegenheit hatten, die Vorprüfung abzuschließen.
                                        @endif
                                    @endif
                                </p>
                                <p class="mb-1">
                                    @if($hasScopingBeenCompleted)
                                        <a href="/scoping/view/{{ $membership['project']['id'] }}" class="btn btn-sm btn-{{ $currentStage === 'scoping' ? 'primary' : 'outline-secondary' }} mb-1"><i class="bi-search"></i>&nbsp;&nbsp;{{ __('Adjust Selection') }}</a>
                                    @else
                                        <a href="/scoping/view/{{ $membership['project']['id'] }}" class="btn btn-sm btn-{{ $currentStage === 'scoping' ? 'primary' : 'outline-secondary' }} mb-1"><i class="bi-search"></i>&nbsp;&nbsp;{{ __('Perform Scoping') }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="br-round-bottom px-4 py-3" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }}; @if($hasScopingBeenCompleted && $screeningProgress > 98) background-color: {{ $appraisalStage['type']['color']['hex'] }}20; @endif">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="text-dark">
                                    {{ __('Appraisal') }}
                                </h5>
                                <p class="mb-3">
                                    @if(!$hasScopingBeenCompleted)
                                        Mit dieser Phase kann erst begonnen werden, wenn die Analysevorbereitung abgeschlossen wurde.
                                    @elseif($appraisalProgress < 0.01)
                                        Während dieser Phase werden die in der Analysevorbereitung ausgewählten Bereiche eingehender betrachtet.<br>Möchten Sie mit der Bewertung beginnen? Klicken Sie <a href="/appraisal/view/{{ $membership['id'] }} }}/1">hier</a>!
                                    @elseif($appraisalProgress < 100)
                                        Sie haben die Analyse und Bewertung zu <b>{{ number_format($appraisalProgress) }} %</b> abgeschlossen.<br>Möchten Sie den Fragebogen zu „<a href="/appraisal/view/{{ $membership['id'] }}/{{ $currentAppraisalQuestionnaire['stage_order_id'] ?? '1' }}" class="">{{ $currentAppraisalQuestionnaire['name'] ?? __('Unknown Questionnaire') }}</a>“ aufrufen und mit der Bearbeitung fortfahren?
                                    @else
                                        Sie haben alle Fragen der Analyse- und Bewertungsphase beantwortet. Vielen Dank!
                                    @endif
                                    <br>
                                    @php($completedAppraisalStageCount = $project->getCompletedStageCountOfType($appraisalStageType))
                                    @if($completedAppraisalStageCount <= 1)
                                        {{ __('Of the :n participants, :m has so far completed the :stage.', ['n' => $activeMembershipCount, 'm' => $completedAppraisalStageCount === 0 ? __('no one') : __('one person'), 'stage' => __('appraisal')]) }}
                                    @else
                                        {{ __('Of the :n participants, :m persons have so far completed the :stage.', ['n' => $activeMembershipCount, 'm' => $completedAppraisalStageCount === $activeMembershipCount ? __('all') : $completedAppraisalStageCount, 'stage' => __('appraisal')]) }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-3">

                                <span data-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' title="{{ __('Progress') . ' (' . __('click for details') . ')' }}">
                                    <div class="progress-button" data-bs-toggle="modal" data-bs-target="#show-stage-progress-modal-{{ $appraisalStage['id'] ?? 0 }}" style="margin-top: 5px;">
                                        <div class="progress @if($currentStage === 'appraisal') progress-light-bg @endif border-secondary-subtle" role="progressbar" aria-label="{{ $appraisalStage['type']['name'] ?? __('Unknown Stage') }}" aria-valuenow="{{ $appraisalProgress }}" aria-valuemin="0" aria-valuemax="100">
                                            @if($appraisalProgress > 99)
                                                <div class="progress-bar bg-success" style="width: {{ $appraisalProgress }}%"><span class="text-center">{{ number_format($appraisalProgress, 0, ',', '') }} %</span></div>
                                            @elseif($appraisalProgress > 75)
                                                <div class="progress-bar bg-mostly-positive" style="width: {{ $appraisalProgress }}%"><span class="text-center">{{ number_format($appraisalProgress, 0, ',', '') }} %</span></div>
                                            @elseif($appraisalProgress >= 25)
                                                <div class="progress-bar bg-warning" style="width: {{ $appraisalProgress }}%"><span class="text-center">{{ number_format($appraisalProgress, 0, ',', '') }} %</span></div>
                                            @elseif($appraisalProgress > 0)
                                                <div class="progress-bar bg-mostly-negative" style="width: {{ max($appraisalProgress, 15) }}%"><span class="text-center">{{ number_format($appraisalProgress, 0, ',', '') }} %</span></div>
                                            @else
                                                <div class="progress-bar bg-danger" style="width: 12%">0 %</div>
                                            @endif
                                        </div>
                                    </div>
                                </span>

                                @if($hasScopingBeenCompleted)
                                    <p class="mt-2 text-end">
                                        Sie haben {{ $appraisalStage['entry_count'] }} von {{ $project['app_count'] }} Fragen beantwortet.
                                    </p>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-inline-block w-100 mb-1">
                                    @if($appraisalProgress < 100)
                                        <a href="/appraisal/view/{{ $membership['id'] }}/{{ $currentAppraisalQuestionnaire['stage_order_id'] ?? '1' }}" class="btn btn-sm btn-{{ $currentStage === 'appraisal' ? 'primary' : 'outline-secondary' }} mb-1 @if(!$hasScopingBeenCompleted) disabled @endif"><i class="bi-check2-square"></i>&nbsp;&nbsp;{{ $appraisalProgress < 0.01 ? __('Start Appraisal') : __('Continue Appraisal') }}</a>
                                    @else
                                        <a href="/appraisal/view/{{ $membership['id'] }}/{{ $currentAppraisalQuestionnaire['stage_order_id'] ?? '1' }}" class="btn btn-sm btn-{{ ($currentStage !== 'appraisal' ? 'outline-' : '') . ($appraisalProgress < 99.97 ? 'primary' : 'secondary') }} mb-1"><i class="bi-check2-square"></i>&nbsp;&nbsp;{{ __('Edit Ratings') }}</a>
                                        <a href="/appraisal/summary/{{ $membership['id'] }}" class="btn btn-sm btn-{{ $currentStage !== 'appraisal' ? 'outline-' : '' }}secondary mb-1"><i class="bi-clipboard-data"></i>&nbsp;&nbsp;{{ __('Summary') }}</a>
                                    @endif
                                    <a href="/appraisal/report/{{ $membership['project']['id'] }}" onclick="showLoading()" class="btn btn-sm btn-{{ ($currentStage !== 'appraisal' ? 'outline-' : '') . ($appraisalProgress < 100 ? 'secondary' : 'primary') }} mb-1 @if(!$hasScopingBeenCompleted || !$isAllowedToViewReport) disabled @endif"><i class="bi-journal-bookmark-fill"></i>&nbsp;&nbsp;{{ __('Report') }}</a>
                                    <a href="/appraisal/comments/{{ $membership['project']['id'] }}" class="btn btn-sm btn-{{ $currentStage !== 'appraisal' ? 'outline-' : '' }}secondary mb-1 @if(!$hasScopingBeenCompleted || !$isAllowedToViewReport) disabled @endif"><i class="bi-chat-dots"></i>&nbsp;&nbsp;{{ __('Comments') }}</a>

                                    @if($membership['role']['access_level'] >= 2)
                                        <div class="d-inline-block float-end">
                                            <livewire:appraisal.update-data-button :project='$project' />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-modals.edit-project :project='$project'></x-modals.edit-project>
                    <x-modals.edit-project-settings :settings='$project["settings"]'></x-modals.edit-project-settings>
                    <x-modals.edit-project-memberships :project='$project' :ownMembership='$membership'></x-modals.edit-project-memberships>

                @endforeach

                <div class="mt-2">{{ $memberships->onEachSide(2)->links() }}</div>

            @else
                @if(Lang::locale() === 'de')
                    <p class="mb-1">
                        Sie sind derzeit keinem Vorhaben zugewiesen. Wenn Sie bereits einen <b>Registrierungsschlüssel</b> erhalten haben, klicken Sie auf das rot umrandete Stift-Symbol oben rechts auf dieser Seite, um sich einzuschreiben.
                    </p>
                @elseif(Lang::locale() === 'en')
                    <p class="mb-1">
                        You are not currently assigned to any project. If you have already received an <b>enrollment key</b>, click on the pencil icon outlined in red at the top right of this page to enroll.
                    </p>
                @endif
            @endif

        </div>
    </div>

    <div class="d-flex">
        @php($index = 0)
        @foreach($sections as $section)
            @if(Gate::allows('access-' . $section['shortname'] ?? ''))
                <div class="position-fixed" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') }}px;">
                    <x-buttons.round-icon-open-page :target='"/" . $section["shortname"]' :icon='$section["icon"]["name"] ?? "x"' :colorCode='$section["color"] ?? null' :tooltip='__($section["name"])'></x-buttons.round-icon-open-page>
                </div>
                @php($index++)
            @endif
        @endforeach
        @if(Gate::allows('developer'))
            <div class="position-fixed" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') }}px;">
                <x-buttons.round-icon-open-page :target='"/dev"' :icon='"command"' :color='"configurations"' :tooltip='__("Development")'></x-buttons.round-icon-open-page>
            </div>
        @endif
    </div>

    <div class="d-flex">
        <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#create-membership-modal"' :icon='"pen"' :color='"projects"' :tooltip='__("Enroll in project")'></x-buttons.round-icon-toggle-modal>
        </div>
        <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 1 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#show-info-modal"' :icon='"info-lg"' :color='"secondary"' :tooltip='__("About this tool")'></x-buttons.round-icon-toggle-modal>
        </div>
        <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
        </div>
    </div>
    <x-modals.create-membership></x-modals.create-membership>
    <x-modals.show-screening-info></x-modals.show-screening-info>
    <x-modals.show-info :activeSection='"general"'></x-modals.show-info>

    @foreach($memberships as $membership)

        @foreach($membership->getActiveStages() as $stage)
            <x-modals.show-project-stage-progress :stage='$stage'></x-modals.show-project-stage-progress>
        @endforeach

    @endforeach

    <x-modals.select-color :colors='$colors'></x-modals.select-color>
    <x-modals.view-tutorial-video :page='"dashboard"'></x-modals.view-tutorial-video>

@endsection

@section('footer')
    <a href="/legal">{{ __('Legal Notice') }}</a>&ensp;
    <a href="/privacy">{{ __('Privacy Statement') }}</a>
    <span class="float-end text-body-secondary text-nowrap z-3">{{ __('Version') . ' ' . config('version.current') }}<x-buttons.icon-edit-modal :icon='"info-circle"' :color='"secondary"' :target='"#version-history-modal"' :tooltip='__("What has changed?")'></x-buttons.icon-edit-modal></span>
    <x-modals.version-history></x-modals.version-history>
@endsection
