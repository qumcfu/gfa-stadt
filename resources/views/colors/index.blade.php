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
    {{ Breadcrumbs::render('colors') }}
    <x-scripts.color-selection></x-scripts.color-selection>
    <x-scripts.modal-validation></x-scripts.modal-validation>
@endsection

@section('content')

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/dev"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">

            <h4 class="color-heading bg-secondary-subtle mb-4">{{ __('Colors') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col" style="width: 15%;">{{ __('Hex') }}</th>
                        <th scope="col" style="width: 15%;">{{ __('RGB') }}</th>
                        <th scope="col" style="width: 10%;">{{ __('Info') }}</th>
                        <th scope="col" style="width: 10%;">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <td><x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $color["id"]'></x-icons.tooltip-icon><x-icons.tooltip-icon :actAsButton='true' :icon='$color->isValid() ? "circle-fill" : "question-circle"' :color='"dark"' :htmlColor='$color["hex"]' :tooltip='""'></x-icons.tooltip-icon>{{ $color['name'] }}</td>
                            <td>{{ $color['hex'] }} @if(!$color->isValid())&nbsp;<x-icons.tooltip-icon :icon='"exclamation-triangle-fill"' :color='"danger"' :tooltip='"<b>" . __("Invalid value") . "</b><br>" . __("Color values must be provided in #RGB, #RGBA, #RRGGBB, or #RRGGBBAA format.")'></x-icons.tooltip-icon>@endif</td>
                            <td>{{ $color['red'] }}, {{ $color['green'] }}, {{ $color['blue'] }}@if($color['alpha'] < 255)<span class="text-danger-emphasis">, {{ $color['alpha'] }}</span>@endif</td>
                            <td>
                                @if($color["category"] === "red")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"Red"' :tooltip='__("Base Color") . ": <b>" . __("Red") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "orange")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"DarkOrange"' :tooltip='__("Base Color") . ": <b>" . __("Orange") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "yellow")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"Gold"' :tooltip='__("Base Color") . ": <b>" . __("Yellow") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "green")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"SeaGreen"' :tooltip='__("Base Color") . ": <b>" . __("Green") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "blue")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"RoyalBlue"' :tooltip='__("Base Color") . ": <b>" . __("Blue") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "purple")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"MediumPurple"' :tooltip='__("Base Color") . ": <b>" . __("Purple") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "pink")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"HotPink"' :tooltip='__("Base Color") . ": <b>" . __("Pink") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "brown")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"Sienna"' :tooltip='__("Base Color") . ": <b>" . __("Brown") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "white")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon"' :color='"dark"' :tooltip='__("Base Color") . ": <b>" . __("White") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "gray")<x-icons.tooltip-icon :actAsButton='true' :icon='"hexagon-fill"' :htmlColor='"DimGray"' :tooltip='__("Base Color") . ": <b>" . __("Gray") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "custom")<x-icons.tooltip-icon :actAsButton='true' :icon='"star-fill"' :color='"dark"' :tooltip='__("Base Color") . ": <b>" . __("Custom") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "fhe")<x-icons.tooltip-icon :actAsButton='true' :icon='"list"' :htmlColor='"#003366"' :tooltip='__("Base Color") . ": <b>" . __("FH Erfurt") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color["category"] === "bootstrap")<x-icons.tooltip-icon :actAsButton='true' :icon='"bootstrap-fill"' :color='"primary"' :tooltip='__("Base Color") . ": <b>" . __("Bootstrap") . "</b>"'></x-icons.tooltip-icon>@endif
                                @if($color['editor'] != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$color->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                                @endif
                            </td>
                            <td>
                                @if(Gate::allows('developer'))<x-buttons.icon-edit-modal :target='"#edit-color-modal-" . $color["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("developer") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Colors")])' :disabled='!Gate::allows("developer")'></x-buttons.icon-edit-modal>@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div>{{ $colors->onEachSide(2)->links() }}</div>

        </div>
    </div>

    @if(Gate::allows('developer'))
        @foreach($colors as $color)
            <x-modals.edit-color :color='$color'></x-modals.edit-color>
        @endforeach
    @endif

@endsection
