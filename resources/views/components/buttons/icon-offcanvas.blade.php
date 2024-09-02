<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' title="{{ $tooltip }}" style="margin: 0 -2px;">
    <button type="button" class="btn btn-icon-{{ $color }} px-1 py-0" style="height: 25px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-{{ $id }}" aria-controls="offcanvas-{{ $id }}" {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} text-{{ $color }}" style="font-size: {{ $size }}rem;"></i>
    </button>
</span>

<x-modals.offcanvas :position='$position' :id='$id' :heading='$heading' :contents='$contents'></x-modals.offcanvas>
