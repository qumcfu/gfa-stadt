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
    {{ Breadcrumbs::render('users') }}
    <x-scripts.modal-validation></x-scripts.modal-validation>
@endsection

@section('content')

    <div class="col-md-7 col-lg-12">
        <div class="row g-3">
            <div class="col-12">

                <h4 class="mb-4 color-heading bg-users">{{ __('User Management') }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-2" id="users-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Username') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('User Group') }}</th>
                            <th scope="col">{{ __('Info') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody id="sortable">
                        @php($currentUser = Auth::user())
                        @forelse($users as $user)
                        <tr class="sortable-item" id="{{ $user->id }}" data-id="{{ $user->id ?? 0 }}" @if($user->active == 0) style="color:#888;" @endif>
                            <td class="text-end text-nowrap">{{ $user->order_id ?? '?' }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $user->id'></x-icons.tooltip-icon></td>
                            <td>&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$user->active ? "person-check-fill" : "person-x-fill"' :color='$user->active ? "dark" : "danger"' :opacity='$user->active ? 100 : 75' :tooltip='$user->active ? __("Active") : __("Inactive")'></x-icons.tooltip-icon>&thinsp;&nbsp;<span class="text-button" data-bs-toggle="modal" data-bs-target="#show-user-modal-{{ $user['id'] ?? 0 }}">{{ $user['username'] ?? __('Unknown User') }}</span></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ __($user->group->name) }}</td>
                            <td>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip="__('Created by :author at :time.', ['author' => $user->author->username ?? __('Unknown User'), 'time' => $user->created_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @if($user->editor != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip="__('Last edited by :editor at :time.', ['editor' => $user->editor->username ?? __('Unknown User'), 'time' => $user->updated_at->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                @endif
                                @if($user['last_login'] != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"calendar-check"' :htmlColor='"dimgray"' :tooltip='__("Last logged in on :time.", ["time" => $user["last_login"]->format("d.m.Y H:i:s") ?? ""])'></x-icons.tooltip-icon>
                                @endif
                            </td>
                            <td>
                                @if(Gate::allows('visibility', ['edit', 'users']))
                                    <x-buttons.icon-edit-modal :target='"#edit-user-modal-" . $user["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-users") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Users")])' :disabled='!Gate::allows("edit-users")'></x-buttons.icon-edit-modal>
                                    <form action="" method="get" class="d-inline-flex">
                                        <x-buttons.icon :action='"/users/memberships/" . $user["id"]' :icon='"person-circle"' :color='"dark"' :tooltip='Gate::allows("access-memberships") ? __("Manage :things", ["things" => __("Memberships")]) : __("You do not have the permission to :action :target.", ["action" => __("manage"), "target" => __("Memberships")])' :disabled='!Gate::allows("access-memberships")'></x-buttons.icon>
                                    </form>
                                    <form action="" method="post" class="d-inline-flex">
                                        @method('PUT') @csrf
                                        @if(Gate::allows('developer'))
                                            @if($currentUser['impersonate_id'] !== $user['id'])
                                                <x-buttons.icon :action='"/users/impersonate/" . $user["id"]' :icon='"eyeglasses"' :color='"dark"' :tooltip='__("Impersonate :user", ["user" => $user["username"]])' :disabled='$currentUser["id"] === $user["id"]'></x-buttons.icon>
                                            @else
                                                <x-buttons.icon :action='"/users/impersonate/" . $currentUser["id"]' :icon='"slash-circle"' :color='"danger"' :tooltip='__("Stop Impersonation")'></x-buttons.icon>
                                            @endif
                                        @endif
                                        @if($user['active'])<x-buttons.icon :action='"/users/disable/" . $user["id"]' :icon='"eye-fill"' :color='"success"' :tooltip='!Gate::allows("edit-users") ? __("You do not have the permission to :action :things.", ["action" => __("disable"), "things" => __("Users")]) : ($user["id"] === $currentUser["id"] ? __("You cannot :action your own user account.", ["action" => __("disable")]) : ($user["group"]["shortname"] === "admin" ? __("You cannot :action this user.", ["action" => __("disable")]) : __("Disable")))' :disabled='!Gate::allows("edit-users") || $user["id"] === $currentUser["id"] || $user["group"]["shortname"] === "admin"'></x-buttons.icon>
                                        @else<x-buttons.icon :action='"/users/enable/" . $user["id"]' :icon='"eye-slash-fill"' :color='"secondary"' :tooltip='Gate::allows("edit-users") ? __("Enable") : __("You do not have the permission to :action :things.", ["action" => __("disable"), "things" => __("Users")])' :disabled='!Gate::allows("edit-users")'></x-buttons.icon>@endif
                                    </form>
                                @endif
                                @if(Gate::allows('visibility', ['create', 'users']))<x-buttons.icon-add-modal :icon='"plus-circle-fill"' :color='"success"' :tooltip='Gate::allows("create-users") ? __("Add :thing", ["thing" => __("User Account")]) : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Users")])' :target='"#add-user-modal"' :orderId='($user->order_id ?? 0) + 1' :disabled='!Gate::allows("create-users")'></x-buttons.icon-add-modal>@endif
                                <span class="sortable-handle"><x-icons.tooltip-icon :actAsButton='true' :isHandle='true' :icon='"arrows-expand"' :color='"dark"' :tooltip="__('Reorder')"></x-icons.tooltip-icon></span>
                                @if(Gate::allows('visibility', ['delete', 'users']))<x-buttons.icon-delete-modal :target='"#delete-user-modal"' :icon='"trash-fill"' :color='"danger"'
                                                             :tooltip='Gate::allows("delete-users") ? ($user["id"] === $currentUser["id"] ? __("You cannot :action your own user account.", ["action" => __("delete")]) : ($user["group"]["shortname"] === "admin" ? __("You cannot :action this user.", ["action" => __("delete")]) : __("Delete"))) : __("You do not have the permission to :action :target.", ["action" => __("delete"), "target" => __("Users")])'
                                                             :id='$user["id"]' :userName='$user["username"]'
                                                             :disabled='!Gate::allows("delete-users") || $user["id"] === $currentUser["id"] || $user["group"]["shortname"] === "admin"'></x-buttons.icon-delete-modal>@endif
                                @if(Gate::allows("edit-users"))<x-modals.edit-user :user='$user' :groups='$groups'></x-modals.edit-user>@endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                {{ __('No Users Available.') }}
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div>{{ $users->onEachSide(2)->links() }}</div>

    <div class="d-inline-block">
        <a href="/dashboard" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>

    @if(Gate::allows('visibility', ['create', 'users']))<x-buttons.add-modal :target='"#add-user-modal"' :label='__("New User Account")' :color='"primary"' :tooltip='!Gate::allows("create-users") ? __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Users")]) : ""' :disabled='!Gate::allows("create-users")'></x-buttons.add-modal>@endif

    <form action="" method="post" class="d-inline-block">
        @method('PUT')
        @csrf
        <x-scripts.sortable-list :handle='true'></x-scripts.sortable-list>
        <button formaction="/users/reorder" class="btn btn-primary" id="save-order-button" disabled>{{ __('Save :thing', ['thing' => __('Order')]) }}</button>
    </form>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
        @if(Gate::allows('visibility', ['create', 'users']))
            <div class="position-fixed" style="right: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
                <x-buttons.round-icon-toggle-modal :target='"#add-user-modal"' :icon='"plus-circle"' :color='"users"' :tooltip='Gate::allows("create-users") ? __("New User Account") : __("You do not have the permission to :action :target.", ["action" => __("create"), "target" => __("Users")])' :disabled='!Gate::allows("create-users")'></x-buttons.round-icon-toggle-modal>
            </div>
        @endif
    </div>

    @foreach($users as $user)
        <x-modals.show-user :user='$user' :activeMemberships='$user->getActiveMembershipCount()' :inactiveMemberships='$user->getInactiveMembershipCount()' :activeStages='$user->getActiveStageCount()' :inactiveStages='$user->getInactiveStageCount()'></x-modals.show-user>
    @endforeach

    @if(Gate::allows("create-users"))<x-modals.add-user :groups='$groups'></x-modals.add-user>@endif
    @if(Gate::allows("delete-users"))<x-modals.delete-user></x-modals.delete-user>@endif

@endsection

