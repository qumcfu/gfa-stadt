<div class="modal fade" id="show-relevant-health-impact-type-modal-{{ $impactType['id'] }}" tabindex="-1" aria-labelledby="show-relevant-health-impact-type-modal-label-{{ $impactType['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header text-{{ $normalizedValue > 0 ? 'dark' : 'light' }}" style="background-color: rgba(var(--bs-{{ $normalizedValue > 0 ? 'success' : 'danger' }}-rgb), {{ $normalizedValue > 0 ? '0.5' : '1.0' }});">
                <h5 class="modal-title" id="show-relevant-health-impact-type-modal-label-{{ $impactType['id'] }}">{{ __(':things on :area', ['things' => __(ucfirst($normalizedValue > 0 ? 'positive' : 'negative') . ' health impacts'), 'area' => __($impactType['name'])]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                @php($data = json_decode($project['app_data'], true))
                <x-localization.show-relevant-health-impact-type :impactType='$impactType' :key='$normalizedValue > 0 ? "positive" : "negative"' :value='$normalizedValue'>
                    <div class="row">
                        @foreach($impactType['healthImpacts'] as $healthImpact)
                            @php($value = (($data['healthImpacts'][$impactType['id']]['effects'][$healthImpact['effectType']['id']]['positive'] ?? 0) - ($data['healthImpacts'][$impactType['id']]['effects'][$healthImpact['effectType']['id']]['negative'] ?? 0)) * 10)
                            @php($isPositive = $healthImpact['effectType']['is_positive'])
                            @php($prefix = ($isPositive && $value >= 0 || !$isPositive && $value <= 0) ? '+' : '-')
                            @php($valueClass = (($value > 0) ? 'text-success' : ($value < 0 ? 'text-danger' : 'text-secondary')) . (abs($value) >= 1.99 ? ' fw-bold': ''))
                            <div class="col-4 text-end">{{ __($healthImpact['effectType']['name'])  }}</div>
                            <div class="col-8 text-start {{ $valueClass }}">{{ $prefix . number_format(abs($value), 2) }}</div>
                        @endforeach
                    </div>
                </x-localization.show-relevant-health-impact-type>

            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
