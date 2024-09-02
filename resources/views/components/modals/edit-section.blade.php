<div class="modal fade" id="edit-section-modal-{{ $section['id'] }}" tabindex="-1" aria-labelledby="edit-section-modal-label-{{ $section['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="main-form" action="/sections/update/{{ $section['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary text-wrap">
                    <h5 class="modal-title" id="edit-section-modal-label-{{ $section['id'] }}">{{ __('Edit :thing :name', ['thing' => __('Section'), 'name' => __($section['name'])]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.section-modal :section='$section' :origin='"#edit-section-modal-" . $section["id"]'></x-forms.section-modal>

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
    let editSectionModal_{{ $section['id'] }} = document.getElementById('edit-section-modal-{{ $section['id'] }}')
    editSectionModal_{{ $section['id'] }}.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        if (button != null) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-value')
            let type = button.getAttribute('data-value-type')

            let iconInput = editSectionModal_{{ $section['id'] }}.querySelector('#section-icon-{{ $section['id'] }}')
            let colorInput = editSectionModal_{{ $section['id'] }}.querySelector('#section-color-{{ $section['id'] }}')

            if (type === 'icon' && name != null && iconInput != null) {
                iconInput.setAttribute('value', id)
                $('#icon-button-{{ $section['id'] }}').find('i').first().removeClass().addClass('bi-' + name + ' me-2')
            }
            if (type === 'color' && name != null && colorInput != null) {
                colorInput.setAttribute('value', id)
                $('#color-button-{{ $section['id'] }}').find('i').first().css({'color': name})
            }
        }
    })
</script>

@error('section.' . $section['id'] . '.*')
<script>
    show('edit-section-modal-' + {{ $section['id'] }})
</script>
@enderror
