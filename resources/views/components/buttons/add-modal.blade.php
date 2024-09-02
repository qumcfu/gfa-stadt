<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 100 }}", "hide":"0"}' title="{{ __($tooltip) }}">
    <button type="button" class="btn btn-{{ $color }}" data-bs-toggle="modal" data-bs-target="{{ $target }}" {{ $disabled ? 'disabled' : '' }}>
        {{ $label }}
    </button>
</span>
