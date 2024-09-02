@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('scripts.create') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ __('Add New Script') }}</h4>

        <div class="row g-3">

            <form action="/scripts" method="post" class="needs-validation" id="script-form" novalidate>
                @csrf
                @include('scripts.form')

                <div class="col-12 mt-2">
                    <a href="/scripts" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
                    <button class="btn btn-primary mt-2">{{ __('Create Script') }}</button>
                </div>
            </form>

        </div>

    </div>

@endsection
