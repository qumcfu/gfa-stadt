@csrf

<label for="name" class="form-label">{{ __('Name of User Group') }}</label>
<div class="input-group has-validation mb-3">
    <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" required
           value="{{ old('name') ?? $group->name }}" placeholder="{{ __('User Group Name') }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mt-2">
    <p>
        {{ __('Click the buttons below to enable or disable the corresponding section for this user group.') }}
    </p>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered" id="user-table" style="width: 100%">
        <thead>
        <tr>
            <th scope="col" style="width: 15%;">{{ __('Section') }}</th>
            <th scope="col" style="width: 5%;">{{ __('Access') }}</th>
            <th scope="col">{{ __('Permissions') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($permissions as $section_key => $section)
            <tr>
                <td>
                 <span class="d-inline-block"
                       @if(isset($group_permissions[$section_key]['access']) && $group_permissions[$section_key]['access'] && $group['shortname'] === 'super-admin')
                       tooltip="{{ __('You cannot disable access for this group.') }}" @elseif($section_key === 'user-groups' && Auth::user()['user_groups'] === $group['shortname']) tooltip="{{ __('You cannot disable access to this section for your own user group.') }}" @endif flow="right">
                    <button formaction="/user-groups/{{ $group->id }}/{{ $section_key }}"
                            class="btn" style="color:white; background: @if(isset($group_permissions[$section_key]['access']) && $group_permissions[$section_key]['access']) {{ $section['color']['hex'] }} @else grey @endif"
                            @if(isset($group_permissions[$section_key]['access']) && $group_permissions[$section_key]['access'] && $group->shortname === 'super-admin' || $section_key === 'user-groups' && Auth::user()['user_groups'] === $group['shortname']) disabled @endif>
                        {{ __($section['name']) }}
                    </button>
                 </span>
                </td>
                <td>
                <span>
                    @if(isset($group_permissions[$section_key]['access']) && $group_permissions[$section_key]['access']) {{ __('Active') }} @else {{ __('Inactive') }} @endif
                </span>
                </td>
                <td>
                    <div class="col-12">

                        @forelse($section['privileges'] as $privilege_key => $privilege)
                            <div class="form-check form-check-inline">
                                <input name="{{ $section_key . '[' . $privilege_key . ']' }}"
                                       id="{{ $section_key . '[' . $privilege_key . ']' }}"
                                       type="checkbox"
                                       class="form-check-input"
                                       @if(old($section_key[$privilege_key] ?? false) || (isset($group_permissions[$section_key]['privileges'][$privilege_key]['status']) && $group_permissions[$section_key]['privileges'][$privilege_key]['status'])) checked @endif
                                       @if($group->shortname === 'super-admin' || !isset($group_permissions[$section_key]['access']) || !$group_permissions[$section_key]['access']) disabled @endif>
                                <label class="form-check-label" style="width: 10%;"
                                       for="{{ $section_key . '[' . $privilege_key . ']' }}">
                                    {{ __($privilege['name']) }}
                                </label>
                            </div>
                        @empty
                            {{ __('Section is empty.') }}
                        @endforelse

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">
                    {{ __('No Permissions Found.') }}
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
