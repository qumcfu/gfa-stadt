<div class="modal fade" id="edit-questionnaire-modal-{{ $questionnaire['id'] }}" tabindex="-1" aria-labelledby="edit-questionnaire-modal-label-{{ $questionnaire['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="main-form" action="/questionnaires/update/{{ $questionnaire['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary text-wrap">
                    <h5 class="modal-title" id="edit-questionnaire-modal-label-{{ $questionnaire['id'] }}">{{ __('Edit :thing :name', ['thing' => __('Questionnaire'), 'name' => $questionnaire['name']]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.questionnaire-modal :questionnaire='$questionnaire' :origin='"#edit-questionnaire-modal-" . $questionnaire["id"]'></x-forms.questionnaire-modal>

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
    let editQuestionnaireModal_{{ $questionnaire['id'] }} = document.getElementById('edit-questionnaire-modal-{{ $questionnaire['id'] }}')
    editQuestionnaireModal_{{ $questionnaire['id'] }}.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        if (button != null) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-value')
            let type = button.getAttribute('data-value-type')

            let iconInput = editQuestionnaireModal_{{ $questionnaire['id'] }}.querySelector('#questionnaire-icon-{{ $questionnaire['id'] }}')
            let colorInput = editQuestionnaireModal_{{ $questionnaire['id'] }}.querySelector('#questionnaire-color-{{ $questionnaire['id'] }}')

            if (type === 'icon' && name != null && iconInput != null) {
                iconInput.setAttribute('value', id)
                $('#icon-button-{{ $questionnaire['id'] }}').find('i').first().removeClass().addClass('bi-' + name + ' me-2')
            }
            if (type === 'color' && name != null && colorInput != null) {
                colorInput.setAttribute('value', id)
                $('#color-button-{{ $questionnaire['id'] }}').find('i').first().css({'color': name})
            }
        }
    })
</script>

@error('questionnaire.' . $questionnaire['id'] . '.*')
<script>
    show('edit-questionnaire-modal-' + {{ $questionnaire['id'] }})
</script>
@enderror
