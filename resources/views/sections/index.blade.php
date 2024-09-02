@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('sections') }}
    <x-scripts.icon-selection></x-scripts.icon-selection>
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

            <h4 class="color-heading bg-secondary-subtle mb-4">{{ __('Sections') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Info') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $section["id"]'></x-icons.tooltip-icon>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$section["icon"]["name"] ?? "question-circle-fill"' :color='"dark"' :tooltip='$section["icon"]["name"] ?? __("No Icon")'></x-icons.tooltip-icon>
                                <x-icons.tooltip-icon :actAsButton='true' :icon='!is_null($section["color"] ?? null) ? "circle-fill" : "question-circle"' :color='"dark"' :htmlColor='$section["color"]["hex"]' :tooltip='$section["color"]["name"] ?? __("No Color")'></x-icons.tooltip-icon>{{ __($section['name']) }}
                            </td>
                            <td>
                                @if($section['editor'] != null)
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$section->getUpdatedAtTimestamp()'></x-icons.tooltip-icon>
                                @endif
                            </td>
                            <td>
                                @if(Gate::allows('developer'))<x-buttons.icon-edit-modal :target='"#edit-section-modal-" . $section["id"]' :icon='"pencil-fill"' :color='"primary"' :tooltip='Gate::allows("developer") ? __("Edit") : __("You do not have the permission to :action :target.", ["action" => __("edit"), "target" => __("Sections")])' :disabled='!Gate::allows("developer")'></x-buttons.icon-edit-modal>@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modals.select-icon :icons='$icons'></x-modals.select-icon>
    <x-modals.select-color :colors='$colors'></x-modals.select-color>

    @if(Gate::allows('developer'))
        @foreach($sections as $section)
            <x-modals.edit-section :section='$section'></x-modals.edit-section>
        @endforeach
    @endif

@endsection
