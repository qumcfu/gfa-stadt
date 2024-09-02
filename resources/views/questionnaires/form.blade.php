@csrf

<div class="row g-3 mb-3">

    <div class="col-12">
        <label for="name" class="form-label">{{ __('Title') }}</label>
        <div class="input-group has-validation">
            <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" required
                   value="{{ old('name') ?? $questionnaire->name }}" placeholder="{{ __('Enter Title') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <div class="input-group has-validation">
            <textarea name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                      placeholder="{{ __('Enter Description') }}">{{ old('description') ?? $questionnaire->description }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <input name="order" id="order" type="hidden" value="">

</div>
