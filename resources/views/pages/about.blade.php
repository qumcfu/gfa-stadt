@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('pages.about') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <div class="row g-3">

            <div class="col-12">
                <h4 class="mb-3">{{ __('About :thing', ['thing' => config('app.name', 'APP_NAME')]) }}</h4>
            </div>

        </div>
    </div>

@endsection

@section('footer')
    <a href="/legal">{{ __('Legal Notice') }}</a>&ensp;
    <a href="/privacy">{{ __('Privacy Statement') }}</a>
@endsection
