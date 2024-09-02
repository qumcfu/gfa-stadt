<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="{{ $tooltipPosition }}" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 125 }}", "hide":"0"}' title="{{ __($tooltip) }}" style="margin: 0 -2px;">
    <a class="btn @if(!is_null($colorCode['id'] ?? null)) auto-hover @else btn-{{ $color }} @endif round-icon-button @if(!is_null($colorCode['id'] ?? null)){{ $colorCode->isBright() ? 'text-dark' : 'text-light' }}@else text-white @endif" href="{{ $target }}" {{ $disabled ? 'disabled' : '' }} @if(!is_null($colorCode['id'] ?? null)) style="background-color: {{ $colorCode['hex'] }};" @endif>
        <i class="bi-{{ $icon }}"></i>
    </a>
</span>
