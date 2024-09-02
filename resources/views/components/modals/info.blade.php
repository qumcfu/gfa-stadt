<div class="modal fade" id="info-modal" tabindex="-1" aria-labelledby="info-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="info-modal-label">{{ __('Information') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Back') }}</button>
            </div>
        </div>
    </div>
</div>
