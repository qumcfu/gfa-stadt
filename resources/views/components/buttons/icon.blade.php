<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 100 }}", "hide":"0"}' data-bs-html="true" title="{{ str_replace('\n', "\n", __($tooltip)) }}" style="margin: 0 -2px;">
    <button formaction="{{ $action }}" class="btn btn-icon-{{ $color }} px-1 py-0" {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
    </button>
</span>
