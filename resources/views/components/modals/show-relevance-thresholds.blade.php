<div class="modal fade" id="show-relevance-thresholds-modal" tabindex="-1" aria-labelledby="show-relevance-thresholds-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-relevance-thresholds-modal-label">{{ __('How is the relevance of a subject determined?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <x-localization.show-relevance-threshold :project='$project' :stageType='$stageType'></x-localization.show-relevance-threshold>

            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
