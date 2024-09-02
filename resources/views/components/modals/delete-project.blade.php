<div class="modal fade" id="delete-project-modal" tabindex="-1" aria-labelledby="delete-project-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="delete-project-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="delete-project-modal-content">{{ __('After deleting this project, you will no longer be able to review its members\' screening and analysis data.') }}</span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form id="delete-project-modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="delete-project-modal-button"></button>
                </form>
            </div>

            <div id="delete-project-modal-raw-label" hidden>{{ __('Delete :thing', ['thing' => '%%PROJECT%%']) }}?</div>
            <div id="delete-project-modal-raw-button" hidden>{{ __('Delete :thing', ['thing' => '%%PROJECT%%']) }}</div>

        </div>
    </div>
</div>

<script>
    let deleteProjectModal = document.getElementById('delete-project-modal')
    deleteProjectModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let projectId = button.getAttribute('data-id')
        let projectName = button.getAttribute('data-project-name')

        let rawLabel = deleteProjectModal.querySelector('#delete-project-modal-raw-label')
        let rawButton = deleteProjectModal.querySelector('#delete-project-modal-raw-button')

        let modalForm = deleteProjectModal.querySelector('#delete-project-modal-form')
        let modalLabel = deleteProjectModal.querySelector('#delete-project-modal-label')
        let modalButton = deleteProjectModal.querySelector('#delete-project-modal-button')

        modalForm.setAttribute('action', '/projects/delete/' + projectId)
        modalLabel.textContent = rawLabel.textContent.replace('%%PROJECT%%', projectName)
        modalButton.textContent = projectName.length < 32 ? rawButton.textContent.replace('%%PROJECT%%', projectName) : '{{ __("Delete :target", ["target" => __("Project")]) }}'

    })

</script>
