<div class="row g-3" id="form-screening">
    <div class="col-8">
        <div class="form-floating input-group has-validation">
            <textarea name="content[text]" id="screening-question" type="text"
                      class="form-control @error('content.text') is-invalid @enderror"
                      placeholder="{{ __('Question') }}" required>{{ old('content.text') ?? $content['text'] ?? '' }}</textarea>
            @error('content.text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="screening-question">{{ __('Question') }}</label>
        </div>
    </div>

    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <textarea name="content[short]" id="screening-question-short" type="text" class="form-control"
                      placeholder="{{ __('Subject Area') }}" required>{{ old('content.short') ?? $content['short'] ?? '' }}</textarea>
            <label for="screening-question-short">{{ __('Subject Area') }}</label>
        </div>
    </div>

    <div class="col-1">
        <div class="form-floating input-group has-validation">
            <input type="number" name="content[priority]" id="screening-question-priority" class="form-control"
                      value="{{ old('content.priority') ?? $content['priority'] ?? 3 }}" min="0" max="3" placeholder="{{ __('Priority') }}" required>
            @error('content.priority')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="screening-question-priority">{{ __('Priority') }}</label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <textarea name="content[info]" id="screening-info-body" type="text" class="form-control"
                      placeholder="{{ __('Additional Information') }}" style="height: 170px;">{{ old('content.info') ?? $content['info'] ?? '' }}</textarea>
            <label for="screening-info-body">{{ __('Additional Information') }}</label>
        </div>
    </div>
</div>
