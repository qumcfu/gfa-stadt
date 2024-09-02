<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="{{ $tooltipPosition }}" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 125 }}", "hide":"0"}' title="{{ __($tooltip) }}" style="margin: 0 -2px;">
    <button type="button" class="btn btn-{{ $color }} round-icon-button" data-bs-toggle="modal" data-bs-target="{{ $target }}" {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} text-white"></i>
    </button>
</span>
