<div class="modal fade" id="edit-membership-modal-{{ $membership->id }}" tabindex="-1" aria-labelledby="edit-membership-modal-label-{{ $membership->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="/memberships/update/{{ $membership->id }}" method="post" class="">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="edit-membership-modal-label-{{ $membership->id }}">{{ __('Edit :user’s membership to :project', ['user' => $membership->user->username ?? __('Unknown User'), 'project' => $membership->project->name ?? __('Unknown Project')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <span>
                                {{ __('If necessary, you can make changes to the existing membership here.') }}
                            </span>
                        </div>
                    </div>

                    <div class="row g-2">

                        @if($projects != null)
                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <select name="project_id" id="project-id-{{ $membership->id }}" class="form-control" required>
                                    @if($membership['project'] != null && !$projects->contains('id', $membership['project']['id']))<option value="{{ $membership['project_id'] }}" selected> {{ $membership['project']['name'] }} </option>@endif
                                    @foreach($projects as $project)
                                        @if($project['id'] === $membership['project']['id'] || !$membership['user']['memberships']->contains('project_id', $project['id']))
                                            <option value="{{ $project->id }}" {{ $project->id === $membership->project_id ? 'selected' : '' }}> {{ $project->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="project-id-{{ $membership->id }}">{{ __('Project') }}</label>
                            </div>
                        </div>
                        @else
                            <input name="project_id" type="hidden" value="{{ $membership->project_id ?? 0 }}">
                        @endif

                        @if($users != null)
                        <div class="col-12">
                            <div class="form-floating input-group has-validation">
                                <select name="user_id" id="user-id-{{ $membership->id }}" class="form-control" required>
                                    @if($membership['user'] != null && !$users->contains('id', $membership['user']['id']))<option value="{{ $membership['user_id'] }}" selected> {{ $membership['user']['username'] }} </option>@endif
                                    @forelse($users as $user)
                                        @if($user['id'] === $membership['user']['id'] || !$membership['project']['memberships']->contains('user_id', $user['id']))
                                            <option value="{{ $user->id }}" {{ $user->id === $membership->user_id ? 'selected' : '' }}> {{ $user->username }} </option>
                                        @endif
                                    @empty
                                        <option value="{{ 0 }}" disabled selected> {{ __('No More :things Available.', ['things' => __('User Accounts')]) }} </option>
                                    @endforelse
                                </select>
                                <label for="user-id-{{ $membership->id }}">{{ __('User Account') }}</label>
                            </div>
                        </div>
                        @else
                            <input name="user_id" type="hidden" value="{{ $membership->user_id ?? 0 }}">
                        @endif

                        <div class="col-9">
                            <div class="form-floating input-group has-validation">
                                <select name="role_id" id="role-id-{{ $membership->id }}" class="form-control" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role['id'] }}" {{ $role['id'] == ($membership['role_id'] ?? 2) ? 'selected' : '' }}> {{ __($role['name']) }} </option>
                                    @endforeach
                                </select>
                                <label for="role-id-{{ $membership->id }}">{{ __('Role') }}</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-floating input-group has-validation">
                                <select name="active" id="active-{{ $membership->id }}" class="form-control" required>
                                    <option value="1" {{ $membership['active'] ? 'selected' : '' }}> {{ __('Active') }} </option>
                                    <option value="0" {{ !$membership['active'] ? 'selected' : '' }}> {{ __('Inactive') }} </option>
                                </select>
                                <label for="active-{{ $membership->id }}">{{ __('Status') }}</label>
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered w-100 mb-0">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Project Stage') }}</th>
                                <th scope="col">{{ __('Entries') }}</th>
                                <th scope="col">{{ __('Active') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($membership['stages'] as $stage)
                                <tr>
                                    <td>
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $stage["id"]'></x-icons.tooltip-icon>

                                        @if($stage['active'])
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='"patch-check-fill"' :htmlColor='$stage["type"]["color"]["hex"]' :tooltip='__("Active")'></x-icons.tooltip-icon>
                                        @else
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='"shield-fill-check"' :htmlColor='$stage["type"]["color"]["hex"] . "80"' :tooltip='__("Inactive")'></x-icons.tooltip-icon>
                                        @endif

                                        {{ ($stage['type']['name'] ?? __('Unknown Stage')) . ' (' . $stage['created_at']->format('d.m.Y, H:i') . ')' }}
                                        @if($stage['author_id'] !== $stage['membership']['user']['id'])<x-icons.tooltip-icon :actAsButton='true' :icon='"person"' :color='"danger"' :tooltip='__("Created by :author.", ["author" => $stage["author"]["username"] ?? __("Unknown User")])'></x-icons.tooltip-icon>@endif
                                    </td>
                                    <td>
                                        {{ count($stage['entries'] ?? []) }}
                                    </td>
                                    <td>
                                        <div class="form-check form-switch stage-membership-{{ $membership['id'] }}">
                                            @switch($stage['type']['shortname'])
                                                @case('screening')
                                                    <input name="active_screening_id" class="form-check-input screening-switch" type="checkbox" role="switch" id="screening-switch-{{ $stage['id'] }}" value="{{ $stage['id'] }}" onclick="activateStage('screening', {{ $membership['id'] }}, {{ $stage['id'] }})" @if($stage['active']) checked @endif>
                                                @break
                                                @case('appraisal')
                                                    <input name="active_appraisal_id" class="form-check-input appraisal-switch" type="checkbox" role="switch" id="appraisal-switch-{{ $stage['id'] }}" value="{{ $stage['id'] }}" onclick="activateStage('appraisal', {{ $membership['id'] }}, {{ $stage['id'] }})" @if($stage['active']) checked @endif>
                                                @break
                                            @endswitch
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        {{ __('No :things Available.', ['things' => __('Project Stages')]) }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-sm btn-primary" {{ ($membership['user'] == null && count($users ?? []) === 0) ? 'disabled' : '' }}>{{ __('Save Changes') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
