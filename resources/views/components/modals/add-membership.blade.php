<div class="modal fade" id="add-membership-modal" tabindex="-1" aria-labelledby="add-membership-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/memberships" method="post" class="">
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="add-membership-modal-label">{{ __('Add :thing', ['thing' => __('Membership')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span id="add-membership-modal-content">
                                @if($currentUser != null)
                                    {{ __('Select a project for which you want to create a membership for :user.', ['user' => $currentUser->username]) }}
                                @elseif($currentProject != null)
                                    {{ __('For which user do you want to create a membership to :project?', ['project' => $currentProject->name]) }}
                                @else
                                    {{ __('Select a project and the user you want to allow to contribute to that project.') }}
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="row g-2">

                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                @if($currentProject == null)
                                    <select name="project_id" id="project-id" class="form-control" required>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                        @endforeach
                                    </select>
                                    <label for="project-id">{{ __('Project') }}</label>
                                @else
                                    <input name="project_id" type="hidden" value="{{ $currentProject->id }}">
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                @if($currentUser == null)
                                    <select name="user_id" id="user-id" class="form-control" required>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"> {{ $user->username }} </option>
                                        @endforeach
                                    </select>
                                    <label for="user-id">{{ __('User Account') }}</label>
                                @else
                                    <input name="user_id" type="hidden" value="{{ $currentUser->id }}">
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <select name="role_id" id="role-id" class="form-control" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role['id'] }}" {{ 'contributor' === ($role['shortname'] ?? '') ? 'selected' : '' }}> {{ __($role['name']) }} </option>
                                    @endforeach
                                </select>
                                <label for="role-id">{{ __('Role') }}</label>
                            </div>
                        </div>

                    </div>
                </div>

                <input name="order_id" type="hidden" id="order-id" value="{{ null }}">

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-sm btn-primary">{{ __('Add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let addMembershipModal = document.getElementById('add-membership-modal')
    addMembershipModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget
        let orderId = button.getAttribute('data-order-id')

        addMembershipModal.querySelector('#order-id').setAttribute('value', orderId)
    })

    addMembershipModal.addEventListener('shown.bs.modal', function (event) {
        document.getElementById('project-id').focus()
    })
</script>
