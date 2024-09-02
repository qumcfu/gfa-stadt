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
    {{ Breadcrumbs::render('files') }}
    <script src="{{ asset('js/files.js') }}" defer></script>
    <x-scripts.modal-validation></x-scripts.modal-validation>
    <x-scripts.clear-focus-modal></x-scripts.clear-focus-modal>
@endsection

@section('content')

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    @if(Gate::allows('visibility', ['edit', 'projects']))
        <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#add-file-modal"' :icon='"plus-circle"' :color='"maps"' :tooltip='Gate::allows("edit-projects") ? __("Add File") : __("You do not have the permission to :action :target.", ["action" => __("add"), "target" => __("Files")])' :disabled='!Gate::allows("edit-projects")'></x-buttons.round-icon-toggle-modal>
        </div>
    @endif

    <div class="row g-3">
        <div class="col-12">

            <h4 class="mb-4 color-heading bg-maps">{{ __('File Management') }}</h4>

            <table class="table table-striped table-bordered w-100 mt-3" id="media-table">
                <thead>
                <tr>
                    <th scope="col" class="text-end">#</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Associated Project') }}</th>
                    <th scope="col">{{ __('Size') }}</th>
                    <th scope="col">{{ __('Info') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($files as $file)
                    <tr>
                        <td class="text-end">
                            <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $file["id"]'></x-icons.tooltip-icon>
                        </td>
                        <td>
                            @if($file['type_id'] > 0)
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$file["type"]["icon"]["name"]' :color='"dark"' :tooltip='"<b>" . __("Type") . "</b>: " . __($file["type"]["name"]) . " (" . ($file["extension"] ?? "?") . ")"'></x-icons.tooltip-icon>
                            @else
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"patch-question-fill"' :color='"dark"' :tooltip='"<b>" . __("Type") . "</b>: " . __("Unknown")'></x-icons.tooltip-icon>
                            @endif
                            @if($file->hasPreview())
                                @if($file['type']['shortname'] === 'image')
                                    <span class="text-button" data-bs-toggle="modal" data-bs-target="#show-image-modal-{{ $file['id'] }}">{{ $file['name'] }}</span>
                                @elseif($file['type']['shortname'] === 'pdf')
                                    <span class="text-button" data-bs-toggle="modal" data-bs-target="#show-document-modal-{{ $file['id'] }}">{{ $file['name'] }}</span>
                                @elseif($file['type']['shortname'] === 'video')
                                    <span class="text-button" data-bs-toggle="modal" data-bs-target="#show-video-modal-{{ $file['id'] }}">{{ $file['name'] }}</span>
                                @elseif($file['type']['shortname'] === 'audio')
                                    <span class="text-button" data-bs-toggle="modal" data-bs-target="#play-audio-modal-{{ $file['id'] }}">{{ $file['name'] }}</span>
                              @endif
                            @else{{ $file['name'] }}@endif
                        <td>
                            <div id="associated-projects-holder-{{ $file['id'] }}">
                                <div id="associated-projects-{{ $file['id'] }}">
                                    @php($hasLink = $file->hasLinkTo($file['project']))
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"check-circle" . ($hasLink ? "-fill" : "")' :htmlColor='$file["project"]["color"]["hex"] ?? "#606060"' :tooltip='($file["project"]["name"] ?? __("Unknown Project")) . (!$hasLink ? (" (" . __("Inactive") . ")") : "")'></x-icons.tooltip-icon>
                                    @if($file['is_global'] && count($file['links'] ?? []) > 1)
                                        <span>(</span>
                                        @foreach($file['links'] as $link)
                                            @if($link['project_id'] !== $file['project_id'])
                                                <span><x-icons.tooltip-icon :actAsButton='true' :icon='"check-circle-fill"' :htmlColor='$link["project"]["color"]["hex"] ?? "#606060"' :tooltip='$link["project"]["name"] ?? __("Unknown Project")'></x-icons.tooltip-icon></span>
                                            @endif
                                        @endforeach
                                        <span>)&thinsp;</span>
                                    @endif
                                    {{ $file['project']['name'] ?? __('Unknown Project') }}
                                </div>
                            </div>
                        </td>
                        <td>{{ number_format($file['size']) }} Bytes</td>
                        <td>
                            @if($file['is_global'])
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"globe"' :color='"info-emphasis"' :tooltip='"<b>" . __("Availability") . "</b>: " . __("Global")'></x-icons.tooltip-icon>
                            @else
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"arrow-down-circle"' :color='"danger"' :tooltip='"<b>" . __("Availability") . "</b>: " . __("Local")'></x-icons.tooltip-icon>
                            @endif
                            <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$file->getCreatedAtTimestamp()'></x-icons.tooltip-icon>
                            @if($file['editor'] != null)
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$file->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                            @endif
                        </td>
                        <td>
                            <x-buttons.icon-edit-modal :icon='"pencil-fill"' :color='"primary"' :tooltip='__("Edit")' :target='"#edit-file-modal-" . $file["id"]' :id='$file["id"]'></x-buttons.icon-edit-modal>
                            <x-buttons.icon-edit-modal :icon='"share" . ($file["is_global"] ? "-fill" : "")' :color='"dark"' :tooltip='$file["is_global"] ? __("Share") : __("This file cannot be shared as it is not marked as global.")' :target='"#show-file-links-modal-" . $file["id"]' :id='$file["id"]' :disabled='!$file["is_global"]'></x-buttons.icon-edit-modal>
                            <form method="get" class="d-inline-block">
                                <x-buttons.icon-action :action='"/files/download/" . $file["id"]' :icon='"download"' :color='"success"' :tooltip='__("Download")'></x-buttons.icon-action>
                            </form>
                            <x-buttons.icon-toggle-modal :icon='"trash-fill"' :color='"danger"' :tooltip='__("Delete")' :target='"#delete-file-modal-" . $file["id"]'></x-buttons.icon-toggle-modal>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            {{ __('No :things Available.', ['things' => __('Files')]) }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

    <div>{{ $files->onEachSide(2)->links() }}</div>

    @foreach($files as $file)
        @if($file->hasPreview())
            @if($file['type']['shortname'] === 'image')<x-modals.show-image :file='$file'></x-modals.show-image>@endif
            @if($file['type']['shortname'] === 'pdf')<x-modals.show-document :file='$file'></x-modals.show-document>@endif
            @if($file['type']['shortname'] === 'video')<x-modals.show-video :file='$file'></x-modals.show-video>@endif
            @if($file['type']['shortname'] === 'audio')<x-modals.play-audio :file='$file'></x-modals.play-audio>@endif
        @endif
        <x-modals.edit-file :file='$file' :projects='$projects' :types='$types'></x-modals.edit-file>
        <x-modals.delete-file :file='$file'></x-modals.delete-file>
        <x-modals.show-file-links :file='$file'></x-modals.show-file-links>
        <x-modals.add-file-link :file='$file' :projects='$projects'></x-modals.add-file-link>
    @endforeach

    <x-modals.add-file :projects='$projects' :types='$types'></x-modals.add-file>

@endsection
