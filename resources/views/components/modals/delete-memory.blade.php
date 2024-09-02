<div class="modal fade" id="delete-memory-modal" tabindex="-1" aria-labelledby="delete-memory-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="delete-memory-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="delete-memory-modal-content"></span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Back') }}</button>
                <form id="delete-memory-modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="delete-memory-modal-button">{{ __('Delete :thing', ['thing' => __('Memory')]) }}</button>
                </form>
            </div>

            <div id="delete-memory-modal-raw-title" hidden>{{ __('Delete memory of :user?', ['user' => '%%USER%%']) }}</div>
            <div id="delete-memory-modal-raw-content" hidden>{{ __('You are about to delete :user’s memory.', ['user' => '%%USER%%']) }}</div>

        </div>
    </div>
</div>

<script>
    let deleteMemoryModal = document.getElementById('delete-memory-modal')
    deleteMemoryModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        let memoryId = button.getAttribute('data-id')
        let userName = button.getAttribute('data-user-name')

        let rawTitle = deleteMemoryModal.querySelector('#delete-memory-modal-raw-title')
        let rawContent = deleteMemoryModal.querySelector('#delete-memory-modal-raw-content')

        let modalForm = deleteMemoryModal.querySelector('#delete-memory-modal-form')
        let modalLabel = deleteMemoryModal.querySelector('#delete-memory-modal-label')
        let modalContent = deleteMemoryModal.querySelector('#delete-memory-modal-content')

        modalForm.setAttribute('action', '/memories/delete/' + memoryId)
        modalLabel.textContent = rawTitle.textContent.replace('%%USER%%', userName)
        modalContent.innerHTML = rawContent.innerHTML.replace('%%USER%%', userName)
    })

</script>
