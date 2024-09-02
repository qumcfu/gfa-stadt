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
    {{ Breadcrumbs::render('memories') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ __('Memories') }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="memories-table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-end">#</th>
                            <th scope="col">{{ __('Username') }}</th>
                            <th scope="col">{{ __('Content') }} (ID)</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($memories as $key => $memory)
                            <tr>
                                <td class="text-end text-nowrap">{{ $key + 1 }}&thinsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $memory->id'></x-icons.tooltip-icon></td>
                                <td>{{ $memory->user->username }}</td>
                                <td>{{ $memory->content_id ?? __('None') }}</td>
                                <td class="p-1">
                                    <form action="" method="get" class="d-inline-block">
                                        <x-buttons.icon-delete-modal :icon='"trash-fill"' :color='"danger"' :tooltip='Gate::allows("delete-memories", Auth::user() ?? null) ? __("Delete") : __("You do not have the permission to :action :target.", ["action" => __("delete"), "target" => __("memories")])' :target='"#delete-memory-modal"' :id='$memory->id' :userName='$memory->user->username' :disabled='!Gate::allows("delete-memories", Auth::user() ?? null)'></x-buttons.icon-delete-modal>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    {{ __('No :things Available.', ['things' => __('Memories')]) }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div>
        <a href="/dashboard" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>

    <x-modals.delete-memory></x-modals.delete-memory>

@endsection
