@php
    $script = $scripts[($content->size ?? 1) - 1] ?? null;
@endphp

<div class="preview-script">
    <h5>{{ $script->name ?? __('No Script Available.') }}</h5>
    <pre>{{ $script->code ?? __('Create a script first.') }}</pre>
    <button class="btn btn-primary" type="button" id="script-button">{{ __('Calculate') }}</button>
</div>
