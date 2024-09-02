@extends('layouts.app')

@define $current_page = 'user-groups'

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Delete User Group') }}</h4>

        <p>
            {{ __('You are about to delete the following user group:') }}
        </p>

        <p>
            <strong>{{ __($group->name) }}</strong>
        </p>

        <p>
            {{ __('If you are sure you want to delete :that, please click on ":caption".', ['that' => __('this user group'), 'caption' => __('Delete User Group')]) }}
        </p>

        <form action="/user-groups/{{ $group->id }}" method="post" class="needs-validation" novalidate>

            @csrf
            @method('DELETE')

            <a href="/user-groups" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
            <button class="btn btn-danger mt-2">{{ __('Delete User Group') }}</button>

        </form>

    </div>

@endsection
