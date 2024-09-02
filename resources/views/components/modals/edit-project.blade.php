<div class="modal fade" id="edit-project-modal-{{ $project['id'] }}" tabindex="-1" aria-labelledby="edit-project-modal-label-{{ $project['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="main-form" action="/projects/update/{{ $project['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary text-wrap">
                    <h5 class="modal-title" id="edit-project-modal-label-{{ $project['id'] }}">{{ __('Edit :thing :name', ['thing' => __('Project'), 'name' => $project['name']]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 text-wrap mb-2">
                            <span>{{ __('Adjust general settings for :project according to your needs.', ['project' => $project['name']]) }}</span>
                        </div>
                    </div>

                    <x-forms.project-modal :project='$project' :origin='"#edit-project-modal-" . $project["id"]'></x-forms.project-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let editProjectModal_{{ $project['id'] }} = document.getElementById('edit-project-modal-{{ $project['id'] }}')
    editProjectModal_{{ $project['id'] }}.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        if (button != null) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-value')
            let type = button.getAttribute('data-value-type')

            let colorInput = editProjectModal_{{ $project['id'] }}.querySelector('#project-color-{{ $project['id'] }}')

            if (type === 'color' && name != null && colorInput != null) {
                colorInput.setAttribute('value', id)
                $('#color-button-{{ $project['id'] }}').find('i').first().css({'color': name})
            }
        }
    })

    $( document ).ready(function() {
        let enrollmentKeyInput = $('#project-enrollment-key-{{ $project['id'] ?? 0 }}')
        let enrollmentKeyWarningText = $('#project-enrollment-key-warning-{{ $project['id'] ?? 0 }}')

        enrollmentKeyInput.on('input paste', function () {
            if(enrollmentKeyInput.val() !== '{{ $project["enrollment_key"] ?? "*&%#§?" }}') {
                enrollmentKeyWarningText.removeClass('d-none')
            } else {
                enrollmentKeyWarningText.addClass('d-none')
            }
        })
    })
</script>

@error('project.' . $project['id'] . '.*')
<script>
    show('edit-project-modal-' + {{ $project['id'] }})
</script>
@enderror
