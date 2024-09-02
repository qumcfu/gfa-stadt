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
    {{ Breadcrumbs::render('questionnaires.edit', $questionnaire) }}
@endsection

@section('content')

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/questionnaires"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-11">
            <h4 class="mb-3">{{ $questionnaire->name }}</h4>
        </div>
        <div class="col-1 text-end">
            <form action="" method="get" class="d-inline-block text-nowrap">
                @php
                    $current = ($questionnaire->order_id ?? 1);
                @endphp
                <x-buttons.icon :action='$previous != null ? ("/questionnaires/edit/" . $previous->id) : ""' :icon='"caret-left-fill"' :color='"secondary"' :htmlColor='$previous != null ? "dimgray" : "silver"' :disabled='$previous == null' :tooltip='$previous != null ? __("Previous Questionnaire") : ""'></x-buttons.icon>
                <x-buttons.icon :action='$next != null ? ("/questionnaires/edit/" . $next->id) : ""' :icon='"caret-right-fill"' :color='"secondary"' :htmlColor='$next != null ? "dimgray" : "silver"' :disabled='$next == null' :tooltip='$next != null ? __("Next Questionnaire") : ""'></x-buttons.icon>
                @if(Gate::allows('edit-questionnaires', Auth::user() ?? null))
                    <div class="position-absolute text-center" style="width: 3em; top: 5.5em; right: 2em;">
                        <x-buttons.icon :action='"/questionnaires/preview/" . $current' :icon='"eye-fill"' :color='"dark"' :tooltip='__("Preview")'></x-buttons.icon>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-7 col-lg-12 mt-2">

            <h4 class="mt-4 mb-3">{{ __('Contents') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="user-table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-end">#</th>
                        <th scope="col">{{ __('Content') }}</th>
                        <th scope="col">{{ __('Info') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($contents as $content)
                        @php $data = json_decode($content->data ?? [], true) @endphp
                        <tr class="sortable-item" id="{{ $content->id }}">
                            <td class="text-end text-nowrap">{{ $content->order_id }}&thinsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $content->id'></x-icons.tooltip-icon></td>
                            <td>
                                @switch($content->type->shortname)
                                    @case('single') @case('multiple')  @case('text-input') @case('number-input')
                                        <x-icons.tooltip-icon :icon='$content->type->icon' :color='$content->type->color' :opacity='100' :tooltip='__("Question") . " (" . __($content->type->name) . ")"'></x-icons.tooltip-icon>
                                    @break
                                    @default
                                        <x-icons.tooltip-icon :icon='$content->type->icon' :color='$content->type->color' :opacity='100' :tooltip='__($content->type->name)'></x-icons.tooltip-icon>
                                    @break
                                @endswitch
                                &nbsp;{{ $content->text }}
                                @if($content->type->shortname === 'item')
                                    ({{ __('Obtainable Score') }}: <b>{{ $content->size ?? 0 }}</b>)
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"question-circle"' :color='"dark"' :tooltip='"<b>" . __("Short name") . "</b><br>" . $content["short"]'></x-icons.tooltip-icon>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle" . (strlen($content["info"]) > 0 ? "-fill" : "")' :color='"dark"' :alignment='"start"' :tooltip='"<b>" . __("Additional information") . "</b><br>" . $content["info"]'></x-icons.tooltip-icon>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='min($content["priority"], 9) . ($content["priority"] > 3 ? "-circle" : "-circle-fill")' :color='$content["priority"] > 2 ? "success" : ($content["priority"] > 1 ? "warning" : "danger")' :tooltip='"<b>" . __("Priority") . "</b>: " . $content["priority"]'></x-icons.tooltip-icon>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$content->getCreatedAtTimestamp()'></x-icons.tooltip-icon>
                                @if($content['editor'] != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$content->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                                @endif
                            </td>
                            <td class="text-nowrap px-2 py-1">
                                <form action="" method="get" class="d-inline-block">
                                    <x-buttons.icon :action='"/questionnaires/" . $questionnaire->id . "/contents/edit/" . $content->id' :icon='"pencil-fill"' :color='"primary"' :tooltip='__("Edit")'></x-buttons.icon>
                                    <x-buttons.icon :action='"/questionnaires/" . $questionnaire->id . "/contents/create/" . ($content->order_id + 1)' :icon='"plus-circle-fill"' :color='"success"' :tooltip='__("Insert Content Below")'></x-buttons.icon>
                                </form>
                                <form action="" method="post" class="d-inline-block">
                                    @method('PUT')
                                    @csrf
                                    @if((Auth::user()->memory->content_id ?? null) == null)
                                        <x-buttons.icon :action='"/memorize/" . $content->id' :icon='"plus-circle"' :color='"secondary"' :tooltip='__("Duplicate Content")'></x-buttons.icon>
                                    @else
                                </form>
                                <form action="" method="post" class="d-inline-block">
                                    @csrf
                                        <x-buttons.icon :action='"/copy/" . Auth::user()->memory->id . "/" . $questionnaire->id . "/" . ($content->order_id + 1)' :icon='"arrow-down-circle-fill"' :color='"secondary"' :tooltip='__("Insert Copy Below")'></x-buttons.icon>
                                </form>
                                <form action="" method="post" class="d-inline-block">
                                    @method('PUT')
                                    @csrf
                                    <x-buttons.icon :action='"/forget/" . Auth::user()->memory->id' :icon='"dash-circle"' :color='"secondary"' :tooltip='__("Cancel Duplication")'></x-buttons.icon>
                                    @endif
                                </form>
                                <x-buttons.icon-modal icon="trash-fill" color="danger" tooltip="{{ Gate::allows('delete-questionnaires', Auth::user() ?? null) ? __('Delete') : __('You do not have the permission to :action :target.', ['action' => __('delete'), 'target' => __('contents')]) }}" target="#deleteModal" name="{{ html_entity_decode($content->text) . ' (' . __($content->type->name) . ')' }}" id="{{ $content->id }}" parent="{{ $content->questionnaire_id ?? 0 }}" disabled="{{ !Gate::allows('delete-questionnaires', Auth::user() ?? null) ? 'disabled' : ''}}"></x-buttons.icon-modal>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                {{ __('This questionnaire is currently empty.') }}
                            </td>
                            <td class="text-nowrap px-2 py-1">
                                <form action="" method="get" class="d-inline-block">
                                    <x-buttons.icon :action='"/questionnaires/" . $questionnaire->id . "/contents/create/1"' :icon='"plus-circle-fill"' :color='"success"' :tooltip='__("Add New Content")'></x-buttons.icon>
                                </form>
                                @if((Auth::user()->memory->content_id ?? null) != null)
                                <form action="" method="post" class="d-inline-block">
                                    @csrf
                                    <x-buttons.icon :action='"/copy/" . Auth::user()->memory->id ."/" . $questionnaire->id . "/1"' :icon='"arrow-down-circle-fill"' :color='"warning"' :tooltip='__("Paste Content")'></x-buttons.icon>
                                </form>
                                <form action="" method="post" class="d-inline-block">
                                    @method('PUT')
                                    @csrf
                                    <x-buttons.icon :action='"/forget/" . Auth::user()->memory->id' :icon='"dash-circle"' :color='"warning"' :tooltip='__("Cancel Duplication")'></x-buttons.icon>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex mt-2">

                <div class="d-inline-block">
                    <a href="/questionnaires" class="btn btn-secondary">{{ __('Back') }}</a>
                    <button class="btn btn-primary" id="save-order-button" form="top-form">{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
                </div>

                <form action="/questionnaires/{{ $questionnaire->id }}/contents/create/{{ $questionnaire->getContentCount() + 1 }}" method="get" class="needs-validation d-inline-block" novalidate>
                    <div class="mx-1">
                        <button class="btn btn-success">{{ __('Add New Content') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <x-modals.confirm-delete section="contents" target="{{ __('Content') }}" object="%name" message="By clicking the button :pre:button:post, :target :object will be irrevocably deleted."></x-modals.confirm-delete>

    <script>
        new Sortable(sortable, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            group: 'group'
        });

        $( document ).ready(function() {
            update_list();
        });

        $('#sortable').bind('sort', function(event, ui) {
            update_list();
        });

        function update_list() {

            let ids = [];

            $('#sortable .sortable-item').each(function(index) {
                ids.push($(this).attr('id'));
            });

            $('#order').attr('value', JSON.stringify(ids));
        }
    </script>

@endsection
