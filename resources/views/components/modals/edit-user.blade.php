<div class="modal fade" id="edit-user-modal-{{ $user['id'] }}" tabindex="-1" aria-labelledby="edit-user-modal-label-{{ $user['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/users/update/{{ $user['id'] }}" method="post" class="needs-validation">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="edit-user-modal-label-{{ $user['id'] }}">{{ __('Edit :thing :name', ['thing' => __('User Account'), 'name' => $user['username']]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.user-modal :user='$user' :groups='$groups'></x-forms.user-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('data.' . $user['id'] . '.*')
<script>
    show('edit-user-modal-' + {{ $user['id'] }})
</script>
@enderror
