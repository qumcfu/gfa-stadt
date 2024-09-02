@if($project->hasRelevantContent('negative'))

    <div class="mt-4">
        <h5 class="color-heading report-heading br-round-top text-center text-light" style="background-color: var(--bs-danger);">
            <span>{{ __(':things expected', ['things' => __('Negative Effects')]) }}</span>
        </h5>

        @php($index = 0)
        @php($negativelyRelevantQuestionnaires = [])
        @foreach($questionnaires as $questionnaire)
            @if($questionnaire->hasRelevantContent($project, 'negative'))
                @php($negativelyRelevantQuestionnaires[] = $questionnaire)
            @endif
        @endforeach

        <div class="color-frame br-round-bottom mt-0" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: var(--bs-danger);">
            <div class="p-3" style="background-color: rgba(var(--bs-danger-rgb), 0.125);">
                <x-localization.screening-report-negative-effects>
                    <ul>
                    @foreach($negativelyRelevantQuestionnaires as $index => $nrq)
                        <li>
                            <span class="d-inline-block text-button-danger fw-bold" data-bs-toggle="modal" data-bs-target="#show-relevant-questionnaire-modal-negative-{{ $nrq['id'] }}">{{ $nrq['name'] }}</span>@if($index < count($negativelyRelevantQuestionnaires) - 2)<span class="d-inline-block">,
                        </span>
                            @elseif($index === count($negativelyRelevantQuestionnaires) - 2)
                                <span class="d-inline-block">
                                {{ __('and') }}
                            </span>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                </x-localization.screening-report-negative-effects>
            </div>
        </div>

        @foreach($negativelyRelevantQuestionnaires as $nrq)
            <x-modals.show-relevant-questionnaire :questionnaire='$nrq' :project='$project' :key='"negative"'></x-modals.show-relevant-questionnaire>
        @endforeach

    </div>

@endif

@if($project->hasRelevantContent('positive'))

    <div class="mt-4">
        <h5 class="color-heading report-heading br-round-top text-center text-dark" style="background-color: rgba(var(--bs-success-rgb), 0.5);">
            <span>{{ __(':things of the project', ['things' => __('Positive Effects')]) }}</span>
        </h5>

        @php($index = 0)
        @php($positivelyRelevantQuestionnaires = [])
        @foreach($questionnaires as $questionnaire)
            @if($questionnaire->hasRelevantContent($project, 'positive'))
                @php($positivelyRelevantQuestionnaires[] = $questionnaire)
            @endif
        @endforeach

        <div class="color-frame br-round-bottom mt-0" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: rgba(var(--bs-success-rgb), 0.5);">
            <div class="p-3" style="background-color: rgba(var(--bs-success-rgb), 0.125);">
                <x-localization.screening-report-positive-effects>
                    <ul>
                    @foreach($positivelyRelevantQuestionnaires as $index => $prq)
                        <li>
                            <span class="d-inline-block text-button-success fw-bold" data-bs-toggle="modal" data-bs-target="#show-relevant-questionnaire-modal-positive-{{ $prq['id'] }}">{{ $prq['name'] }}</span>@if($index < count($positivelyRelevantQuestionnaires) - 2)<span class="d-inline-block">,
                        </span>
                            @elseif($index === count($positivelyRelevantQuestionnaires) - 2)
                                <span class="d-inline-block">
                                {{ __('and') }}
                            </span>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                </x-localization.screening-report-positive-effects>
            </div>
        </div>

        @foreach($positivelyRelevantQuestionnaires as $prq)
            <x-modals.show-relevant-questionnaire :questionnaire='$prq' :project='$project' :key='"positive"'></x-modals.show-relevant-questionnaire>
        @endforeach

    </div>

@endif
