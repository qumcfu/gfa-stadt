@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('users.create') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ __('Add New User') }}</h4>

        <form action="/users" method="post" class="needs-validation" novalidate>

            @include('users.form', ['password_placeholder' => 'Choose a password that is at least 8 characters long.'])

            <a href="/users" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
            <button class="btn btn-primary mt-2">{{ __('Create User') }}</button>

        </form>

        <!-- needs alert for unsaved changes -->

    </div>

@endsection
