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
    {{ Breadcrumbs::render('memberships') }}
    <x-scripts.memberships-js></x-scripts.memberships-js>
@endsection

@section('content')

    <div class="col-md-7 col-lg-12">
        <h4 class="mb-3 color-heading bg-memberships">{{ __('Memberships') }}</h4>

        <div class="row g-2">
            <div class="col-12">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-2" id="memberships-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Username') }}</th>
                            <th scope="col">{{ __('Project') }}</th>
                            <th scope="col">{{ __('Role') }}</th>
                            <th scope="col">{{ __('Info') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        @forelse($memberships as $membership)
                            <tr class="sortable-item" id="{{ $membership->id }}" data-id="{{ $membership->id ?? 0 }}">
                                <td class="text-end text-nowrap">{{ $membership->order_id ?? '?' }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $membership->id'></x-icons.tooltip-icon></td>
                                <td>&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$membership["user"]["active"] ? "person-check-fill" : "person-x-fill"' :color='$membership["user"]["active"] ? "dark" : "danger"' :opacity='$membership["user"]["active"] ? 100 : 75' :tooltip='$membership["user"]["active"] ? __("Active") : __("Inactive")'></x-icons.tooltip-icon>&thinsp;&nbsp;<span class="text-button" data-bs-toggle="modal" data-bs-target="#show-user-modal-{{ $membership['user']['id'] ?? 0 }}">{{ $membership['user']['username'] ?? __('Unknown User') }}</span></td>
                                <td><span class="text-button" data-bs-toggle="modal" data-bs-target="#show-project-modal-{{ $membership['project']['id'] ?? 0 }}">{{ $membership['project']['name'] ?? __('Unknown Project') }}</span></td>
                                <td><x-icons.tooltip-icon :actAsButton='true' :icon='$membership["role"]["icon"] ?? "patch-question"' :htmlColor='$membership["active"] ? "dimgray" : "lightcoral"' :tooltip='$membership["active"] ? __("Active Membership") : __("Inactive Membership")'></x-icons.tooltip-icon>{{ __($membership->role->name) ?? __('Unknown Role') }}</td>
                                <td>
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip="__('Created by :author at :time.', ['author' => $membership->author->username ?? __('Unknown User'), 'time' => $membership->created_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                    @if($membership->editor != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip="__('Last edited by :editor at :time.', ['editor' => $membership->editor->username ?? __('Unknown User'), 'time' => $membership->updated_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td>
                                    <x-buttons.icon-toggle-modal :icon='"info-circle-fill"' :color='"primary"' :tooltip='__("Show")' :target='"#show-membership-modal-" . $membership["id"]'></x-buttons.icon-toggle-modal>
                                    @if(Gate::allows('visibility', ['edit', 'memberships']))<x-buttons.icon-edit-modal :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-memberships") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Memberships")])' :target='"#edit-membership-modal-" . $membership->id' :disabled='!Gate::allows("edit-memberships")'></x-buttons.icon-edit-modal>@endif
                                    @if(Gate::allows('visibility', ['edit', 'memberships']))<form action="" method="post" class="d-inline-flex">@csrf @method('PUT')<x-buttons.icon :action='"/memberships/" . ($membership["active"] ? "disable" : "enable") . "/" . $membership["id"]' :icon='$membership["active"] ? "eye-fill" : "eye-slash-fill"' :color='$membership["active"] ? "success" : "secondary"' :tooltip='Gate::allows("edit-memberships") ? __($membership["active"] ? "Disable" : "Enable") : __("You do not have the permission to :action :things.", ["action" => __("edit"), "things" => __("Memberships")])' :disabled='!Gate::allows("edit-memberships")'></x-buttons.icon></form>@endif
                                    @if(Gate::allows('visibility', ['create', 'memberships']))<x-buttons.icon-add-modal :icon='"plus-circle-fill"' :color='"success"' :tooltip='Gate::allows("create-memberships") ? __("Add :thing", ["thing" => __("Membership")]) : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Memberships")])' :target='"#add-membership-modal"' :orderId='($membership->order_id ?? 0) + 1' :disabled='!Gate::allows("create-memberships")'></x-buttons.icon-add-modal>@endif
                                    <span class="sortable-handle"><x-icons.tooltip-icon :actAsButton='true' :isHandle='true' :icon='"arrows-expand"' :color='"dark"' :tooltip="__('Reorder')"></x-icons.tooltip-icon></span>
                                    @if(Gate::allows('visibility', ['delete', 'memberships']))<x-buttons.icon-delete-modal :icon='"trash-fill"' :color='"danger"' :tooltip='Gate::allows("delete-memberships") ? __("Delete") : __("You do not have the permission to :action :target.", ["action" => __("delete"), "target" => __("Memberships")])' :target='"#delete-membership-modal"' :id='$membership->id' :userName='$membership->user->username' :projectName='$membership->project->name' :disabled='!Gate::allows("delete-memberships")'></x-buttons.icon-delete-modal>@endif

                                    <x-modals.show-membership :membership='$membership'></x-modals.show-membership>
                                    @foreach($membership['stages'] as $stage)
                                        <x-modals.show-project-stage :stage='$stage'></x-modals.show-project-stage>
                                    @endforeach
                                @if(Gate::allows("edit-memberships"))<x-modals.edit-membership :membership='$membership' :projects='$projects' :users='$users' :roles='$roles'></x-modals.edit-membership>@endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    {{ __('No :things Available.', ['things' => __('Memberships')]) }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div>{{ $memberships->onEachSide(2)->links() }}</div>

    <div class="d-inline-block">
        <a href="/dashboard" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>

    <x-buttons.add-modal :target='"#add-membership-modal"' :label='__("New Membership")' :color='"primary"' :tooltip='!Gate::allows("create-memberships") ? __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Memberships")]) : ""' :disabled='!Gate::allows("create-memberships")'></x-buttons.add-modal>

    <form action="" method="post" class="d-inline-block">
        @method('PUT')
        @csrf
        <x-scripts.sortable-list :handle='true'></x-scripts.sortable-list>
        <button formaction="/memberships/reorder" class="btn btn-primary" id="save-order-button" disabled>{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
    </form>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
        @if(Gate::allows('visibility', ['create', 'memberships']))
            <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
                <x-buttons.round-icon-toggle-modal :target='"#add-membership-modal"' :icon='"plus-circle"' :color='"memberships"' :tooltip='Gate::allows("create-memberships") ? __("New Membership") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Memberships")])' :disabled='!Gate::allows("create-memberships")'></x-buttons.round-icon-toggle-modal>
            </div>
        @endif
    </div>

    @foreach($shownUsers as $user)
        <x-modals.show-user :user='$user' :activeMemberships='$user->getActiveMembershipCount()' :inactiveMemberships='$user->getInactiveMembershipCount()' :activeStages='$user->getActiveStageCount()' :inactiveStages='$user->getInactiveStageCount()'></x-modals.show-user>
    @endforeach
    @foreach($shownProjects as $project)
        <x-modals.show-project :project='$project' :activeMemberships='$project->getActiveMembershipCount()' :inactiveMemberships='$project->getInactiveMembershipCount()' :activeStages='$project->getActiveStageCount()' :inactiveStages='$project->getInactiveStageCount()'></x-modals.show-project>
    @endforeach

    @if(Gate::allows("create-memberships"))<x-modals.add-membership :projects='$projects' :users='$users' :roles='$roles'></x-modals.add-membership>@endif
    @if(Gate::allows("delete-memberships"))<x-modals.delete-membership></x-modals.delete-membership>@endif
    <x-scripts.clear-focus-modal></x-scripts.clear-focus-modal>

@endsection
