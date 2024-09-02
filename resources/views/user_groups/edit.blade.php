@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('user-groups.edit', $group) }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-1">{{ __('Edit Permissions') }} ({{ __('User Group ":name"', ['name' => __($group['name'])]) }})</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="/user-groups/{{ $group->id }}" method="post" class="needs-validation" novalidate>

                    @method('PUT')

                    @include('user_groups.form')

                    <a href="/user-groups" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
                    <button class="btn btn-primary mt-2">{{ __('Save Changes') }}</button>

                </form>

            </div>
        </div>
    </div>

@endsection
