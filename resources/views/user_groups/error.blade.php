@extends('layouts.app')

@define $current_page = 'user-groups'

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-1">{{ __('An error has occured.') }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <h4>
                    {{ $error['title'] }}
                </h4>

                <p>
                    {{ $error['message'] }}
                </p>

                <ul>
                    @foreach($error['users'] as $user)
                        <li>{{ $user['username'] }} ({{ $user['email'] }})</li>
                    @endforeach
                </ul>

                <p>
                    {{ $error['proposition'] }}
                </p>

                <form action="/user-groups/transfer" method="post" class="d-inline-block">

                    @csrf
                    @method('PUT')

                    <select name="target-group" id="target-group" class="form-control">
                        @foreach($groups as $group)
                            <option value="{{ $group->shortname }}" {{ abs($group->id - $error['group']['id']) === 1 ? 'selected' : '' }}> {{ __($group->name) }} </option>
                        @endforeach
                    </select>

                    <input type="hidden" name="group-to-delete" value="{{ $error['group']['shortname'] }}">

                    <a href="/user-groups" class="btn btn-secondary mt-3">{{ __('Back') }}</a>
                    <button class="btn btn-danger mt-3">{{ __('Transfer Users and Delete ":group" Group', ['group' => __($error['group']['name'])]) }}</button>

                </form>



            </div>
        </div>
    </div>

@endsection
