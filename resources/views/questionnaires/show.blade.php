@extends('layouts.app')

<style>
    .list-group-item:hover {
        background-color: #f8f8f8;
    }

    form {
        margin-block-start: 0.25em;
        margin-block-end: 0.25em;
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionnaire->name }}</div>

                    <div class="card-body">

                    <!--a class="btn btn-dark" href="questionnaires/{{ $questionnaire->id }}/questions/create">{{ __('Add Question') }}</a-->
                        <a class="btn btn-primary"
                           href="/questionnaires/{{ $questionnaire->id }}/questions/create">{{ __('Add Question') }}</a>
                        <a class="btn btn-secondary"
                           href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">{{ __('Take Survey') }}</a>
                        <a class="btn btn-outline-danger" value='Test' id='toggle-delete-button' style="float:right;">{{ __('Edit Mode') }}</a>

                    </div>
                </div>

                @forelse($questionnaire->questions as $question)

                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>{{ $question->question }}</div>
                                <div>{{ $question->responses->count() }}</div>
                            </div>
                        </div>

                        <div class="card-body">

                            <ul class="list-group d-flex justify-content-between">
                                @foreach($question->answers as $answer)

                                    @switch($question->type)

                                        @case('single')
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>{{ $answer->answer }}</div>
                                            @if($question->responses->count() > 0)
                                                <div>{{ $responses[$question['id']][$answer['id']] }}
                                                    | {{ round(($responses[$question['id']][$answer['id']] * 100) / $question->responses->count(), 1) }}
                                                    %
                                                </div>
                                            @endif
                                        </li>
                                        @break

                                        @case('multiple')
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>{{ $answer->answer }}</div>
                                            @if($question->responses->count() > 0)
                                                <div>{{ $responses[$question['id']][$answer['id']] }}
                                                    | {{ round(($responses[$question['id']][$answer['id']] * 100) / $survey_count, 1) }}
                                                    %
                                                </div>
                                            @endif
                                        </li>
                                        @break

                                        @case('text')

                                        @forelse($question->responses as $response)
                                            <li class="list-group-item">
                                                <div>{{ $response->data['text'] }}</div>
                                            </li>
                                        @empty
                                            {{ __('This question has not been answered yet.') }}
                                        @endforelse
                                        @break

                                        @default
                                        <li class="list-group-item">Unknown Question Type: {{ $question->type }}</li>
                                        @break

                                    @endswitch

                                @endforeach
                            </ul>

                        </div>

                        <div class="card-footer" hidden>

                            <table>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary"
                                           href="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}/edit">{{ __('Edit') }}</a>
                                    </td>
                                    <td style="width: 0.25em;">

                                    </td>
                                    <td>
                                        <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}"
                                              method="post">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" onclick="return confirm({{ __('Are you sure?') }})"
                                                    class="btn btn-sm btn-outline-danger">{{ __('Delete Question') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>

                @empty

                    <div class="card mt-4">
                        <div class="card-header">{{ __('No Questions Available') }}</div>

                        <div class="card-body">

                            <p>{{ __('This questionnaire does not contain any questions yet.') }}</p>

                        </div>
                    </div>

                @endforelse

                <script>

                    let can_delete = false;

                    $(document).ready(function() {

                        $('#toggle-delete-button').click(function() {
                            can_delete = !can_delete;
                            if (can_delete)
                            {
                                $('.card-footer').attr('hidden', false);
                                $('#toggle-delete-button').addClass('btn-danger').removeClass('btn-outline-danger');
                            }
                            else
                            {
                                $('.card-footer').attr('hidden', true);
                                $('#toggle-delete-button').addClass('btn-outline-danger').removeClass('btn-danger');
                            }
                        });

                    });

                </script>

            </div>
        </div>
    </div>
@endsection
