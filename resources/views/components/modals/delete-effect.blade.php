<div class="modal fade" id="delete-effect-modal-{{ $effect['id'] }}" tabindex="-1" aria-labelledby="delete-effect-modal-label-{{ $effect['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="delete-effect-modal-label-{{ $effect['id'] }}">{{ __('Delete :target', ['target' => __('Effect')]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><span>{{ __('You are about to delete this effect.') }}</span></p>
                <p>
                    {{ __('Content') }}: {{ $effect['content']['short'] ?? __('Unknown Content') }}<br>
                    {{ __('Effect Type') }}: {{ $effect['type']['name'] ?? __('Unknown Type') }}<br>
                    {{ __('Effect Size') }}: {{ $effect['size'] ?? __('Unknown Size') }}
                </p>
                <p class="mb-0"><span class="fw-bold">{{ __('This operation cannot be undone.') }}</span></p>
            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form action="/effects/delete/{{ $effect['id'] }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">{{ __('Delete :target', ['target' => __('Effect')]) }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
