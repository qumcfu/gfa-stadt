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
    {{ Breadcrumbs::render('scripts') }}
@endsection

@section('content')

    <div class="row g-3">
        <div class="col-12">

            <h4 class="mb-4 color-heading bg-scripts">{{ __('Scripts') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100 mb-2" id="script-table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-end">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Code') }}</th>
                        <th scope="col">{{ __('Info') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($scripts as $script)
                        <tr class="sortable-item" id="{{ $script->id }}">
                            <td class="text-end text-nowrap">{{ $script->order_id ?? -1 }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $script->id'></x-icons.tooltip-icon></td>
                            <td><span class="text-button" data-bs-toggle="modal" data-bs-target="#show-script-modal-{{ $script['id'] ?? 0 }}">{{ $script['name'] ?? __('Unknown Script') }}</span></td>
                            <td><pre class="mb-0">{{ $script->getCodePreview() }}</pre></td>
                            <td class="text-nowrap">
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip="__('Created by :author at :time.', ['author' => $script->author->username ?? __('Unknown User'), 'time' => $script->created_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @if($script->editor != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip="__('Last edited by :editor at :time.', ['editor' => $script->editor->username ?? __('Unknown User'), 'time' => $script->updated_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @endif</td>
                            <td class="text-nowrap">
                                <form action="" method="get" class="d-inline-block">

                                    @if(Gate::allows('visibility', ['edit', 'scripts']))<x-buttons.icon :action='"/scripts/edit/" . $script->id' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-scripts") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Scripts")])' :disabled='!Gate::allows("edit-scripts")'></x-buttons.icon>@endif
                                    @if(Gate::allows('visibility', ['create', 'scripts']))<x-buttons.icon :action='"/scripts/create/" . (($script->order_id ?? 0) + 1)' :icon='"plus-circle-fill"' :color='"success"' :tooltip='Gate::allows("create-scripts") ? __("Insert Script Below") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Scripts")])' :disabled='!Gate::allows("create-scripts")'></x-buttons.icon>@endif
                                    <span class="sortable-handle"><x-icons.tooltip-icon :actAsButton='true' :isHandle='true' :icon='"arrows-expand"' :color='"dark"' :tooltip="__('Reorder')"></x-icons.tooltip-icon></span>
                                    @if(Gate::allows('visibility', ['delete', 'scripts']))<x-buttons.icon-delete-modal :target='"#delete-script-modal"' :icon='"trash-fill"' :color='"danger"' :tooltip='Gate::allows("delete-scripts") ? __("Delete") : __("You do not have the permission to :action :target.", ["action" => __("delete"), "target" => __("Scripts")])' :id='$script->id' :scriptName='$script["name"]' :disabled='!Gate::allows("delete-scripts")'></x-buttons.icon-delete-modal>@endif

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                {{ __('No scripts available.') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div>{{ $scripts->onEachSide(2)->links() }}</div>

        </div>
    </div>

    <form action="" method="post" class="d-inline-block">
        @method('PUT')
        @csrf
        <x-scripts.sortable-list :handle='true'></x-scripts.sortable-list>

        <button formaction="/scripts/reorder" class="btn btn-primary" id="save-order-button" disabled>{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
    </form>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
        @if(Gate::allows('visibility', ['create', 'scripts']))
            <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
                <x-buttons.round-icon-open-page :target='"/scripts/create"' :icon='"plus-circle"' :color='"scripts"' :tooltip='Gate::allows("create-scripts") ? __("New Script") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Scripts")])' :disabled='!Gate::allows("create-scripts")'></x-buttons.round-icon-open-page>
            </div>
        @endif
    </div>

    @foreach($scripts as $script)
        <x-modals.show-script :script='$script'></x-modals.show-script>
    @endforeach

    @if(Gate::allows("delete-scripts"))<x-modals.delete-script></x-modals.delete-script>@endif

@endsection
