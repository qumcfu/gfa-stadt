<!--
    The MIT License (MIT)

    Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
-->
@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('configurations.edit', $component) }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">

        <div class="row gx-3 gy-0">

            <div class="col-12">
                <h4 class="mb-4">{{ __('Extent of Appraisal') }}</h4>
                <p>
                    {{ __('Drag the questionnaires with the mouse to the desired position to determine the order of the appraisal\'s contents.') }}
                </p>
            </div>

            <div class="col-6">

                <p>
                    {{ __('The :thing consists of the following questionnaires:', ['thing' => __('appraisal')]) }}
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="user-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Questionnaire') }}</th>
                            <th scope="col">{{ __('Author') }}</th>
                            <th scope="col">{{ __('Items') }}</th>
                        </tr>
                        </thead>
                        <tbody id="appraisal">
                        @foreach($questionnaires['appraisal'] as $questionnaire)
                            <tr role="button" class="appraisal-item" id="{{ $questionnaire->id }}">
                                <td class="text-end">{{ $questionnaire->id }}</td>
                                <td>{{ $questionnaire->name }}</td>
                                <td>{{ $questionnaire->author->username }}</td>
                                <td>{{ $questionnaire->getContentCount() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody id="appraisal-empty" hidden>
                        <tr>
                            <td colspan="5">{{ __('No Questionnaires Available.') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6">

                <p>
                    {{ __('These questionnaires may be added to the :thing:', ['thing' => __('appraisal')]) }}
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="user-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Questionnaire') }}</th>
                            <th scope="col">{{ __('Author') }}</th>
                            <th scope="col">{{ __('Items') }}</th>
                        </tr>
                        </thead>
                        <tbody id="available">
                        @foreach($questionnaires['idle'] as $questionnaire)
                            <tr role="button" class="appraisal-item" id="{{ $questionnaire->id }}">
                                <td class="text-end">{{ $questionnaire->id }}</td>
                                <td>{{ $questionnaire->name }}</td>
                                <td>{{ $questionnaire->author->username }}</td>
                                <td>{{ $questionnaire->getContentCount() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody id="available-empty" hidden>
                        <tr>
                            <td colspan="5">{{ __('No Questionnaires Available.') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <form action="/configurations/update/appraisal" method="post">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12">
                    <input name="appraisal-ids" id="appraisal-ids" type="hidden" value="">
                    <div>
                        <a href="/configurations" class="btn btn-secondary">{{ __('Back') }}</a>
                        <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('configurations', 'edit') ? __('You do not have the permission to :action :target.', ['action' => __('edit'), 'target' => 'the appraisal']) : '' }}">
                            <button class="btn btn-primary"  @if(!Auth::user()->hasPermission('configurations', 'edit')) disabled @endif>
                                {{ __('Save Changes') }}
                            </button>
                        </x-utility.tooltip>
                    </div>
                </div>
            </div>

        </form>
    </div>


    <script>
        new Sortable(appraisal, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            group: 'group'
        });

        new Sortable(available, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            group: 'group'
        });

        $( document ).ready(function() {
            update_lists();
        });

        $('#appraisal').bind('sort', function(event, ui) {
            update_lists();
        });

        $('.appraisal-item').mousedown(function() {
            if (!$(this).hasClass('is-inactive')) {
                $(this).addClass('is-inactive');
            }
        });

        function update_lists() {
            $('#appraisal-empty').attr('hidden', $('#appraisal .appraisal-item').length > 0)
            $('#available-empty').attr('hidden', $('#available .appraisal-item').length > 0)

            let ids = [];

            $('#appraisal .appraisal-item').each(function(index) {
                ids.push($(this).attr('id'));
                if($(this).hasClass('is-inactive')) {
                    $(this).removeClass('is-inactive');
                }
            });

            $('#available .appraisal-item').each(function(index) {
                if(!$(this).hasClass('is-inactive')) {
                    $(this).addClass('is-inactive');
                }
            });

            $('#appraisal-ids').attr('value', JSON.stringify(ids));
        }

    </script>

@endsection
