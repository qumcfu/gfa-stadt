@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('user-groups.create') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Add New User Group') }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="/user-groups" method="post" class="needs-validation" novalidate>

                    @csrf

                    <label for="name" class="form-label">{{ __('Name of New User Group') }}</label>
                    <div class="input-group has-validation mb-3">
                        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" required
                               value="{{ old('name') }}" placeholder="{{ __('User Group Name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <a href="/user-groups" class="btn btn-secondary">{{ __('Back') }}</a>
                        <button class="btn btn-primary">{{ __('Create User Group') }}</button>
                    </div>

                </form>

            </div>
        </div>

        <!-- needs alert for unsaved changes -->

    </div>

@endsection
