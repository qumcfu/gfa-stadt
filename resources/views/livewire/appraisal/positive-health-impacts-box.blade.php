<div class="mt-4">
    <h5 class="color-heading report-heading br-round-top text-center text-light" style="background-color: var(--bs-success);">
        <span>{{ __(':things expected', ['things' => __('Positive health impacts')]) }}</span>
    </h5>

    <div class="color-frame br-round-bottom mt-0" style="border-left-width: 2px; border-right-width: 2px; border-top-width: 0; border-bottom-width: 2px; border-style: solid; border-color: var(--bs-success);">
        <div class="p-3" style="background-color: rgba(var(--bs-success-rgb), 0.125);">
            <x-localization.appraisal-report-positive-health-impacts>
                @foreach($relevantHealthImpactTypes as $index => $impact)
                    <span class="d-inline-block text-button-danger fw-bold" data-bs-toggle="modal" data-bs-target="#show-relevant-health-impact-type-modal-{{ $impact['id'] }}">{{ __($impact['name']) }}</span>@if($index < count($relevantHealthImpactTypes) - 2)<span class="d-inline-block">,
                    </span>
                    @elseif($index === count($relevantHealthImpactTypes) - 2)
                        <span class="d-inline-block">
                            {{ __('and') }}
                        </span>
                    @endif
                @endforeach
            </x-localization.appraisal-report-positive-health-impacts>
        </div>
    </div>

    @foreach($relevantHealthImpactTypes as $impact)
        <x-modals.show-relevant-health-impact-type :project='$project' :impactType='$impact'></x-modals.show-relevant-health-impact-type>
    @endforeach

</div>
