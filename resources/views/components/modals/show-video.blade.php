<div class="modal fade" id="show-video-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="show-video-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="show-video-modal-label-{{ $file['id'] }}">{{ $file['name'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex" style="height: 432px">
                    <iframe width="100%" src="{{ Storage::url($file['path']) }}"></iframe>
                </div>
            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
