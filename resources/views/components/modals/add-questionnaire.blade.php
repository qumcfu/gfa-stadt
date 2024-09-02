<div class="modal fade" id="add-questionnaire-modal" tabindex="-1" aria-labelledby="add-questionnaire-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="main-form" action="/questionnaires" method="post" class="needs-validation">
                @csrf
                <div class="modal-header bg-body-secondary text-wrap">
                    <h5 class="modal-title" id="add-questionnaire-modal-label">{{ __('Add :thing', ['thing' => __('Questionnaire')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 text-wrap mb-2">
                            <span id="modal-content">{{ __('Please give the new questionnaire a name and, if you wish, add a short description.') . ' ' . __('Both title and description are visible to participants.') }}</span>
                        </div>
                    </div>

                    <x-forms.questionnaire-modal :questionnaire='$questionnaire ?? null' :origin='"#add-questionnaire-modal"'></x-forms.questionnaire-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let addQuestionnaireModal = document.getElementById('add-questionnaire-modal')
    addQuestionnaireModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        if (button != null) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-value')
            let type = button.getAttribute('data-value-type')

            let iconInput = addQuestionnaireModal.querySelector('#questionnaire-icon-0')
            let colorInput = addQuestionnaireModal.querySelector('#questionnaire-color-0')

            if (type === 'icon' && name != null && iconInput != null) {
                iconInput.setAttribute('value', id)
                $('#icon-button-0').find('i').first().removeClass().addClass('bi-' + name + ' me-2')
            }
            if (type === 'color' && name != null && colorInput != null) {
                colorInput.setAttribute('value', id)
                $('#color-button-0').find('i').first().css({'color': name})
            }
        }
    })
</script>

@error('questionnaire.0.*')
<script>
    show('add-questionnaire-modal')
</script>
@enderror
