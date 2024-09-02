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
    {{ Breadcrumbs::render('projects') }}
    <x-scripts.color-selection></x-scripts.color-selection>
    <x-scripts.modal-validation></x-scripts.modal-validation>
@endsection

@section('content')

    <div class="row g-3">
        <div class="col-8 offset-2 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-12 offset-xl-0">

        <h4 class="mb-4 color-heading bg-projects">{{ __('Existing Projects') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100 mb-2" id="projects-table">
                    <thead>
                    <tr>
                        <th scope="col" class="text-end">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Info') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @forelse($projects as $project)
                        @php
                            $membership = $project->getMyMembership();
                        @endphp
                        <tr class="sortable-item" id="{{ $project->id }}" data-id="{{ $project->id ?? 0 }}">
                            <td class="text-end text-nowrap">{{ $project->order_id ?? '?' }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $project->id'></x-icons.tooltip-icon></td>
                            <td><x-icons.tooltip-icon :icon='"circle-fill"' :htmlColor='$project["color"]["hex"] ?? "#808080"' :tooltip='__("Color") . ": " . ($project["color"]["name"] ?? __("No Color"))'></x-icons.tooltip-icon>&nbsp;&thinsp;<span class="text-button" data-bs-toggle="modal" data-bs-target="#show-project-modal-{{ $project['id'] ?? 0 }}">{{ __($project['name'] ?? __('Unknown Project')) }}</span></td>
                            <td>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip="__('Created by :author at :time.', ['author' => $project->author->username ?? __('Unknown User'), 'time' => $project->created_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @if($project->editor != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip="__('Last edited by :editor at :time.', ['editor' => $project->editor->username ?? __('Unknown User'), 'time' => $project->updated_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                @if(Gate::allows('visibility', ['edit', 'projects']))<x-buttons.icon-edit-modal :target='"#edit-project-modal-" . $project["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-projects") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Projects")])' :disabled='!Gate::allows("edit-projects")'></x-buttons.icon-edit-modal>@endif
                                <form action="" method="get" class="d-inline-block">
                                    <x-buttons.icon-action :action='"/projects/memberships/" . $project["id"]' :icon='"person-circle"' :color='"dark"' :tooltip='Gate::allows("access-memberships") ? __("Manage :things", ["things" => __("Memberships")]) : __("You do not have the permission to :action :target.", ["action" => __("manage"), "target" => __("Memberships")])' :disabled='!Gate::allows("access-memberships")'></x-buttons.icon-action>
                                    <x-buttons.icon-action :action='"/projects/files/" . $project["id"]' :icon='"folder"' :color='"dark"' :tooltip='Gate::allows("access-projects") ? __("Manage :things", ["things" => __("Files")]) : __("You do not have the permission to :action :target.", ["action" => __("manage"), "target" => __("Files")])' :disabled='!Gate::allows("access-projects")'></x-buttons.icon-action>
                                </form>
                                @if(Gate::allows('visibility', ['edit', 'projects']))<x-buttons.icon-edit-modal :target='"#edit-project-settings-modal-" . $project["id"]' :icon='"gear-fill"' :color='"dark"' :tooltip='Gate::allows("edit-projects") ? __("Settings") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Project Settings")])' :disabled='!Gate::allows("edit-projects")'></x-buttons.icon-edit-modal>@endif
                                <form action="" method="get" class="d-inline-block">
                                    <x-buttons.icon-action :action='"/screening/view/" . ($membership["id"] ?? 0) . "/1"' :icon='"tv"' :color='"dark"' :tooltip='$membership != null ? __("Screening") : __("You have to be a member of this project to participate in the screening.")' :disabled='$membership == null'></x-buttons.icon-action>
                                    <x-buttons.icon-action :action='"/screening/summary/" . ($membership["id"] ?? 0)' :icon='"search"' :color='"dark"' :tooltip='$membership != null ? __("Summary") : __("You have to be a member of this project to view your screening results.")' :disabled='$membership == null'></x-buttons.icon-action>
                                    @if($membership != null && Gate::allows('view-report', $membership))<x-buttons.icon-action :action='"/screening/report/" . $project["id"]' :onClick='"showLoading()"' :icon='"journal-bookmark-fill"' :color='"dark"' :tooltip='__("Report") . " (" . __("Synopsis") . ")"' :disabled='$membership == null'></x-buttons.icon-action>@endif
                                </form>
                                <span class="sortable-handle"><x-icons.tooltip-icon :actAsButton='true' :isHandle='true' :icon='"arrows-expand"' :color='"dark"' :tooltip="__('Reorder')"></x-icons.tooltip-icon></span>
                                @if(Gate::allows('visibility', ['delete', 'projects']))<x-buttons.icon-delete-modal :target='"#delete-project-modal"' :icon='"trash-fill"' :color='"danger"' :tooltip='Gate::allows("delete-projects") ? __("Delete") : __("You do not have the permission to :action :target.", ["action" => __("delete"), "target" => __("Projects")])' :id='$project->id' :projectName='$project->name' :disabled='!Gate::allows("delete-projects")'></x-buttons.icon-delete-modal>@endif
                                @if(Gate::allows("edit-projects"))
                                    <x-modals.edit-project :project='$project'></x-modals.edit-project>
                                    <x-modals.edit-project-settings :settings='$project["settings"]'></x-modals.edit-project-settings>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                {{ __('No :things Available.', ['things' => __('Projects')]) }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>{{ $projects->onEachSide(2)->links() }}</div>

    <form action="" method="post" class="d-inline-block">
        @method('PUT')
        @csrf
        <x-scripts.sortable-list :handle='true'></x-scripts.sortable-list>
        <button formaction="/projects/reorder" class="btn btn-primary" id="save-order-button" disabled>{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
    </form>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
        @if(Gate::allows('visibility', ['create', 'projects']))
        <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-toggle-modal :target='"#add-project-modal"' :icon='"plus-circle"' :color='"projects"' :tooltip='Gate::allows("create-projects") ? __("New Project") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Projects")])' :disabled='!Gate::allows("create-projects")'></x-buttons.round-icon-toggle-modal>
        </div>
        @endif
    </div>

    @foreach($projects as $project)
        <x-modals.show-project :project='$project' :activeMemberships='$project->getActiveMembershipCount()' :inactiveMemberships='$project->getInactiveMembershipCount()' :activeStages='$project->getActiveStageCount()' :inactiveStages='$project->getInactiveStageCount()'></x-modals.show-project>
    @endforeach

    <x-modals.select-color :colors='$colors'></x-modals.select-color>

    @if(Gate::allows("create-projects"))<x-modals.add-project></x-modals.add-project>@endif
    @if(Gate::allows("delete-projects"))<x-modals.delete-project></x-modals.delete-project>@endif

@endsection
