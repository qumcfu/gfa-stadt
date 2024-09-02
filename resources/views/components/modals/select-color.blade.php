<div class="modal fade" id="select-color-modal" tabindex="-1" aria-labelledby="select-color-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="select-color-modal-title">{{ __('Choose a Color') }}:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="select-color-modal-body" style="background-color: #c8c8c8;">
                <div class="row">
                    <div class="col-12 mb-2">
                        <span>{{ __('Toggle the background color by clicking on the light bulb icon at the bottom left.') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @php($previousCategory = 'none')
                        @foreach($colors as $key => $color)
                            @if($color['category'] !== $previousCategory)
                                </div><div class="col-12">
                                @php($previousCategory = $color['category'])
                            @endif
                            <span class="color-parent icon-zoom">
                                <x-buttons.icon-toggle-modal :target='"UNKNOWN"' :icon='"circle-fill"' :htmlColor='$color["hex"]' :size='1.2' :type='"color"' :name='$color["name"] ?? __("Unknown Color")' :value='$color["hex"]' :id='$color["id"]' :origin='"#select-color-modal"' :orderId='null'></x-buttons.icon-toggle-modal>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <div class="me-auto">
                    <button type="button" class="btn btn-sm btn-dark bi-lightbulb-fill" id="toggle-bg-button" onclick="toggleBackground()"></button>
                    <span class="text-secondary ms-2" id="color-name"></span>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" id="select-color-modal-back" data-bs-target="[NOT_SET]" data-bs-toggle="modal" data-origin="#select-color-modal" data-order-id="[NOT_SET]">{{ __('Back') }}</button>
            </div>

        </div>
    </div>
</div>
