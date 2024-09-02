<div class="modal fade" id="show-stage-progress-modal-{{ $stage['id'] }}" tabindex="-1" aria-labelledby="show-stage-progress-modal-label-{{ $stage['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-stage-progress-modal-label-{{ $stage['id'] }}">{{ __('Progress of the :stage stage for project :project', ['stage' => __($stage['type']['name']), 'project' => $stage['membership']['project']['name'] ?? __('Unknown Project')]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <p>
                    {{ __('Click the title of a questionnaire to open it.') }}
                </p>

                <livewire:show-project-stage-progress :stage='$stage' />

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
