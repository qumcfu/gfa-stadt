<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' data-bs-html="true" title="{{ __($tooltip) }}" style="margin: 0 -2px;">
    <button type="button" class="btn btn-icon-{{ $color }} @if($class != null){{ $class }}@endif px-0 py-0" @if($id != null)id="{{ $id }}"@endif onclick="{{ $function }}" {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
    </button>
</span>
