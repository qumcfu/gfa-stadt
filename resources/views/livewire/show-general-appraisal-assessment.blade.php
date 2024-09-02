<span>
    <span>{{ __('Average assessment') }}:&nbsp;</span>
    @if($content['type']['shortname'] === 'appraisal-item')
        @foreach($content['effects'] as $effect)
            @php($positiveSize = $effect->getTotalPositiveSize($project))
            @php($negativeSize = $effect->getTotalNegativeSize($project))
            @php($isPositive = $effect['type']['is_positive'])
            @php($tooltip = $effect->getIconTooltip($positiveSize, $negativeSize))
            <i class="bi-{{ $effect['type']['icon']['name'] }}" title="{{ $tooltip }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $effect->getIconColor($positiveSize, $negativeSize) }}; font-size: 0.8rem; vertical-align: middle;"></i>
        @endforeach
    @endif
</span>
