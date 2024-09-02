@extends('layouts.app')

@define $current_page = 'users'

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Delete User') }}</h4>

        <p>
            {{ __('You are about to delete the following user:') }}
        </p>

        <p>
            {{ __('Username') }}: <strong>{{ $user->username }}</strong><br>
            {{ __('Email') }}: <strong>{{ $user->email }}</strong><br>
        </p>

        <p>
            {{ __('If you are sure you want to delete :that, please click on ":caption".', ['that' => __('this user'), 'caption' => __('Permanently Delete User')]) }}
        </p>

        <form action="/users/{{ $user->id }}" method="post" class="needs-validation" novalidate>

            @csrf
            @method('DELETE')

            <a href="/users" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
            <button class="btn btn-danger mt-2">{{ __('Permanently Delete User') }}</button>

        </form>

    </div>

@endsection
