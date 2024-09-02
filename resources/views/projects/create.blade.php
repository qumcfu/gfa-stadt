@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('projects.create') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Add New Project') }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="/projects" method="post" class="needs-validation" novalidate>

                    @include('projects.form')

                    <a href="/projects" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
                    <button class="btn btn-primary mt-2">{{ __('Create Project') }}</button>

                </form>

            </div>
        </div>

        <!-- needs alert for unsaved changes -->

    </div>

@endsection
