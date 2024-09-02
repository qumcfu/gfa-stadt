<span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 250 }}", "hide":"0"}' title="{{ __($tooltip) }}" style="margin: 0 -2px;">
    <button type="button" class="btn btn-icon-{{ $color }} px-1 py-0" data-bs-toggle="modal" data-bs-target="{{ $target }}" data-id="{{ $id }}" data-user-name="{{ $userName }}" data-project-name="{{ $projectName }}" data-script-name="{{ $scriptName }}" {{ $disabled ? 'disabled' : '' }}>
        <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif text-opacity-{{ $opacity }}" style="font-size: {{ $size }}rem; @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
    </button>
</span>
