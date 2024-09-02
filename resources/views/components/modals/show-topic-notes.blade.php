<div class="modal fade" id="show-topic-notes-modal-{{ $topic['id'] }}" tabindex="-1" aria-labelledby="show-topic-notes-modal-label-{{ $topic['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-topic-notes-modal-label-{{ $topic['id'] }}">{{ $topic['name'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <livewire:show-topic-notes :topic='$topic' />

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
