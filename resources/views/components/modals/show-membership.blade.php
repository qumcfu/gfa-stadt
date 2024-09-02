<div class="modal fade" id="show-membership-modal-{{ $membership['id'] }}" tabindex="-1" aria-labelledby="show-membership-modal-label-{{ $membership['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="show-membership-modal-label-{{ $membership['id'] }}">{{ __(':user’s membership to :project', ['user' => $membership['user']['username'] ?? __('Unknown User'), 'project' => $membership['project']['name'] ?? __('Unknown Project')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-12 mb-3 text-center @if(!$membership['active']) text-danger @endif">
                            – {{ __(($membership['active'] ? 'Active Membership as :role' : 'Inactive Membership as :role'), ['role' => __($membership['role']['name'])]) }} –
                        </div>
                    </div>

                    <livewire:show-membership :membership='$membership' />

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>

        </div>
    </div>
</div>
