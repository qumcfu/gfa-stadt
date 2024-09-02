<div class="row g-2">

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <input name="data[{{ $user['id'] ?? 0 }}][username]" id="username-{{ $user['id'] ?? 0 }}" type="text" class="form-control @error('data.' . ($user['id'] ?? 0) .'.username') is-invalid @enderror" required
                   value="{{ old('data.' . ($user['id'] ?? 0) .'.username') ?? $user['username'] ?? '' }}" placeholder="{{ __('Username') }}" autocomplete="username">
            @error('data.' . ($user['id'] ?? 0) .'.username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="username-{{ $user['id'] ?? 0 }}" class="form-label">{{ __('Username') }}</label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <input name="data[{{ $user['id'] ?? 0 }}][email]" id="email-{{ $user['id'] ?? 0 }}" type="text" class="form-control @error('data.' . ($user['id'] ?? 0) .'.email') is-invalid @enderror" required
                   value="{{ old('data.' . ($user['id'] ?? 0) .'.email') ?? $user['email'] ?? '' }}" placeholder="{{ __('Email') }}" autocomplete="email">
            @error('data.' . ($user['id'] ?? 0) .'.email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="email-{{ $user['id'] ?? 0 }}" class="form-label">{{ __('Email') }}</label>
        </div>
    </div>

    <div class="col-12">
        <div class="input-group">
            <span class="input-group-text" id="pw-input-{{ $user['id'] ?? 0 }}">{{ __('Password') }}</span>
            <input name="data[{{ $user['id'] ?? 0 }}][password]" id="password-{{ $user['id'] ?? 0 }}" type="password" class="form-control @error('data.' . ($user['id'] ?? 0) .'.password') is-invalid @enderror" aria-describedby="pw-input-{{ $user['id'] ?? 0 }}"
                   autocomplete="new-password" value="{{ old('data.' . ($user['id'] ?? 0) .'.password') ?? '' }}" placeholder="{{ $user != null ? __('Leave blank to keep old password.') : __('Minimum length: :n characters', ['n' => '8']) }}">
            @error('data.' . ($user['id'] ?? 0) .'.password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <select name="data[{{ $user['id'] ?? 0 }}][group_id]" id="user-group-{{ $user['id'] ?? 0 }}" class="form-control" required>
                @if(($user['group']['shortname'] ?? '') === 'admin')
                    <option value="{{ $user['group']['id'] }}" selected>{{ __($user['group']['name']) }}</option>
                @else
                    @foreach($groups as $group)
                        <option value="{{ $group['id'] }}" {{ $group['id'] == (old('data.' . ($user['id'] ?? 0) .'.group_id') ?? $user['group']['id'] ?? 0) ? 'selected' : (old('data.' . ($user['id'] ?? 0) .'.group_id') == null && $user == null && $group['shortname'] === 'guest' ? 'selected' : '') }}>{{ __($group['name']) }}</option>
                    @endforeach
                @endif
            </select>
            <label for="user-group-{{ $user['id'] ?? 0 }}">{{ __('User Group') }}</label>
        </div>
    </div>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <select name="data[{{ $user['id'] ?? 0 }}][active]" id="active-{{ $user['id'] ?? 0 }}" class="form-control">
                <option value="{{ 1 }}" {{ 1 == (old('data.' . ($user['id'] ?? 0) .'.active') ?? $user['active'] ?? 1) ? 'selected' : '' }}>{{ __('Active') }}</option>
                <option value="{{ 0 }}" {{ 0 == (old('data.' . ($user['id'] ?? 0) .'.active') ?? $user['active'] ?? 1) ? 'selected' : '' }} @if(($user['id'] ?? 0) === Auth::user()['id'] || ($user['group']['shortname'] ?? '') === 'admin') disabled @endif>{{ __('Inactive') }}</option>
            </select>
            <label for="active-{{ $user['id'] ?? 0 }}">{{ __('Status') }}</label>
        </div>
    </div>

</div>
