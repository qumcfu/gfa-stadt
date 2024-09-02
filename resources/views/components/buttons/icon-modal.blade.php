<!-- Icon button that triggers a modal -->

@props(['icon' => 'activity', 'color' => 'primary', 'tooltip' => 'Undefined', 'target' => '', 'name' => '', 'id' => 0, 'parent' => 0, 'disabled' => ''])

<span data-toggle="tooltip" title="{{ __($tooltip) }}">
    <button type="button" class="btn btn-icon-{{ $color }} px-0 py-1" data-bs-toggle="modal" data-bs-target="{{ $target }}" data-bs-name="{{ __($name) }}" data-bs-id="{{ $id }}" data-parent="{{ $parent }}" {{ $disabled }}>
        <i class="bi-{{ $icon }} text-{{ $color }}"></i>
    </button>
</span>
