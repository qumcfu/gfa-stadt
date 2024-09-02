<div class="modal fade" id="select-icon-modal" tabindex="-1" aria-labelledby="select-icon-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="select-icon-modal-title">{{ __('Choose an Icon') }}:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="select-icon-modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <span>{{ __('With the buttons at the bottom left you can show and hide certain types of icons.') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        @foreach($icons as $key => $icon)
                            <span class="icon-parent icon-zoom @if($icon->fill) icon-fill @else icon-empty @endif">
                                <x-buttons.icon-toggle-modal :target='"UNKNOWN"' :icon='$icon["name"]' :color='"dark"' :size='1.2' :type='"icon"' :value='$icon["name"]' :id='$icon["id"]' :origin='"#select-icon-modal"' :orderId='null'></x-buttons.icon-toggle-modal>
                            </span>
                            @if(($key + 1) % 25 === 0)</div><div class="col-12 d-flex justify-content-between">@endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <div class="me-auto">
                    <button type="button" class="btn btn-sm btn-dark bi-circle me-auto" id="toggle-empty-button" onclick="toggleEmpty()"></button>
                    <button type="button" class="btn btn-sm btn-dark bi-circle-fill me-auto" id="toggle-fill-button" onclick="toggleFill()"></button>
                    <span class="text-secondary ms-2" id="icon-name"></span>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" id="select-icon-modal-back" data-bs-target="[NOT_SET]" data-bs-toggle="modal" data-origin="#select-icon-modal" data-order-id="[NOT_SET]">{{ __('Back') }}</button>
            </div>
        </div>
    </div>
</div>
