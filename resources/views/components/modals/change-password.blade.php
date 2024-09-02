<div class="modal fade" id="change-password-modal" tabindex="-1" aria-labelledby="change-password-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/users/update-pw" method="post" class="">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="change-password-modal-label">{{ __('Change Password') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row gy-2">
                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <input name="pw[current]" id="current-pw" type="password" class="form-control change-password-input @error('pw.current') is-invalid @enderror"
                                       value="{{ old('pw.current') ?? '' }}" placeholder="{{ __('Current Password') }}" autocomplete="current-password">
                                @error('pw.current')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="current-pw">{{ __('Current Password') }}</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="mt-2">
                            <div class="form-floating input-group has-validation">
                                <input name="pw[new]" id="new-pw" type="password" class="form-control change-password-input @error('pw.new') is-invalid @enderror"
                                       autocomplete="new-password" value="{{ old('pw.new') ?? '' }}" placeholder="{{ __('New Password') }}">
                                @error('pw.new')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="new-pw">{{ __('New Password') }}</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <input name="pw[confirm]" id="confirm-pw" type="password" class="form-control change-password-input @error('pw.confirm') is-invalid @enderror"
                                       autocomplete="new-password" value="{{ old('pw.confirm') ?? '' }}" placeholder="{{ __('Confirm New Password') }}">
                                @error('pw.confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="confirm-pw">{{ __('Confirm New Password') }}</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="togglePwVisibility()" id="show-pw">
                                <label class="form-check-label" for="show-pw">{{ __('Show Passwords') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-body-secondary">
                    <button class="btn btn-sm btn-primary">{{ __('Update Password') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>

    let pwVisibility = false

    function togglePwVisibility() {
        pwVisibility = !pwVisibility
        let pwList = document.querySelectorAll('.change-password-input')
        let pwArray = [...pwList]
        pwArray.forEach(pw => {
            pw.type = pwVisibility ? 'text' : 'password'
        })
    }

    let changePasswordModal = document.getElementById('change-password-modal')
    changePasswordModal.addEventListener('shown.bs.modal', function (event) {
        document.getElementById('current-pw').focus()
    })

</script>
