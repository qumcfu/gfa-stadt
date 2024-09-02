<span>
    <span>{{ __('Your assessment on this') }}:&nbsp;</span>
    @if($content['type']['shortname'] === 'screening-item')
        @if(!isset($entry))
            <i class="bi-exclamation-circle-fill text-dark" title="{{ __('You have not yet answered this question.') }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
        @elseif($entry->hasImpact())
            <i class="bi-{{ $entry->getPositiveIconName() }} me-1" title="<b>{{ $entry->getTooltipHeading('positive') }}:</b><br>{{ number_format($entry['positive']) . ' (' . $entry->getPositiveImportance() . ')' }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $entry->getPositiveIconColor() }}; font-size: 0.8rem; vertical-align: middle;"></i>
            <i class="bi-{{ $entry->getNegativeIconName() }} me-1" title="<b>{{ $entry->getTooltipHeading('negative') }}:</b><br>{{ number_format($entry['negative']) . ' (' . $entry->getNegativeImportance() . ')' }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $entry->getNegativeIconColor() }}; font-size: 0.8rem; vertical-align: middle;"></i>
            <i class="bi-{{ $entry->getPotentialIconName() }}" title="<b>{{ __('Potential') }}</b>: {{ $entry->getPotentialTooltip() }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $entry->getPotentialIconColor() }}; font-size: 0.8rem; vertical-align: middle;"></i>
        @else
            <i class="bi-{{ $entry->getPositiveIconName() }}" title="<b>{{ $entry->getTooltipHeading('positive') }}</b>: {{ $entry->getPositiveImportance() }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $entry->getPositiveIconColor() }}; font-size: 0.8rem; vertical-align: middle;"></i>
        @endif
    @elseif($content['type']['shortname'] === 'vulnerable-group-item')
        <i class="bi-{{ $entry->getVulnerableGroupIconName() }}" title="{{ $entry->getSummary() }}" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="color: {{ $entry->getVulnerableGroupIconColor() }}; font-size: 0.8rem; vertical-align: middle;"></i>
    @endif
</span>
