<div class="modal fade" id="delete-user-modal" tabindex="-1" aria-labelledby="delete-user-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="delete-user-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="delete-user-modal-content">{{ __('By deleting this account, the user will no longer be able to log in and contribute to projects.') }}</span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form id="delete-user-modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="delete-user-modal-button"></button>
                </form>
            </div>

            <div id="delete-user-modal-raw-label" hidden>{{ __('Delete :thing', ['thing' => '%%USER%%']) }}?</div>
            <div id="delete-user-modal-raw-button" hidden>{{ __('Delete :thing', ['thing' => '%%USER%%']) }}</div>

        </div>
    </div>
</div>

<script>
    let deleteUserModal = document.getElementById('delete-user-modal')
    deleteUserModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let userId = button.getAttribute('data-id')
        let userName = button.getAttribute('data-user-name')

        let rawLabel = deleteUserModal.querySelector('#delete-user-modal-raw-label')
        let rawButton = deleteUserModal.querySelector('#delete-user-modal-raw-button')

        let modalForm = deleteUserModal.querySelector('#delete-user-modal-form')
        let modalLabel = deleteUserModal.querySelector('#delete-user-modal-label')
        let modalButton = deleteUserModal.querySelector('#delete-user-modal-button')

        modalForm.setAttribute('action', '/users/delete/' + userId)
        modalLabel.textContent = rawLabel.textContent.replace('%%USER%%', userName)
        modalButton.textContent = userName.length < 24 ? rawButton.textContent.replace('%%USER%%', userName) : '{{ __("Delete :target", ["target" => __("User")]) }}'

    })

</script>
