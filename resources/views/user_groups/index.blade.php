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
    {{ Breadcrumbs::render('user-groups') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12">
        <div class="row g-3">
            <div class="col-12">

                <h4 class="mb-4 color-heading bg-user-groups">{{ __('User Groups') }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-2" id="user-groups-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Available Sections') }}</th>
                            <th scope="col">{{ __('Created') }}</th>
                            <th scope="col">{{ __('Updated') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($groups as $group)
                            <tr @if($group->status === 'disabled') style="color:#888;" @endif>
                                <td class="text-end">{{ $group->id }}</td>
                                <td class="text-nowrap"><x-icons.tooltip-icon :icon='$group->status !== "disabled" ? "patch-check-fill" : "patch-minus-fill"' :color='$group->status !== "disabled" ? "dark" : "danger"' :opacity='$group->status !== "disabled" ? 100 : 75' :tooltip='$group->status !== "disabled" ? __("Active") : __("Inactive")'></x-icons.tooltip-icon>&nbsp;{{ __($group->name) }}</td>
                                <td>
                                    @forelse(json_decode($group->permissions, true) as $permission)
                                        @if(isset($permission['access']) && $permission['access'])
                                            <span class="badge" style="background: @if(isset($permission['color'])) {{ $permission['color'] }} @else #444 @endif;">{{ __($permission['name']) }}</span>
                                        @endif
                                    @empty
                                        {{ __('No permissions available.') }}
                                    @endforelse
                                </td>
                                <td>@if($group->created_at != null) {{ $group->created_at->format('d.m.Y H:i:s') }} @endif</td>
                                <td>@if($group->updated_at != null) {{ $group->updated_at->format('d.m.Y H:i:s') }} @endif</td>
                                <td class="px-2 py-1">

                                    <form action="" method="get" class="d-inline-flex">
                                        <div>
                                            <x-buttons.icon :action='"/user-groups/edit/" . $group->id' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("edit-user-groups") ? __("Edit") : __("You do not have the permission to :action :things.", ["action" => __("edit"), "things" => __("User Groups")])' :disabled='!Gate::allows("edit-user-groups")'></x-buttons.icon>
                                        </div>
                                    </form>

                                    <form action="" method="post" class="d-inline-flex">

                                        @method('PUT')
                                        @csrf

                                        @if($group->status === 'active')

                                            <x-buttons.icon :action='"/user-groups/disable/" . $group->id' :icon='"eye-fill"' :color='"success"' :tooltip='Gate::allows("disable-user-groups") ? __("Disable") : __("You do not have the permission to :action :things.", ["action" => __("disable"), "things" => __("User Groups")])' :disabled='!Gate::allows("disable-user-groups")'></x-buttons.icon>

                                        @elseif($group->status === 'disabled')

                                            <x-buttons.icon :action='"/user-groups/enable/" . $group->id' :icon='"eye-slash-fill"' :color='"secondary"' :tooltip='Gate::allows("disable-user-groups") ? __("Enable") : __("You do not have the permission to :action :things.", ["action" => __("enable"), "things" => __("User Groups")])' :disabled='!Gate::allows("disable-user-groups")'></x-buttons.icon>

                                        @elseif($group->status === 'hidden')

                                            <x-buttons.icon :icon='"eye-fill"' :color='"success"' :tooltip='__("You cannot :action this user group.", ["action" => __("disable")])' :disabled='true'></x-buttons.icon>

                                        @endif

                                    </form>

                                    <x-buttons.icon-modal icon="trash-fill" color="danger" tooltip="{{ !Auth::user()->hasPermission('user-groups', 'delete') ? __('You do not have the permission to :action user groups.', ['action' => __('delete')]) : ($group->shortname === 'admin' ? __('You cannot :action this user group.', ['action' => __('delete')]) : __('Delete')) }}" target="#deleteModal" name="{{ $group->name }}" id="{{ $group->id }}" disabled="{{ !Auth::user()->hasPermission('user-groups', 'delete') || $group->shortname === 'admin' ? 'disabled' : ''}}"></x-buttons.icon-modal>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    {{ __('No User Groups Defined.') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div>{{ $groups->onEachSide(2)->links() }}</div>

    <form action="/user-groups/create" method="get">
        <div class="mt-2">
            <a href="/dashboard" class="btn btn-secondary">{{ __('Back') }}</a>
            <x-utility.tooltip tooltip="{{ !Auth::user()->hasPermission('user-groups', 'create') ? __('You do not have the permission to :action user groups.', ['action' => __('create')]) : '' }}">
                <button class="btn btn-primary"  @if(!Auth::user()->hasPermission('user-groups', 'create')) disabled @endif>
                    {{ __('New User Group') }}
                </button>
            </x-utility.tooltip>
        </div>
    </form>

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    <x-modals.confirm-delete section="user-groups" target="{{ __('User Group') }}" object="%name"></x-modals.confirm-delete>

@endsection
