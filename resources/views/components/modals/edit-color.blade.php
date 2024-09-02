<div class="modal fade" id="edit-color-modal-{{ $color['id'] }}" tabindex="-1" aria-labelledby="edit-color-modal-label-{{ $color['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/colors/update/{{ $color['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="edit-color-modal-label-{{ $color['id'] }}">{{ __('Edit :thing', ['thing' => __('Color')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.color-modal :color='$color'></x-forms.color-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <div class="position-absolute" style="left: 1em;">
                        <x-icons.tooltip-icon :icon='"circle-fill"' :color='"dark"' :htmlColor='$color["hex"]' :size='1.5' :tooltip='$color["hex"]'></x-icons.tooltip-icon>
                        &nbsp;<x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' :size='1.5' :tooltip='""'></x-icons.tooltip-icon>&nbsp;
                        <span id="new-color-{{ $color['id'] }}">
                            <x-icons.tooltip-icon :icon='"circle-fill"' :color='"dark"' :htmlColor='$color["hex"]' :size='1.5' :tooltip='""'></x-icons.tooltip-icon>
                        </span>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('color.' . $color['id'] . '.*')
<script>
    show('edit-color-modal-' + {{ $color['id'] }})
</script>
@enderror
