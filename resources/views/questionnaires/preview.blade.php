@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('questionnaires.preview', $questionnaire) }}
@endsection

@section('content')

    <div class="row g-2">
        <div class="col-11">
            <h2>{{ ($questionnaire->name ?? __('Unknown Questionnaire')) . ' (' . __('Preview') . ')' }}</h2>
        </div>
        <div class="col-1 text-end">
            <form action="" method="get" class="d-inline-block text-nowrap">

            <x-buttons.icon action="{{ $previous != null ? '/questionnaires/preview/' . ($previous->id ?? 0) : '' }}" icon="caret-left-fill" color="secondary" htmlcolor="{{ $previous != null ? 'dimgray' : 'silver' }}" disabled="{{ $previous == null ? 'disabled' : '' }}" tooltip="{{ $previous != null ? __('Previous Questionnaire') : '' }}"></x-buttons.icon>
            <x-buttons.icon action="{{ $next != null ? '/questionnaires/preview/' . ($next->id ?? 0) : '' }}" icon="caret-right-fill" color="secondary" htmlcolor="{{ $next != null ? 'dimgray' : 'silver' }}" disabled="{{ $next == null ? 'disabled' : '' }}" tooltip="{{ $next != null ? __('Next Questionnaire') : '' }}"></x-buttons.icon>
            @if(Gate::allows('edit-questionnaires', Auth::user() ?? null))
                <div class="position-absolute text-center" style="width: 3em; top: 5.5em; right: 2em;">
                    <x-buttons.icon action="/questionnaires/edit/{{ $questionnaire->id }}" icon="pencil-fill" color="dark" tooltip="{{ __('Edit') }}"></x-buttons.icon>
                </div>
            @endif
        </div>
    </div>

    <x-views.questionnaire-contents :questionnaire='$questionnaire'></x-views.questionnaire-contents>

    <div class="mt-3">
        <a class="btn btn-secondary" href="/questionnaires/edit/{{ $questionnaire->id }}">{{ __('Back') }}</a>
    </div>

@endsection
