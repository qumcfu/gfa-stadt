@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('users.edit', $user) }}
@endsection

@section('content')

<div class="col-md-7 col-lg-12 mt-2">
    <h4 class="mb-3">{{ __('Edit User Details') }}</h4>

    <form action="/users/{{ $user->id }}" method="post" class="needs-validation" novalidate>

        @method('PUT')

        @include('users.form', ['password_placeholder' => 'Leave this field blank to keep the old password.'])

        <a href="/users" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
        <button class="btn btn-primary mt-2">{{ __('Save Changes') }}</button>

    </form>

    <!-- needs alert for unsaved changes -->

</div>

@endsection
