<span>
    <span>{{ __('Your assessment on this') }}:&nbsp;</span>
    @if($content['type']['shortname'] === 'appraisal-item')
        @if(!isset($entry))
            <i class="bi-exclamation-circle-fill text-dark" title="{{ __('You have not yet answered this question.') }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
        @elseif($entry['positive'] > 0.01)
            <i class="bi-check-circle text-dark" title="{{ __('You have answered :answer to this question.', ['answer' => __(':quote', ['quote' => __('Yes')])]) }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            <i class="bi-arrow-right text-dark" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @foreach($content['effects'] as $effect)
                @php($positiveSize = $effect->getPositiveSize())
                @php($isPositive = $effect['type']['is_positive'])
                @php($tooltip = ($positiveSize > 0 && $isPositive || $positiveSize < 0 && !$isPositive) ? __("This leads to an increase in the direct effect :effect.", ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])]) : (($positiveSize < 0 && $isPositive || $positiveSize > 0 && !$isPositive) ? __("This leads to a decrease in the direct effect :effect.", ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])]) : __('This does not lead to any change in the direct effect :effect.', ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])])))
                <i class="bi-{{ $effect['type']['icon']['name'] }} text-{{ $positiveSize > 0 ? 'success' : ($positiveSize < 0 ? 'danger' : 'secondary') }}" title="{{ $tooltip }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @endforeach
        @elseif($entry['negative'] > 0.01)
            <i class="bi-ban text-dark" title="{{ __('You have answered :answer to this question.', ['answer' => __(':quote', ['quote' => __('No')])]) }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            <i class="bi-arrow-right text-dark" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @foreach($content['effects'] as $effect)
                @php($negativeSize = $effect->getNegativeSize())
                @php($isPositive = $effect['type']['is_positive'])
                @php($tooltip = ($negativeSize > 0 && $isPositive || $negativeSize < 0 && !$isPositive) ? __("This leads to an increase in the direct effect :effect.", ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])]) : (($negativeSize < 0 && $isPositive || $negativeSize > 0 && !$isPositive) ? __("This leads to a decrease in the direct effect :effect.", ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])]) : __('This does not lead to any change in the direct effect :effect.', ['effect' => __(':quote', ['quote' => __($effect['type']['name'])])])))
                <i class="bi-{{ $effect['type']['icon']['name'] }} text-{{ $negativeSize > 0 ? 'success' : ($negativeSize < 0 ? 'danger' : 'secondary') }}" title="{{ $tooltip }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @endforeach
        @else
            @if(!isset($entry['positive']) || !isset($entry['negative']))
                <i class="bi-{{ $entry->getPositiveIconName() }} text-dark" title="{{ __('You have not yet answered this question.') }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @elseif($entry['positive'] + $entry['negative'] < -3.99)
                <i class="bi-{{ $entry->getPositiveIconName() }} text-dark" title="{{ __('You have answered :answer to this question.', ['answer' => __(':quote', ['quote' => __('Not relevant')])]) }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @elseif($entry['positive'] + $entry['negative'] < -1.99)
                <i class="bi-{{ $entry->getPositiveIconName() }} text-dark" title="{{ __('You have answered :answer to this question.', ['answer' => __(':quote', ['quote' => __('Unknown')])]) }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            @endif
        @endif
    @endif
</span>
