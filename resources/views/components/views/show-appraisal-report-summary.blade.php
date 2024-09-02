@if($project->hasRelevantEffectType('negative'))

    <div class="mt-4">
        <h5 class="color-heading report-heading br-round-top text-center text-light" style="background-color: var(--bs-danger);">
            <span>{{ __(':things expected', ['things' => __('Negative direct effects')]) }}</span>
        </h5>

        @php($index = 0)
        @php($negativelyRelevantEffectTypes = [])
        @foreach($effectTypes as $type)
            @if($type->isRelevant($project, 'negative'))
                @php($negativelyRelevantEffectTypes[] = $type)
            @endif
        @endforeach

        <div class="color-frame br-round-bottom mt-0" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: var(--bs-danger);">
            <div class="p-3" style="background-color: rgba(var(--bs-danger-rgb), 0.125);">
                <x-localization.appraisal-report-negative-effects>
                    @foreach($negativelyRelevantEffectTypes as $index => $nret)
                        <span class="d-inline-block text-button-danger fw-bold" data-bs-toggle="modal" data-bs-target="#show-relevant-effect-type-modal-negative-{{ $nret['id'] }}">{{ __($nret['name']) }}</span>@if($index < count($negativelyRelevantEffectTypes) - 2)<span class="d-inline-block">,
                    </span>
                        @elseif($index === count($negativelyRelevantEffectTypes) - 2)
                            <span class="d-inline-block">
                            {{ __('and') }}
                        </span>
                        @endif
                    @endforeach
                </x-localization.appraisal-report-negative-effects>
            </div>
        </div>

        @foreach($negativelyRelevantEffectTypes as $nret)
            <x-modals.show-relevant-effect-type :effectType='$nret' :project='$project' :key='"negative"'></x-modals.show-relevant-effect-type>
        @endforeach

    </div>

@endif

@if($project->hasRelevantEffectType('positive'))

    <div class="mt-4">
        <h5 class="color-heading report-heading br-round-top text-center text-dark" style="background-color: rgba(var(--bs-success-rgb), 0.5);">
            <span>{{ __(':things of the project', ['things' => __('Positive direct effects')]) }}</span>
        </h5>

        @php($index = 0)
        @php($positivelyRelevantEffectTypes = [])
        @foreach($effectTypes as $type)
            @if($type->isRelevant($project, 'positive'))
                @php($positivelyRelevantEffectTypes[] = $type)
            @endif
        @endforeach

        <div class="color-frame br-round-bottom mt-0" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: rgba(var(--bs-success-rgb), 0.5);">
            <div class="p-3" style="background-color: rgba(var(--bs-success-rgb), 0.125);">
                <x-localization.appraisal-report-positive-effects>
                    @foreach($positivelyRelevantEffectTypes as $index => $pret)
                        <span class="d-inline-block text-button-success fw-bold" data-bs-toggle="modal" data-bs-target="#show-relevant-effect-type-modal-positive-{{ $pret['id'] }}">{{ __($pret['name']) }}</span>@if($index < count($positivelyRelevantEffectTypes) - 2)<span class="d-inline-block">,
                    </span>
                        @elseif($index === count($positivelyRelevantEffectTypes) - 2)
                            <span class="d-inline-block">
                            {{ __('and') }}
                        </span>
                        @endif
                    @endforeach
                </x-localization.appraisal-report-positive-effects>
            </div>
        </div>

        @foreach($positivelyRelevantEffectTypes as $pret)
            <x-modals.show-relevant-effect-type :effectType='$pret' :project='$project' :key='"positive"'></x-modals.show-relevant-effect-type>
        @endforeach

    </div>

@endif
