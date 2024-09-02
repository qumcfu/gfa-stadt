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
    {{ Breadcrumbs::render('questionnaires') }}
    <x-scripts.icon-selection></x-scripts.icon-selection>
    <x-scripts.color-selection></x-scripts.color-selection>
    <x-scripts.modal-validation></x-scripts.modal-validation>
@endsection

@section('content')

    <div class="col-md-7 col-lg-12">
        <div class="row g-3">
            <div class="col-12">

                <h4 class="mb-4 color-heading bg-questionnaires">{{ __('Questionnaires') }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-2" id="questionnaires-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">{{ __('Contents') }}</th>
                            <th scope="col">{{ __('Info') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        @forelse($questionnaires as $questionnaire)
                            <tr class="sortable-item" id="{{ $questionnaire->id }}">
                                <td class="text-end text-nowrap">{{ $questionnaire->order_id }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $questionnaire->id'></x-icons.tooltip-icon></td>
                                <td><x-icons.tooltip-icon :icon='$questionnaire["type"]["icon"]' :color='$questionnaire["type"]["color"]' :opacity='75' :tooltip='__($questionnaire["type"]["name"])'></x-icons.tooltip-icon>&thinsp;<x-icons.tooltip-icon :icon='"circle-fill"' :htmlColor='$questionnaire["color"]["hex"] ?? "#808080"' :tooltip='__("Color") . ": " . ($questionnaire["color"]["name"] ?? __("No Color"))'></x-icons.tooltip-icon>&thinsp;<x-icons.tooltip-icon :icon='$questionnaire["icon"]["name"] ?? "question-circle"' :color='"dark"' :tooltip='__("Icon") . ": " . ($questionnaire["icon"]["name"] ?? __("No Icon"))'></x-icons.tooltip-icon>&nbsp;&thinsp;<span class="text-button" data-bs-toggle="modal" data-bs-target="#show-questionnaire-modal-{{ $questionnaire['id'] ?? 0 }}">{{ __($questionnaire['name']) }}</span></td>
                                <td>
                                    @php($maxContents = 10)
                                    @php($contentIndex = 0)
                                    @forelse($questionnaire['contents'] as $content)
                                        @if($contentIndex < $maxContents)
                                            <span class="mx-1">
                                                <x-icons.tooltip-icon :icon='$content["type"]["icon"]' :color='"dark"' :tooltip='"<b>" . __($content["type"]["name"]) . "</b><br>" . ($content["short"] ?? __("Unknown Content"))'></x-icons.tooltip-icon>
                                            </span>
                                        @endif
                                        @php($contentIndex++)
                                    @empty
                                        <span class="text-body-secondary">{{ __('None') }}</span>
                                    @endforelse
                                    @if($contentIndex > $maxContents)
                                        <span class="mx-1">
                                            <x-icons.tooltip-icon :icon='"three-dots"' :color='"dark"' :tooltip='__("...and :n more", ["n" => $contentIndex - $maxContents])'></x-icons.tooltip-icon>
                                        </span>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$questionnaire->getCreatedAtTimestamp()'></x-icons.tooltip-icon>
                                    @if($questionnaire['editor'] != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$questionnaire->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td class="text-nowrap px-2 py-1">

                                    @if(Gate::allows('visibility', ['edit', 'questionnaires']))<x-buttons.icon-edit-modal :target='"#edit-questionnaire-modal-" . $questionnaire["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-questionnaires") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Questionnaires")])' :disabled='!Gate::allows("edit-questionnaires")'></x-buttons.icon-edit-modal>@endif

                                    @if(Gate::allows("edit-questionnaires"))
                                        <x-modals.edit-questionnaire :questionnaire='$questionnaire'></x-modals.edit-questionnaire>
                                    @endif

                                    <form action="" method="get" class="d-inline-block">
                                        <x-buttons.icon :action='"/questionnaires/edit/" . $questionnaire->id' :icon='"list-stars"' :color='"primary"' :tooltip='Gate::allows("edit-questionnaires") ? __("Edit :thing", ["thing" => __("Contents")]) : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("questionnaires")])' :disabled='!Gate::allows("edit-questionnaires")'></x-buttons.icon>
                                        <span class="sortable-handle"><x-icons.tooltip-icon :actAsButton='true' :isHandle='true' :icon='"arrows-expand"' :color='"dark"' :tooltip="__('Reorder')"></x-icons.tooltip-icon></span>
                                        <x-buttons.icon-modal icon="trash-fill" color="danger" tooltip="{{ Gate::allows('delete-questionnaires', Auth::user() ?? null) ? __('Delete') : __('You do not have the permission to :action :target.', ['action' => __('delete'), 'target' => __('questionnaires')]) }}" target="#deleteModal" name="{{ $questionnaire->title }}" id="{{ $questionnaire->id }}" disabled="{{ !Gate::allows('delete-questionnaires', Auth::user() ?? null) ? 'disabled' : ''}}"></x-buttons.icon-modal>
                                    </form>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    {{ __('No Questionnaires Available.') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>{{ $questionnaires->onEachSide(2)->links() }}</div>

        <div class="d-inline-block">
            <a href="/dashboard" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>

        @if(Gate::allows('visibility', ['create', 'questionnaires']))<x-buttons.add-modal :target='"#add-questionnaire-modal"' :label='__("New Questionnaire")' :color='"primary"' :tooltip='!Gate::allows("create-questionnaires") ? __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Questionnaire")]) : ""' :disabled='!Gate::allows("create-questionnaires")'></x-buttons.add-modal>@endif

        <form action="" method="post" class="d-inline-block">
            @method('PUT')
            @csrf
            <x-scripts.sortable-list :handle='true'></x-scripts.sortable-list>
            <button formaction="/questionnaires/reorder" class="btn btn-primary" id="save-order-button" disabled>{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
        </form>

    </div>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
        @if(Gate::allows('visibility', ['create', 'questionnaires']))
            <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
                <x-buttons.round-icon-toggle-modal :target='"#add-questionnaire-modal"' :icon='"plus-circle"' :color='"questionnaires"' :tooltip='Gate::allows("create-questionnaires") ? __("New Questionnaire") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Questionnaires")])' :disabled='!Gate::allows("create-questionnaires")'></x-buttons.round-icon-toggle-modal>
            </div>
        @endif
    </div>

    @foreach($questionnaires as $questionnaire)
        <x-modals.show-questionnaire :questionnaire='$questionnaire'></x-modals.show-questionnaire>
    @endforeach

    <x-modals.select-icon :icons='$icons'></x-modals.select-icon>
    <x-modals.select-color :colors='$colors'></x-modals.select-color>

    @if(Gate::allows("create-questionnaires"))<x-modals.add-questionnaire></x-modals.add-questionnaire>@endif
    <x-modals.confirm-delete section="questionnaires" target="{{ __('Questionnaire') }}" object="%name" message="By clicking the button :pre:button:post, :target :object and:pre all of its questions:post will be irrevocably deleted."></x-modals.confirm-delete>

@endsection
