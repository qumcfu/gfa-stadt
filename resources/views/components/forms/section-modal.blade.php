<div class="row g-2">
    <div class="col-12">
        <div class="form-floating input-group has-validation">
                <textarea name="section[{{ $section['id'] ?? 0 }}][description]" id="section-description-{{ $section['id'] ?? 0 }}" type="text" class="form-control @error('section.' . ($section['id'] ?? 0) . '.description') is-invalid @enderror"
                          placeholder="{{ __('Description') }}" style="height: 110px;">{{ old('section.' . ($section['id'] ?? 0) . '.description') ?? $section['description'] ?? '' }}</textarea>
            @error('section.' . ($section['id'] ?? 0) . '.description')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="sections-description-{{ $section['id'] ?? 0 }}" class="form-label">{{ __('Description') }}</label>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-12 mt-3">
        <span class="me-1" id="icon-button-{{ $section['id'] ?? 0 }}"><x-buttons.toggle-modal :target='"#select-icon-modal"' :icon='$section["icon"]["name"] ?? "question-circle"' :color='"outline-dark"' :orderId='$section["order_id"] ?? null' :currentId='$section["icon"]["id"] ?? 0' :origin='$origin'>{{ __('Icon') }}</x-buttons.toggle-modal></span>
        <span id="color-button-{{ $section['id'] ?? 0 }}"><x-buttons.toggle-modal :target='"#select-color-modal"' :icon='"circle-fill"' :iconHtmlColor='$section["color"]["hex"] ?? "dimgray"' :color='"outline-dark"' :orderId='$questionnaire["order_id"] ?? null' :currentId='$section["color"]["id"] ?? 0' :origin='$origin'>{{ __('Color') }}</x-buttons.toggle-modal></span>

        <input name="section[{{ $section['id'] ?? 0 }}][icon_id]" id="section-icon-{{ $section['id'] ?? 0 }}" type="hidden" class="form-control @error('section.' . ($section['id'] ?? 0) . '.icon_id') is-invalid @enderror" required
               value="{{ old('section.' . ($section['id'] ?? 0) . '.icon_id') ?? $section['icon']['id'] ?? 1 }}" placeholder="{{ __('Icon') }}">
        @error('section.' . ($section['id'] ?? 0) . '.icon_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input name="section[{{ $section['id'] ?? 0 }}][color_id]" id="section-color-{{ $section['id'] ?? 0 }}" type="hidden" class="form-control @error('section.' . ($section['id'] ?? 0) . '.color_id') is-invalid @enderror" required
               value="{{ old('section.' . ($section['id'] ?? 0) . '.color_id') ?? $section['color']['id'] ?? 1 }}" placeholder="{{ __('Color') }}">
        @error('section.' . ($section['id'] ?? 0) . '.color_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
