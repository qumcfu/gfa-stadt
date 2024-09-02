<div class="modal fade" id="delete-script-modal" tabindex="-1" aria-labelledby="delete-script-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="delete-script-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="delete-script-modal-content">{{ __('By deleting this script, you will no longer be able to use it for calculations inside projects.') }}</span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form id="delete-script-modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="delete-script-modal-button"></button>
                </form>
            </div>

            <div id="delete-script-modal-raw-label" hidden>{{ __('Delete :thing', ['thing' => '%%SCRIPT%%']) }}?</div>
            <div id="delete-script-modal-raw-button" hidden>{{ __('Delete :thing', ['thing' => '%%SCRIPT%%']) }}</div>

        </div>
    </div>
</div>

<script>
    let deleteScriptModal = document.getElementById('delete-script-modal')
    deleteScriptModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let scriptId = button.getAttribute('data-id')
        let scriptName = button.getAttribute('data-script-name')

        let rawLabel = deleteScriptModal.querySelector('#delete-script-modal-raw-label')
        let rawButton = deleteScriptModal.querySelector('#delete-script-modal-raw-button')

        let modalForm = deleteScriptModal.querySelector('#delete-script-modal-form')
        let modalLabel = deleteScriptModal.querySelector('#delete-script-modal-label')
        let modalButton = deleteScriptModal.querySelector('#delete-script-modal-button')

        modalForm.setAttribute('action', '/scripts/delete/' + scriptId)
        modalLabel.textContent = rawLabel.textContent.replace('%%SCRIPT%%', scriptName)
        modalButton.textContent = scriptName.length < 32 ? rawButton.textContent.replace('%%SCRIPT%%', scriptName) : '{{ __("Delete :target", ["target" => __("Script")]) }}'

    })

</script>
