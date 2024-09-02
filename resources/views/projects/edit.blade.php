@extends('layouts.app')

@php
    $info = json_decode($project->info, true);
    $membership = Auth::user()->getMembershipTo($project);
@endphp

@section('header')
    {{ Breadcrumbs::render('projects.edit', $project) }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ $project->name }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="" method="post" class="needs-validation" novalidate>

                    @method('PUT')

                    @include('projects.form')

                    <div class="d-inline-block mt-2">
                        <a href="/projects" class="btn btn-secondary">{{ __('Back') }}</a>
                        <button formaction="/projects/{{ $project->id }}" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        @if($membership == null || !$membership->active)
                            <span data-toggle="tooltip" title="{{ __('Please subscribe to this project first.') }}">
                        @endif
                        <button formaction="/screening/{{ $membership->screening->id ?? null }}/view/1" class="btn btn-primary" @if($membership == null || !$membership->active) disabled="disabled" @endif>{{ __('Continue to Screening') }}</button>
                        @if($membership == null || !$membership->active)
                            </span>
                        @endif
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
