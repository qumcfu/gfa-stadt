<div class="modal fade" id="edit-effect-modal-{{ $effect['id'] }}" tabindex="-1" aria-labelledby="edit-effect-modal-label-{{ $effect['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/effects/update/{{ $effect['id'] }}" method="post" class="">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="edit-effect-modal-label-{{ $effect['id'] }}">{{ __('Edit :thing', ['thing' => __('Effect')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.effect-modal :effect='$effect' :types='$types' :questionnaires='$questionnaires'></x-forms.effect-modal>

                </div>

                <div class="modal-footer bg-body-secondary p-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-sm btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('effects.' . $effect['id'] . '.*')
<script>
    show('edit-effect-modal-{{ $effect['id'] }}')
</script>
@enderror
