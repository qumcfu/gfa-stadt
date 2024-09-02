<div class="modal fade" id="create-membership-modal" tabindex="-1" aria-labelledby="create-membership-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/projects/enroll" method="post" class="">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="create-membership-modal-label">{{ __('Enroll in an existing project') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>
                        {!! __('To participate in a project, you need a registration key. Enter it in the field below, paying attention to capitalization. Then click on Enroll.') !!}
                    </p>

                    <div class="row gy-2">
                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <input name="enroll[key]" id="enrollment-key" type="text" class="form-control @error('enroll.key') is-invalid @enderror"
                                       value="{{ old('enroll.key') ?? '' }}" placeholder="{{ __('Enrollment Key') }}" autocomplete="none">
                                @error('enroll.key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="current-pw">{{ __('Enrollment Key') }}</label>
                            </div>
                        </div>
                    </div>

                    <input name="enroll[user_id]" type="hidden" value="{{ $user['id'] ?? 0 }}">
                </div>

                <div class="modal-footer bg-body-secondary">
                    <button class="btn btn-sm btn-primary">{{ __('Enroll') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let createMembershipModal = document.getElementById('create-membership-modal')
    createMembershipModal.addEventListener('shown.bs.modal', function (event) {
        document.getElementById('enrollment-key').focus()
    })
</script>

@error('enroll.key')
<script>
    show('create-membership-modal')
</script>
@enderror
