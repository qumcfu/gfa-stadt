@csrf

<div class="row g-3">

    <div class="col-5">
        <label for="username" class="form-label">{{ __('Username') }}</label>
        <div class="input-group has-validation">
            <!--span class="input-group-text">@</span-->
            <input name="username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" required
                   value="{{ old('username') ?? $user->username}}" placeholder="{{ __('Username') }}">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <div class="input-group has-validation">
            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" required
                   value="{{ old('email') ?? $user->email }}" placeholder="{{ __('Email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>

<div class="row g-3 mt-1">

    <div class="col-5">
        <label for="password" class="form-label">{{ __('Password') }}</span></label>
        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" required
               autocomplete="new-password" value="{{ old('password') ?? ''}}" placeholder="{{ __($password_placeholder) }}">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-3">
        <label for="user_group" class="form-label">{{ __('User Group') }}</span></label>
        <select name="group_id" id="user-group" class="form-control">
            @forelse($user_groups as $user_group)
                <option value="{{ $user_group->id }}" {{ $user_group->shortname == (old('user_group') ?? $user->user_group ?? 'guest') ? 'selected' : '' }}> {{ __($user_group->name) }} </option>
            @empty
                <option value="{{ $user->user_group }}" selected>{{ __('None Available') }}</option>
            @endforelse
        </select>
    </div>

</div>

<div class="row my-3">
    <div class="col-3">
        <div class="form-check ml-1">
            <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('users', 'disable') ? __('You do not have the permission to :action users.', ['action' => __('disable')]) : (Auth::user()->id === $user->id ? __('You cannot :action your own user account.', ['action' => __('disable')]) : ($user->user_group === 'admin' ? __('You cannot :action this user.', ['action' => __('disable')]) : '')) }}">
                <input name="active" id="active" type="checkbox" class="form-check-input" value="{{ true }}" @if(old('active') || $user->active > 0 || $user->active === null) checked @endif @if(!Auth::user()->hasPermission('users', 'disable') || Auth::user()->id === $user->id || $user->user_group === 'admin') disabled @endif>
                <label class="form-check-label" for="active">{{ __('Active User') }}</label>
            </x-utility.tooltip>
        </div>
    </div>

</div>
