<div class="modal fade" id="show-stage-modal-{{ $stage['id'] }}" tabindex="-1" aria-labelledby="show-stage-modal-label-{{ $stage['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-stage-modal-label-{{ $stage['id'] }}">{{ __(':stage stage of :user’s membership to :project', ['stage' => __($stage['type']['name']), 'user' => $stage['membership']['user']['username'] ?? __('Unknown User'), 'project' => $stage['membership']['project']['name'] ?? __('Unknown Project')]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                @if(!$stage['active'])
                <p class=" text-danger text-center">
                    <b>– {{ __('Inactive Project Stage') . ' (' . ($stage['updated_at'] ?? $stage['created_at'])->format('d.m.Y, H:i') . ')' }} –</b>
                </p>
                @endif

                <livewire:show-project-stage :stage='$stage' />

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" id="stage-back-button-{{ $stage['id'] }}" data-bs-toggle="modal" data-bs-target="">{{ __('Back') }}</button>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>

<script>

    document.getElementById('show-stage-modal-{{ $stage["id"] }}').addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let membershipId = button.getAttribute('data-modal-id')

        $('#stage-back-button-{{ $stage['id'] }}').attr('data-bs-target', '#show-membership-modal-' + membershipId)
    })

</script>
