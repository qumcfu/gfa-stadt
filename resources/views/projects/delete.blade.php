@extends('layouts.app')

@define $current_page = 'projects'

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Delete Project') }}</h4>

        <p>
            {{ __('You are about to delete the following project:') }}
        </p>

        <p>
            <strong>{{ __($project->name) }}</strong>
        </p>

        <p>
            {{ __('If you are sure you want to delete :that, please click on ":caption".', ['that' => __('this project'), 'caption' => __('Delete Project')]) }}
        </p>

        <form action="/projects/{{ $project->id }}" method="post" class="needs-validation" novalidate>

            @csrf
            @method('DELETE')

            <a href="/projects" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
            <button class="btn btn-danger mt-2">{{ __('Delete Project') }}</button>

        </form>

    </div>

@endsection
