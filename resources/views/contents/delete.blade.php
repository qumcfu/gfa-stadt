@extends('layouts.app')

@define $current_page = 'questions'

@section('content')

    <div class="col-md-7 col-lg-8 mt-2">
        <h4 class="mb-3">{{ __('Delete Content') }}</h4>

        <p>
            {{ __('You are about to delete the following content:') }}
        </p>

        <p>
            <strong>{{ $content->text }}</strong>
        </p>

        <p>
            {{ __('If you are sure you want to delete :that, please click on ":caption".', ['that' => __('this content'), 'caption' => __('Delete Content')]) }}
        </p>

        <form action="/questionnaires/{{ $questionnaire->id }}/contents/{{ $content->id }}" method="post" class="needs-validation" novalidate>

            @csrf
            @method('DELETE')

            <div class="mt-2">
                <a href="/questionnaires/edit/{{ $questionnaire->id }}" class="btn btn-secondary">{{ __('Back') }}</a>
                <button class="btn btn-danger">{{ __('Delete Content') }}</button>
            </div>

        </form>

    </div>

@endsection
