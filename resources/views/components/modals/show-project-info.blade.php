<div class="modal fade" id="show-project-info-modal-{{ $project['id'] }}" tabindex="-1" aria-labelledby="show-project-info-modal-label-{{ $project['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-project-info-modal-label-{{ $project['id'] }}">{{ __('Additional info material') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <livewire:show-project-info :project='$project' />

            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
