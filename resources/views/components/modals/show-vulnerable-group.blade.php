<div class="modal fade" id="show-vulnerable-group-modal-{{ $group['id'] }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-vulnerable-groups-modal-label-{{ $group['id'] }}">{{ $group['text'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-2">

                <x-localization.show-vulnerable-group-modal :group='$group' :project='$project'>

                </x-localization.show-vulnerable-group-modal>

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
