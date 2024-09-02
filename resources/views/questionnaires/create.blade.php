@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('questionnaires.create') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Create New Questionnaire') }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="/questionnaires" method="post" class="needs-validation" novalidate>

                    @include('questionnaires.form')

                    <a href="/questionnaires" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
                    <button type="submit" class="btn btn-primary mt-2">{{ __('Create Questionnaire') }}</button>

                </form>

            </div>
        </div>

        <!-- needs alert for unsaved changes -->

    </div>

@endsection
