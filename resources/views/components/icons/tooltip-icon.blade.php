@if($actAsButton)
    <span data-toggle="tooltip" data-bs-custom-class="{{ $alignment === 'start' ? 'custom-tooltip custom-tooltip-start' : 'custom-tooltip' }}" data-bs-placement="{{ $tooltipDirection }}" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' data-bs-html="true" title="{{ str_replace('\n', "\n", __($tooltip)) }}" style="margin: 0 -2px;">
        <button type="button" class="btn @if($isHandle) btn-handle @else btn-fake @endif px-1 py-0" style="height: 25px; cursor: {{ $cursor }};">
            <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
        </button>
    </span>
@else
    <span data-toggle="tooltip" data-bs-custom-class="{{ $alignment === 'start' ? 'custom-tooltip custom-tooltip-start' : 'custom-tooltip' }}" data-bs-placement="{{ $tooltipDirection }}" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' data-bs-html="true" title="{{ str_replace('\n', "\n", __($tooltip)) }}" style="margin: 0 -2px;">
        <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; cursor: {{ $cursor }}; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
    </span>
@endif
<span>{{ $slot }}</span>
