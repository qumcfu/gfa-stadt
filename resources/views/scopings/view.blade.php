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

@section('head')
    <x-scripts.chart-js></x-scripts.chart-js>
    <x-scripts.results-charts></x-scripts.results-charts>
@endsection

@section('header')
    {{ Breadcrumbs::render('scoping.view', $project) }}
@endsection

@section('content')

    <form method="get">
        <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
            <x-buttons.round-icon-form-action :action='"/screening/report/" . $project["id"]' :onClick='"showLoading()"' :icon='"journal-bookmark-fill"' :color='"dark"' :tooltip='__("Back to Report")'></x-buttons.round-icon-form-action>
        </div>
    </form>

    <form method="get">
        <div class="position-fixed hide-when-printing" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("To Dashboard")'></x-buttons.round-icon-open-page>
        </div>
    </form>

    <div class="mb-4">

        <h4 class="color-heading report-heading br-round-top text-center {{ (isset($project['color']) && $project['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <span>{{ __('Scoping on :quote', ['quote' => __(':quote', ['quote' => $project['name']])]) }}</span>
        </h4>

        <div class="color-frame br-round-bottom mt-0 mb-3 px-0" style="border-width: 2px; border-style: solid; border-color: {{ $project['color']['hex'] ?? '#606060' }};">
            <div class="d-flex justify-content-center p-0" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}20;">
                <div class="px-3 py-3">
                    <x-localization.scoping-view :project='$project'></x-localization.scoping-view>

                    <livewire:scoping.appraisal-mode-selection :project='$project' />
                </div>
            </div>
        </div>

        <livewire:scoping.content-selection :project='$project' />

        <form method="post">
            @csrf
            @method('PUT')
            <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 0 * config('settings.buttons.gap') }}px;">
                <x-buttons.round-icon-form-action :action='"/scoping/conclude/" . $project["id"]' :icon='"save"' :color='"success"' :onClick='"showLoading()"' :tooltip='__("Save Changes")'></x-buttons.round-icon-form-action>
            </div>
        </form>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 1 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#show-info-modal"' :icon='"info-lg"' :color='"secondary"' :tooltip='__("About this tool")'></x-buttons.round-icon-toggle-modal>
        </div>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-on-click :onClick='"window.print()"' :icon='"printer-fill"' :color='"secondary"' :tooltip='__("Print :thing", ["thing" => __("Page")])'></x-buttons.round-icon-on-click>
        </div>

        <div class="position-fixed hide-when-printing" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 3 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
        </div>

    </div>

    <x-modals.show-info :activeSection='"scoping"'></x-modals.show-info>
    <x-modals.view-tutorial-video :page='"scoping"'></x-modals.view-tutorial-video>

@endsection
