<div class="row g-2">
    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <input name="questionnaire[{{ $questionnaire['id'] ?? 0 }}][name]" id="questionnaire-name-{{ $questionnaire['id'] ?? 0 }}" type="text" class="form-control @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.name') is-invalid @enderror" required
                   value="{{ old('questionnaire.' . ($questionnaire['id'] ?? 0) . '.name') ?? $questionnaire['name'] ?? '' }}" placeholder="{{ __('Questionnaire Title') }}">
            @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="questionnaire-name-{{ $questionnaire['id'] ?? 0 }}" class="form-label">{{ __('Questionnaire Title') }}</label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
                <textarea name="questionnaire[{{ $questionnaire['id'] ?? 0 }}][description]" id="questionnaire-description-{{ $questionnaire['id'] ?? 0 }}" type="text" class="form-control @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.description') is-invalid @enderror"
                          placeholder="{{ __('Description') }}" style="height: 110px;">{{ old('questionnaire.' . ($questionnaire['id'] ?? 0) . '.description') ?? $questionnaire['description'] ?? '' }}</textarea>
            @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.description')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="questionnaire-description-{{ $questionnaire['id'] ?? 0 }}" class="form-label">{{ __('Description') }}</label>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-12 mt-3">
        <span class="me-1" id="icon-button-{{ $questionnaire['id'] ?? 0 }}"><x-buttons.toggle-modal :target='"#select-icon-modal"' :icon='$questionnaire["icon"]["name"] ?? "question-circle"' :color='"outline-dark"' :orderId='$questionnaire["order_id"] ?? null' :currentId='$questionnaire["icon"]["id"] ?? 0' :origin='$origin'>{{ __('Icon') }}</x-buttons.toggle-modal></span>
        <span id="color-button-{{ $questionnaire['id'] ?? 0 }}"><x-buttons.toggle-modal :target='"#select-color-modal"' :icon='"circle-fill"' :iconHtmlColor='$questionnaire["color"]["hex"] ?? "dimgray"' :color='"outline-dark"' :orderId='$questionnaire["order_id"] ?? null' :currentId='$questionnaire["color"]["id"] ?? 0' :origin='$origin'>{{ __('Color') }}</x-buttons.toggle-modal></span>

        <input name="questionnaire[{{ $questionnaire['id'] ?? 0 }}][icon_id]" id="questionnaire-icon-{{ $questionnaire['id'] ?? 0 }}" type="hidden" class="form-control @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.icon_id') is-invalid @enderror" required
               value="{{ old('questionnaire.' . ($questionnaire['id'] ?? 0) . '.icon_id') ?? $questionnaire['icon']['id'] ?? 1 }}" placeholder="{{ __('Icon') }}">
        @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.icon_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input name="questionnaire[{{ $questionnaire['id'] ?? 0 }}][color_id]" id="questionnaire-color-{{ $questionnaire['id'] ?? 0 }}" type="hidden" class="form-control @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.color_id') is-invalid @enderror" required
               value="{{ old('questionnaire.' . ($questionnaire['id'] ?? 0) . '.color_id') ?? $questionnaire['color']['id'] ?? 1 }}" placeholder="{{ __('Color') }}">
        @error('questionnaire.' . ($questionnaire['id'] ?? 0) . '.color_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
