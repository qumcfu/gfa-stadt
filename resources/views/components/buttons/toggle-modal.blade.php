<span data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' data-bs-html="true" title="{{ __($tooltip) }}">
    <button type="button" class="btn btn-{{ $color }} {{ $class ?? '' }}" data-bs-toggle="modal" data-bs-target="{{ $target }}" data-value="{{ $value }}" data-type="{{ $type }}" data-order-id="{{ $orderId }}" data-current-id="{{ $currentId }}" data-origin="{{ $origin }}" {{ $disabled ? 'disabled' : '' }}>
        @if($icon != null)<i class="bi-{{ $icon }} me-2" @if($iconHtmlColor != null) style="color: {{ $iconHtmlColor }};" @endif></i>@endif{{ $slot }}
    </button>
</span>
