<div class="modal fade" id="edit-project-settings-modal-{{ $settings['id'] }}" tabindex="-1" aria-labelledby="edit-project-settings-modal-label-{{ $settings['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="main-form" action="/projects/settings/update/{{ $settings['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary text-wrap">
                    <h5 class="modal-title" id="edit-project-settings-modal-label-{{ $settings['id'] }}">{{ __('Settings for :name', ['name' => $settings['project']['name']]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.project-settings-modal :settings='$settings'></x-forms.project-settings-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('settings.' . $settings['id'] . '.*')
<script>
    show('edit-project-settings-modal-' + {{ $settings['id'] }})
</script>
@enderror
