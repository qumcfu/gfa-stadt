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
                <h4 class="mb-4">{{ __('Scope of Screening') }}</h4>
                <p>
                    {{ __('Drag the questionnaires with the mouse to the desired position to determine the order of the screening\'s contents.') }}
                </p>
            </div>

            <div class="col-6">

                <p>
                    {{ __('The :thing consists of the following questionnaires:', ['thing' => __('screening')]) }}
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
                        <tbody id="screening">
                        @foreach($questionnaires['screening'] as $questionnaire)
                            <tr role="button" class="screening-item" id="{{ $questionnaire->id }}">
                                <td class="text-end">{{ $questionnaire->id }}</td>
                                <td>{{ $questionnaire->name }}</td>
                                <td>{{ $questionnaire->author->username }}</td>
                                <td>{{ $questionnaire->getContentCount() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody id="screening-empty" hidden>
                            <tr>
                                <td colspan="5">{{ __('No Questionnaires Available.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6">

                <p>
                    {{ __('These questionnaires may be added to the :thing:', ['thing' => __('screening')]) }}
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
                            <tr role="button" class="screening-item" id="{{ $questionnaire->id }}">
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

        <form action="/configurations/update/screening" method="post">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12">
                    <input name="screening-ids" id="screening-ids" type="hidden" value="">
                    <div>
                        <a href="/configurations" class="btn btn-secondary">{{ __('Back') }}</a>
                        <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('configurations', 'edit') ? __('You do not have the permission to :action :target.', ['action' => __('edit'), 'target' => 'the screening']) : '' }}">
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
        new Sortable(screening, {
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

        $('#screening').bind('sort', function(event, ui) {
            update_lists();
        });

        $('.screening-item').mousedown(function() {
            if (!$(this).hasClass('is-inactive')) {
                $(this).addClass('is-inactive');
            }
        });

        function update_lists() {
            $('#screening-empty').attr('hidden', $('#screening .screening-item').length > 0)
            $('#available-empty').attr('hidden', $('#available .screening-item').length > 0)

            let ids = [];

            $('#screening .screening-item').each(function(index) {
                ids.push($(this).attr('id'));
                if($(this).hasClass('is-inactive')) {
                    $(this).removeClass('is-inactive');
                }
            });

            $('#available .screening-item').each(function(index) {
                if(!$(this).hasClass('is-inactive')) {
                    $(this).addClass('is-inactive');
                }
            });

            $('#screening-ids').attr('value', JSON.stringify(ids));
        }

    </script>

@endsection


<!--
    sortableJS:
    group: To drag list items from one list to another, they need to have the same group value.
	sort: This is a boolean value to enable/disable sorting inside a list. The default value is true.
	delay: Time in milliseconds to define when the sorting should start. The default value is 0.
	delayOnTouchOnly: Only delay if user is using touch. The default value is false.
	touchStartThreshold: How many pixels the point should move before cancelling a delayed drag event. The default value is 0.
	disabled: Disables the sortable if set to true. The default value is false.
	animation: Animation speed when sorting. 0 is no animation.
	handle: ".my-handle",  // Drag handle selector within list items
	filter: ".ignore-elements",  // Selectors that do not lead to dragging (String or Function)
	preventOnFilter: true, // Call `event.preventDefault()` when triggered `filter`
	draggable: ".item",  // Specifies which items inside the element should be draggable
-->
