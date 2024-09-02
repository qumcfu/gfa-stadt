<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="{{ $tooltipPosition }}" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 130 }}", "hide":"0"}' data-bs-html="true" title="{{ __($tooltip) }}" style="margin: 0 -2px;">
    <button formaction="{{ $action }}" @if(!is_null($onClick)) onclick="{{ $onClick }}" @endif class="btn btn-icon-{{ $color }} @if($class != null){{ $class }}@endif @if($rotateOnHover) btn-icon-rotate @endif px-1 py-0" @if($id != null)id="{{ $id }}"@endif {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
    </button>
</span>
