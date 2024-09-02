<div class="modal fade" id="show-document-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="show-document-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="show-document-modal-label-{{ $file['id'] }}">{{ $file['name'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed class="w-100 rounded" src="{{ Storage::url($file['path']) }}" style="height: 48em;">
            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
