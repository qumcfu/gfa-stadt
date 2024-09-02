<div class="row g-3" id="form-appraisal">
    <div class="col-8">
        <div class="form-floating input-group has-validation">
            <textarea name="content[text]" id="appraisal-question" type="text"
                      class="form-control @error('content.text') is-invalid @enderror"
                      placeholder="{{ __('Question') }}" required>{{ old('content.text') ?? $content['text'] ?? '' }}</textarea>
            @error('content.text')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="appraisal-question">{{ __('Question') }}</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <textarea name="content[short]" id="appraisal-question-short" type="text" class="form-control"
                      placeholder="{{ __('Subject Area') }}" required>{{ old('content.short') ?? $content['short'] ?? '' }}</textarea>
            <label for="appraisal-question-short">{{ __('Subject Area') }}</label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <textarea name="content[info]" id="appraisal-info-body" type="text" class="form-control"
                      placeholder="{{ __('Additional Information') }}" style="height: 170px;">{{ old('content.info') ?? $content['info'] ?? '' }}</textarea>
            <label for="appraisal-info-body">{{ __('Additional Information') }}</label>
        </div>
    </div>
</div>
