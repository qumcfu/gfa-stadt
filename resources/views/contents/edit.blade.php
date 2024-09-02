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
    {{ Breadcrumbs::render('contents.edit', $questionnaire, $content) }}
@endsection

@section('content')

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/questionnaires/edit/" . $questionnaire["id"]' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    @if(Gate::allows('create-effects'))
        <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#add-effect-modal"' :icon='"plus-circle"' :color='"questionnaires"' :tooltip='Gate::allows("create-effects") ? __("Add Effect") : __("You do not have the permission to :action :target.", ["action" => __("add"), "target" => __("Effects")])' :disabled='!Gate::allows("create-effects")'></x-buttons.round-icon-toggle-modal>
        </div>
    @endif

    <div class="col-md-7 col-lg-12 mt-2 mb-3">
        <h4 class="mb-3">{{ __('Edit Content') }}<span class="float-end">ID: {{ $content->id }}</span></h4>
        <p>@if($content->isQuestion()) {{ __('This question belongs to item “:item” of questionnaire “:questionnaire”.', ['item' => $content->item_name, 'questionnaire' => $content->questionnaire->name]) }} @endif</p>

            <form action="/questionnaires/{{ $questionnaire->id }}/contents/{{ $content->id }}" method="post" class="needs-validation" novalidate>

                @csrf
                @method('PUT')

                <div id="type-form" class="mb-3">
                    @include('contents.form_type')
                </div>

                <x-forms.content-types :content='$content ?? null' :scores='$scores ?? null' :multipliers='$multipliers ?? null' :colors='$colors ?? null' :scripts='$scripts ?? null'></x-forms.content-types>

                <input name="content[order_id]" type="hidden" value="{{ $content->order_id ?? $questionnaire->contents->count() }}">

                <div class="my-4">
                    <a href="/questionnaires/edit/{{ $questionnaire->id }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                </div>
            </form>

            @if(count($content['effects'] ?? []) > 0)
                <h4 class="">{{ __('Effects') }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-2" id="effects-table">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 15%;">{{ __('Type') }}</th>
                            <th scope="col" style="width: 15%;">{{ __('Size') }}</th>
                            <th scope="col" style="width: 10%;">{{ __('Info') }}</th>
                            <th scope="col" style="width: 10%;">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($content['effects'] as $effect)
                            <tr>
                                @php($content = $effect['content'])
                                @php($positiveSize = $effect->getPositiveSize())
                                @php($negativeSize = $effect->getNegativeSize())
                                <td><x-icons.tooltip-icon :actAsButton='true' :icon='$effect["type"]["icon"]["name"] ?? ""' :color='"dark"' :tooltip='""'></x-icons.tooltip-icon>{{ __($effect['type']['name']) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='$effect["size_y"] > 0 ? "arrow-up-circle-fill" : ($effect["size_y"] < 0 ? "arrow-down-circle-fill" : "arrow-right-circle-fill")' :color='$positiveSize > 0 ? "success" : ($positiveSize < 0 ? "danger" : "secondary")' :tooltip='$effect->getSizeTooltip("positive")'></x-icons.tooltip-icon>{{ $effect['size_y'] }}
                                        </div>
                                        <div class="col-auto">
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='$effect["size_n"] > 0 ? "arrow-up-circle-fill" : ($effect["size_n"] < 0 ? "arrow-down-circle-fill" : "arrow-right-circle-fill")' :color='$negativeSize > 0 ? "success" : ($negativeSize < 0 ? "danger" : "secondary")' :tooltip='$effect->getSizeTooltip("negative")'></x-icons.tooltip-icon>{{ $effect['size_n'] }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $effect["id"]'></x-icons.tooltip-icon>
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$effect->getCreatedAtTimestamp()'></x-icons.tooltip-icon>
                                    @if($effect['editor'] != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$effect->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td>
                                    <x-buttons.icon-edit-modal :target='"#edit-effect-modal-" . $effect["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-effects") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Effects")])' :disabled='!Gate::allows("edit-effects")'></x-buttons.icon-edit-modal>
                                    <x-buttons.icon-toggle-modal :icon='"trash-fill"' :color='"danger"' :tooltip='__("Delete")' :target='"#delete-effect-modal-" . $effect["id"]'></x-buttons.icon-toggle-modal>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    {{ __('No :things Available.', ['things' => __('Effects')]) }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

            <hr>

            <div class="mt-4">
                <h4>{{ __('Preview') }}</h4>
            </div>

            <x-previews.content-types :content='$content ?? null' :scripts='$scripts ?? null'></x-previews.content-types>

        <x-scripts.content-form></x-scripts.content-form>

        <!-- needs alert for unsaved changes -->

    </div>

    @foreach($content['effects'] as $effect)
        @if(Gate::allows('edit-effects'))
            <x-modals.edit-effect :effect='$effect' :types='$effectTypes'></x-modals.edit-effect>
        @endif
        @if(Gate::allows('delete-effects'))
            <x-modals.delete-effect :effect='$effect'></x-modals.delete-effect>
        @endif
    @endforeach

    <x-modals.add-effect :types='$effectTypes' :contentId='$content["id"]'></x-modals.add-effect>

@endsection
