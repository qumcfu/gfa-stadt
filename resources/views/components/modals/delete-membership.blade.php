<div class="modal fade" id="delete-membership-modal" tabindex="-1" aria-labelledby="delete-membership-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="delete-membership-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="delete-membership-modal-content"></span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form id="delete-membership-modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="delete-membership-modal-button">{{ __('Cancel :thing', ['thing' => __('Membership')]) }}</button>
                </form>
            </div>

            <div id="delete-membership-modal-raw-label" hidden>{{ __('Cancel membership of :user to :project', ['user' => '%%USER%%', 'project' => '%%PROJECT%%']) }}</div>
            <div id="delete-membership-modal-raw-content" hidden>{{ __('You are about to cancel the membership of :user to :project.', ['user' => '%%USER%%', 'project' => '%%PROJECT%%']) }}</div>

        </div>
    </div>
</div>

<script>
    let deleteMembershipModal = document.getElementById('delete-membership-modal')
    deleteMembershipModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let membershipId = button.getAttribute('data-id')
        let userName = button.getAttribute('data-user-name')
        let projectName = button.getAttribute('data-project-name')

        let rawLabel = deleteMembershipModal.querySelector('#delete-membership-modal-raw-label')
        let rawContent = deleteMembershipModal.querySelector('#delete-membership-modal-raw-content')

        let modalForm = deleteMembershipModal.querySelector('#delete-membership-modal-form')
        let modalLabel = deleteMembershipModal.querySelector('#delete-membership-modal-label')
        let modalContent = deleteMembershipModal.querySelector('#delete-membership-modal-content')

        modalForm.setAttribute('action', '/memberships/delete/' + membershipId)
        modalLabel.textContent = rawLabel.textContent.replace('%%USER%%', userName).replace('%%PROJECT%%', projectName)
        modalContent.innerHTML = rawContent.textContent.replace('%%USER%%', userName).replace('%%PROJECT%%', projectName)

    })

</script>
