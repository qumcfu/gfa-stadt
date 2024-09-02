@if($stage != null)
    @php($entry = $stage->getEntry($content ?? null))
@endif
@php($colorCode = $content['questionnaire']['color'] ?? null)
<div class="color-frame vulnerable-group-item @if($isLast) br-round-bottom @endif p-3" data-content-id="{{ $content['id'] ?? 0 }}" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $colorCode['hex'] ?? '#606060' }}; background-image: linear-gradient(to right, {{ isset($colorCode) ? $colorCode->getTransparentColor() : '#60606020' }} 69%, #fff0 77%);">
    <div class="row gx-5">
        <div class="col-9">
            <p class="screening-question-text fw-bold my-0">
                {{ $content['text'] }}
            </p>
            <div class="row">
                <div class="col-3">
                    <div class="ps-2 mt-2 me-4">
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-positive" value="{{ 2 }}" {{ 2 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 0) * 2)) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-positive">{{ __('Yes, positively') }}</label>
                        </div>
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-negative" value="{{ 1 }}" {{ 1 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ??  $entry['negative'] ?? 0) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-negative">{{ __('Yes, negatively') }}</label>
                        </div>
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-no" value="{{ 0 }}" {{ 0 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 1) + ($entry['negative'] ?? 1)) ?? 1) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-no">{{ __('No, not affected') }}</label>
                        </div>
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-unknown" value="{{ -1 }}" {{ -2 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 1) + ($entry['negative'] ?? 1)) ?? 1) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-unknown">{{ __('Unknown') }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div id="screening-{{ $content['id'] ?? 0 }}-comments">
                        <p class="my-2">{{ __('Explanation and/or comments') }}:</p>
                        <textarea name="entries[{{ $content['id'] ?? 0 }}][comments]" class="form-control mb-1 text-input-textarea"
                                  rows="2" type="text" placeholder="{{ __('Do you wish to add anything?') }}">{{ (old('entries.' . ($content['id'] ?? 0) . '.comments') ?? $entry['comment']['text'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            @if(strlen($content['info'] ?? '') > 0)
                <p class="text-start my-0 mb-4 pe-2">
                    <span class="btn btn-link text-decoration-none p-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-{{ $content['id'] }}">{{ __('What is meant by this?') }}</span>
                </p>
            @endif
            <div>
                <h5>{{ __('Your assessment on this') }}:</h5>
            </div>
            <div class="d-flex justify-content-between pe-2" id="effects-overview-{{ $content['id'] ?? 0 }}">
                <span class="text-body-secondary">{{ __('Effects') }}</span>
                <span>
                    <i id="effects-icon-{{ $content['id'] ?? 0 }}" class="bi-question-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
                </span>
            </div>
            <div class="float-end mt-2">
                <span id="summary-{{ $content['id'] ?? 0 }}"></span>
            </div>
        </div>
    </div>
</div>
<input name="entries[{{ $content['id'] ?? 0 }}][id]" type="hidden" value="{{ $content['id'] ?? 0 }}">
