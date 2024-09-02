@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('users.registration') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mt-2">{{ __('Registration') }}</h4>
            </div>
            <div class="card-body">
                <p>
                    {!! __('In order to enroll in the screening tool, you will need a valid enrollment key. You should have received such a key in advance from the GFA_Stadt team.') !!}<br>
                    {!! __('If you encounter any problems, please ask your contact person or write an email to arne.sibilis@haw-hamburg.de.') !!}
                </p>

                <hr>

                <form action="/users/register" method="post" class="needs-validation" novalidate>

                    @csrf

                    <div class="row g-3">

                        <div class="col-4">
                            <div class="form-floating input-group has-validation">
                                <input name="data[0][username]" id="username" type="text" class="form-control @error('data.0.username') is-invalid @enderror"
                                       autocomplete="off" value="{{ old('data.0.username') ?? ''}}" placeholder="{{ __('Username') }}" required>
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                @error('data.0.username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <p class="mb-0">{!! __('Choose a username under which you want to appear on the platform. When you post ratings or comments on a screening, they are linked to your username.') !!}</p>
                        </div>

                        <div class="col-4">
                            <div class="form-floating input-group has-validation">
                                <input name="data[0][email]" id="email" type="text" class="form-control @error('data.0.email') is-invalid @enderror"
                                       autocomplete="off" value="{{ old('data.0.email') ?? ''}}" placeholder="{{ __('Email Address') }}" required>
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                @error('data.0.email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <p class="mb-0">{!! __('Enter a valid email address. You will be able to log in later using this address and, if you have forgotten your password, request a new one.') !!}</p>
                        </div>

                        <div class="col-4">
                            <div class="form-floating input-group has-validation">
                                <select name="data[0][group_id]" id="user-group" class="form-control">
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" @if(($group['id'] == old('data.0.group_id') ?? 0) || (old('data.0.group_id') == null && $group['shortname'] === 'participant')) selected @endif> {{ __($group->name) }} </option>
                                    @endforeach
                                </select>
                                <label for="user-group" class="form-label">{{ __('User Group') }}</span></label>
                            </div>
                        </div>

                        <div class="col-8">
                            <p class="mb-0">{!! __('The user group is already preset for you and cannot be changed.') !!}</p>
                        </div>

                        <div class="col-2">
                            <div class="form-floating input-group has-validation">
                                <input name="data[0][password]" id="password" type="password" class="form-control @error('data.0.password') is-invalid @enderror"
                                       autocomplete="new-password" value="{{ old('data.0.password') ?? ''}}" placeholder="{{ __('Password') }}" required>
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                @error('data.0.password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-floating input-group has-validation">
                                <input name="data[0][pw_confirm]" id="pw-confirm" type="password" class="form-control @error('data.0.pw_confirm') is-invalid @enderror"
                                       autocomplete="new-password" value="{{ old('data.0.pw_confirm') ?? ''}}" placeholder="{{ __('Confirm Password') }}" required>
                                <label for="pw-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                @error('data.0.pw_confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <p class="mb-0">{!! __('Choose a password that must consist of at least 8 characters and then confirm it to make sure that you have not mistyped it.') !!}</p>
                        </div>

                        <div class="col-4">
                            <div class="form-floating input-group has-validation">
                                <input name="data[0][key]" id="key" type="text" class="form-control @error('data.0.key') is-invalid @enderror"
                                       value="{{ old('data.0.key') ?? ''}}" placeholder="{{ __('Enrollment Key') }}" required>
                                <label for="key" class="form-label">{{ __('Enrollment Key') }}</label>
                                @error('data.0.key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-8">
                            <p class="mb-0">{!! __('You should have received the registration key in advance. It is used to assign your user account to a planning project. Please pay attention to capitalization.') !!}</p>
                        </div>

                    </div>

                    <input name="data[0][active]" id="active" type="hidden" class="form-check-input" value="{{ true }}">

                    <hr>

                    <p class="mt-3 mb-1">{!! __('When you have entered all the information, click Register. Ideally, you should be logged in automatically and find yourself on the platform.') !!}</p>

                    <button class="btn btn-primary mt-2">{{ __('Register') }}</button>

                </form>
            </div>
        </div>
    </div>

@endsection
