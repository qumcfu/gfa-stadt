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
    {{ Breadcrumbs::render('configurations') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12">
        <h4 class="mb-3 color-heading bg-configurations">{{ __('Configurations') }}</h4>

        <div class="row g-2">

            <div class="col-12">
                <h5>{{ __('Scope of Screening') }}</h5>
                <p>
                    {{ __('The :thing consists of these questionnaires:', ['thing' => __('screening')]) }}
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="screening-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Questionnaire') }}</th>
                            <th scope="col">{{ __('Author') }}</th>
                            <th scope="col">{{ __('Items') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($screening as $questionnaire)
                            <tr>
                                <td class="text-end">{{ $questionnaire->id }}</td>
                                <td>{{ $questionnaire->name }}</td>
                                <td>{{ $questionnaire->author->username }}</td>
                                <td>{{ $questionnaire->getContentCount() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">{{ __('Currently, there aren\'t any questionnaires associated with the :thing.', ['thing' => __('screening')]) }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <form action="/configurations/edit/screening" method="get">
                    <div class="mt-2">
                        <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('configurations', 'edit') ? __('You do not have the permission to :action :target.', ['action' => __('edit'), 'target' => 'screenings']) : '' }}">
                            <button class="btn btn-primary"  @if(!Auth::user()->hasPermission('configurations', 'edit')) disabled @endif>
                                {{ __('Configure :thing', ['thing' => __('Screening')]) }}
                            </button>
                        </x-utility.tooltip>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <h5 class="mt-4">{{ __('Extent of Appraisal') }}</h5>
                <p>
                    {{ __('The :thing consists of these questionnaires:', ['thing' => __('appraisal')]) }}
                </p>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="screening-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Questionnaire') }}</th>
                            <th scope="col">{{ __('Author') }}</th>
                            <th scope="col">{{ __('Items') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($appraisal as $questionnaire)
                            <tr>
                                <td class="text-end">{{ $questionnaire->id }}</td>
                                <td>{{ $questionnaire->name }}</td>
                                <td>{{ $questionnaire->author->username }}</td>
                                <td>{{ $questionnaire->getContentCount() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">{{ __('Currently, there aren\'t any questionnaires associated with the :thing.', ['thing' => __('appraisal')]) }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <form action="/configurations/edit/appraisal" method="get">
                    <div class="mt-2">
                        <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('configurations', 'edit') ? __('You do not have the permission to :action :target.', ['action' => __('edit'), 'target' => 'assessments']) : '' }}">
                            <button class="btn btn-primary"  @if(!Auth::user()->hasPermission('configurations', 'edit')) disabled @endif>
                                {{ __('Configure :thing', ['thing' => __('Appraisal')]) }}
                            </button>
                        </x-utility.tooltip>
                    </div>
                </form>
            </div>

        </div>

        <a href="/dashboard" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
    </div>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

@endsection
