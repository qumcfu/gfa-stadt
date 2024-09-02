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
    {{ Breadcrumbs::render('screening.view', $stage, $page) }}
    <script src="{{ asset('js/files.js') }}" defer></script>
    <x-scripts.screening-view></x-scripts.screening-view>
    <script src="{{ asset('js/screening.js') }}" defer></script>
@endsection

@section('title', __('Screening on :project', ['project' => $project['name'] ?? __('Unknown project')]))

@section('content')

    <div class="row">
        <div class="col-12">

            <x-navigation.screening-nav :stage='$stage' :questionnaire='$questionnaire'>

                @php($project = $stage->getProject())
                <h3 class="color-heading screening-heading br-round-top text-start {{ !is_null($project['color']) && $project['color']->isBright() ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
                    <span>{{ $project['name'] }}</span>
                </h3>

                <div class="br-round-bottom mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
                    <div class="d-flex justify-content-between px-3">
                        <h5 class="my-0 py-2">{{ __('Screening') }}</h5>
                        <h5 class="text-body-secondary my-0 py-2">{{ __(':percent completed', ['percent' => number_format($stage->getProgress() * 100, 0, ',', '') .  ' %']) }}</h5>
                    </div>
                </div>

                <h5 class="color-heading screening-heading br-round-top text-start mt-3 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                    <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} me-1" style="font-size: 1.2em;"></i>
                    <span>{{ $questionnaire['name'] }}</span>
                </h5>

                @if(isset($questionnaire['description']))
                    <div class="mt-0 px-0" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
                        <div class="px-3">
                            <p class="my-0 py-2">{{ $questionnaire['description'] }}</p>
                        </div>
                    </div>
                @endif

                <x-views.questionnaire-contents :questionnaire='$questionnaire' :project='$project' :stage='$stage'></x-views.questionnaire-contents>

            </x-navigation.screening-nav>

        </div>
    </div>

    <x-modals.show-info :activeSection='"screening"'></x-modals.show-info>
    <x-modals.show-project-info :project='$project'></x-modals.show-project-info>
    <x-modals.view-tutorial-video :page='"screening"'></x-modals.view-tutorial-video>
@endsection
