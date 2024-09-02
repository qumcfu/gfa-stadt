@props(['section' => 'undefined', 'target' => 'TARGET', 'object' => 'OBJECT', 'message' => null])

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="deleteModalLabel">...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>{{ __('Warning') }}</strong>: <span id="modal-content">...</span>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Back') }}</button>
                <form id="modal-form" action="" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">{{ __('Delete :target', ['target' => $target]) }}</button>
                </form>
            </div>

            <!-- Provide information for JS script below -->
            <div id="raw-content" hidden>
                @if(isset($message))
                    {{ __($message, ['button' => __('Delete :target', ['target' => $target]), 'target' => $target, 'object' => $object, 'pre' => '<strong>', 'post' => '</strong>']) }}
                @else
                    {{ __('By clicking the button :pre:button:post, :target :object will be irrevocably deleted.', ['button' => __('Delete :target', ['target' => $target]), 'target' => $target, 'object' => $object, 'pre' => '<strong>', 'post' => '</strong>']) }}
                @endif
            </div>
            <div id="raw-section" hidden>{{ $section }}</div>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var name = button.getAttribute('data-bs-name')
        var id = button.getAttribute('data-bs-id')
        var parent = button.getAttribute('data-parent')
        // Update the modal's content.
        var modalTitle = deleteModal.querySelector('.modal-title')
        var modalForm = deleteModal.querySelector('#modal-form')
        var modalContent = deleteModal.querySelector('#modal-content')
        var content = deleteModal.querySelector('#raw-content').textContent
        var section = deleteModal.querySelector('#raw-section').textContent

        switch(section) {
            case 'users':
                modalTitle.innerHTML = LOCALE.confirmDeleteUser.replace('%name', name)
                break
            case 'user-groups':
                modalTitle.innerHTML = LOCALE.confirmDeleteUserGroup.replace('%name', name)
                break
            case 'questionnaires':
                modalTitle.innerHTML = LOCALE.confirmDeleteQuestionnaire.replace('%name', name)
                break
            case 'contents':
                modalTitle.innerHTML = LOCALE.confirmDeleteContent.replace('%name', name)
                break
            case 'projects':
                modalTitle.innerHTML = LOCALE.confirmDeleteProject.replace('%name', name)
                break
            case 'scores':
                modalTitle.innerHTML = LOCALE.confirmDeleteScore.replace('%name', name)
                break
            case 'scripts':
                modalTitle.innerHTML = LOCALE.confirmDeleteScript.replace('%name', name)
                break
            default:
                modalTitle.innerHTML = LOCALE.unknownAction
                break
        }

        switch(section) {
            case 'contents':
                modalForm.setAttribute('action', '/questionnaires/' + parent + '/' + section + '/delete/' + id)
                break
            default:
                modalForm.setAttribute('action', '/' + section + '/delete/' + id)
                break
        }

        modalContent.innerHTML = content.replace('%name', name)
    })

    // Clear focus after modal is closed.
    // (By default, the button that triggered the modal is focused.)
    $('#deleteModal').on('shown.bs.modal', function(e){
        $('.btn').one('focus', function(e){$(this).blur();});
    });

</script>
