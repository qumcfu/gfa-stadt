@if($stage != null)
    @php($entry = $stage->getEntry($content ?? null))
@endif
@php($colorCode = $content['questionnaire']['color'] ?? null)
<div class="color-frame screening-item @if($isLast) br-round-bottom @endif p-3" data-content-id="{{ $content['id'] ?? 0 }}" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $colorCode['hex'] ?? '#606060' }}; background-image: linear-gradient(to right, {{ isset($colorCode) ? $content['questionnaire']['color']->getTransparentColor() : '#60606020' }} 69%, #fff0 77%);">
    <div class="row gx-5">
        <div class="col-9">
            <div class="row">
                <div class="col-11">
                    <p class="screening-question-text fw-bold my-0">
                        {{ $content['text'] }}
                    </p>
                </div>
                <div class="col-1">
                    <span class="float-end text-muted text-nowrap overflow-visible">
                        {{ $content->getUniqueNumber() }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="ps-2 mt-2">
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-yes" value="{{ 1 }}" {{ 1 <= (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 0) + ($entry['negative'] ?? 0)) ?? 0) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-yes">{{ __('Yes') }}</label>
                        </div>
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-no" value="{{ 0 }}" {{ 0 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 21) + ($entry['negative'] ?? 21)) ?? 42) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-no">{{ __('No, not relevant') }}</label>
                        </div>
                        <div class="form-check ps-0">
                            <input name="entries[{{ $content['id'] ?? 0 }}][impact]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-impact-unknown" value="{{ -2 }}" {{ -2 == (old('entries.' . ($content['id'] ?? 0) . '.impact') ?? (($entry['positive'] ?? 21) + ($entry['negative'] ?? 21)) ?? 42) ? 'checked' : '' }}>
                            <label for="screening-{{ $content['id'] ?? 0 }}-impact-unknown">{{ __('Unknown') }}<x-icons.tooltip-icon :actAsButton='true' :icon='"question-circle"' :color='"secondary"' :tooltip='__("No information and/or more concrete plans are currently available.")' :tooltipDirection='"right"'></x-icons.tooltip-icon></label>
                        </div>
                    </div>
                </div>
                <div class="col-12" id="screening-{{ $content['id'] ?? 0 }}-comments-only">
                    <div class="row mt-2">
                        <div class="col-12">
                            <div id="screening-{{ $content['id'] ?? 0 }}-comments-only-textarea">
                                <p class="mb-2">{{ __('Explanation and/or comments') }}:</p>
                                <textarea id="comments-only-{{ $content['id'] ?? 0 }}" name="entries[{{ $content['id'] ?? 0 }}][comments]" class="screening-comments-only form-control mb-1 text-input-textarea" data-content-id="{{ $content['id'] ?? 0 }}"
                                          rows="3" type="text" placeholder="{{ __('Do you wish to add anything?') }}">{{ (old('entries.' . ($content['id'] ?? 0) . '.comments') ?? $entry['comment']['text'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-6">
                    <div class="mt-4" id="screening-{{ $content['id'] ?? 0 }}-positive">
                        <p class="mb-1">{!! __('If the impacts have positive aspects, how important are they?') !!}</p>
                        <input name="entries[{{ $content['id'] ?? 0 }}][positive]" type="range" class="form-range w-100" min="0" max="5" step="1" id="screening-{{ $content['id'] ?? 0 }}-positive-impact" value="{{ old('entries.' . ($content->id ?? 0) . '.positive') ?? $entry['positive'] ?? 0 }}">
                        <div class="d-flex justify-content-between w-100" style="vertical-align: middle;">
                            <span><i class="bi-circle text-success" style="font-size: 0.75rem;"></i>&nbsp;&thinsp;{{ __('none') . ' / ' . __('not important') }}</span>
                            <span>{{ __('very important') }}&nbsp;&thinsp;<i class="bi-circle-fill text-success" style="font-size: 0.75rem;"></i></span>
                        </div>
                    </div>
                    <div class="mt-4" id="screening-{{ $content['id'] ?? 0 }}-negative">
                        <p class="mb-1">{!! __('If the impacts have negative aspects, how important are they?') !!}</p>
                        <input name="entries[{{ $content['id'] ?? 0 }}][negative]" type="range" class="form-range w-100" min="0" max="5" step="1" id="screening-{{ $content['id'] ?? 0 }}-negative-impact" value="{{ old('entries.' . ($content->id ?? 0) . '.negative') ?? $entry['negative'] ?? 0 }}">
                        <div class="d-flex justify-content-between w-100">
                            <span><i class="bi-circle text-danger" style="font-size: 0.75rem;"></i>&nbsp;&thinsp;{{ __('none') . ' / ' . __('not important') }}</span>
                            <span>{{ __('very important') }}&nbsp;&thinsp;<i class="bi-circle-fill text-danger" style="font-size: 0.75rem;"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="mt-4" id="screening-{{ $content['id'] ?? 0 }}-potential">
                        <p class="my-0">{!! __('Could the project\'s impacts be improved by alternative planning?') !!}</p>
                        <div class="ps-2 mt-2">
                            <div class="form-check ps-0">
                                <input name="entries[{{ $content['id'] ?? 0 }}][potential]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-potential-yes" value="{{ 1 }}" {{ 1 === (old('entries.' . ($content['id'] ?? 0) . '.potential') ?? $entry['potential'] ?? 'no-match') ? 'checked' : '' }}>
                                <label for="screening-{{ $content['id'] ?? 0 }}-potential-yes">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check ps-0">
                                <input name="entries[{{ $content['id'] ?? 0 }}][potential]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-potential-no" value="{{ 0 }}" {{ 0 === (old('entries.' . ($content['id'] ?? 0) . '.potential') ?? $entry['potential'] ?? 'no-match') ? 'checked' : '' }}>
                                <label for="screening-{{ $content['id'] ?? 0 }}-potential-no">{{ __('No') }}</label>
                            </div>
                            <div class="form-check ps-0">
                                <input name="entries[{{ $content['id'] ?? 0 }}][potential]" type="radio" class="me-2" id="screening-{{ $content['id'] ?? 0 }}-potential-unknown" value="{{ -1 }}" {{ -1 === (old('entries.' . ($content['id'] ?? 0) . '.potential') ?? $entry['potential'] ?? 'no-match') ? 'checked' : '' }}>
                                <label for="screening-{{ $content['id'] ?? 0 }}-potential-unknown">{{ __('Unknown') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4" id="screening-{{ $content['id'] ?? 0 }}-comments">
                        <p class="mt-2 mb-2">{{ __('Explanation and/or comments') }}:</p>
                        <textarea id="comments-{{ $content['id'] ?? 0 }}" name="entries[{{ $content['id'] ?? 0 }}][comments]" class="screening-comments form-control mb-1 text-input-textarea" data-content-id="{{ $content['id'] ?? 0 }}"
                                  rows="3" type="text" placeholder="{{ __('Do you wish to add anything?') }}">{{ (old('entries.' . ($content['id'] ?? 0) . '.comments') ?? $entry['comment']['text'] ?? '') }}</textarea>
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
                    <span id="formula-{{ $content['id'] ?? 0 }}">
                        <i id="positive-icon-{{ $content['id'] ?? 0 }}" class="bi-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>&nbsp;&thinsp;+&thinsp;
                        <i id="negative-icon-{{ $content['id'] ?? 0 }}" class="bi-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>&nbsp;&thinsp;=&thinsp;
                    </span>
                    <i id="effects-icon-{{ $content['id'] ?? 0 }}" class="bi-question-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
                </span>

            </div>
            <div class="d-flex justify-content-between pe-2">
                <span class="text-body-secondary" id="potential-label-{{ $content['id'] ?? 0 }}">{{ __('Potential for improvement') }}</span>
                <i id="potential-icon-{{ $content['id'] ?? 0 }}" class="bi-question-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
            </div>
            <div class="float-end mt-2">
                <span id="summary-{{ $content['id'] ?? 0 }}"></span>
            </div>
        </div>
    </div>
</div>
<input name="entries[{{ $content['id'] ?? 0 }}][id]" type="hidden" value="{{ $content['id'] ?? 0 }}">
@if(strlen($content['info'] ?? '') > 0)<x-modals.offcanvas :position='"bottom"' :heading='$content["text"] ?? ""' :contents='$content["info"] ?? ""' :id='$content["id"] ?? 0'></x-modals.offcanvas>@endif
