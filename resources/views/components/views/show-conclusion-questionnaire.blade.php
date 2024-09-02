<h6 class="color-heading screening-heading text-center br-round-top mt-3 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" id="questionnaire-heading-{{ $questionnaire['id'] }}" data-questionnaire-id="{{ $questionnaire['id'] }}" data-color="{{ $questionnaire['color']['hex'] }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};"><span class="text-button text-button-light" data-bs-toggle="modal" data-bs-target="#show-questionnaire-results-modal-{{ $questionnaire['id'] }}">{{ $questionnaire['name'] }}</span></h6>

@forelse($questionnaire['contents'] as $content)
    <div class="color-frame color-frame-{{ $questionnaire['id'] }} @if($content->isLast()) br-round-bottom @endif px-2 py-1" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}; background-color: {{ isset($questionnaire['color']) ? $questionnaire['color']->getTransparentColor() : '#60606020' }};">

        <div class="row gx-3">
            <div class="col-11 ps-2">
                <label class="form-check-label w-100" for="content-check-{{ $content['id'] }}">
                    @if($content->isRelevant($project))<span class="me-1"><x-icons.tooltip-icon :actAsButton='false' :icon='"bookmark-star-fill"' :htmlColor='$questionnaire["color"]["hex"] ?? "#606060"' :tooltip='__("It is recommended to take a closer look at this topic.")'></x-icons.tooltip-icon></span>@endif
                    <span>{{ $content['short'] ?? __('Unknown Content') }}</span>
                </label>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <div class="form-check">
                    <input name="conclusion[{{ $content['id'] }}]" class="form-check-input relevant-item-check questionnaire-check-{{ $questionnaire['id'] }}" type="checkbox" @if((count($project['focusedItems'] ?? []) > 0 && $content->isFocused($project)) || (count($project['focusedItems'] ?? []) === 0 && $content->isRelevant($project))) value="on" checked @endif id="content-check-{{ $content['id'] }}" data-questionnaire-id="{{ $questionnaire['id'] }}" data-content-id="{{ $content['id'] }}">
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="text-body-secondary">{{ __('This questionnaire is currently empty.') }}</div>
@endforelse

<x-modals.show-questionnaire-results :questionnaire='$questionnaire' :stageType='$stageType' :project='$project'></x-modals.show-questionnaire-results>
