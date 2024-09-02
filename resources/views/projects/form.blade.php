@csrf

<div>
    <label for="name" class="form-label">{{ __('Project Title') }}</label>
    <div class="input-group has-validation mb-3">
        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" required
               value="{{ old('name') ?? $project->name }}" placeholder="{{ __('Project Title') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div>
    <label for="type" class="form-label">{{ __('What is the purpose of the project under consideration?') }}</label>
    <div class="input-group has-validation mb-3">
        <textarea name="type" id="type" type="text" rows="4" class="form-control @error('type') is-invalid @enderror" required
                  placeholder="{{ __('Project Purpose') }}">{{ old('type') ?? $project['type'] ?? '' }}</textarea>
        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div>
    <label for="stage" class="form-label">{{ __('In which phase / development stage is the project?') }}</label>
    <p>
        <i>{{ __('Has a final decision already been made on the implementation of the project proposal?') }}</i><br>
        <i>{{ __('Is there sufficient time available to conduct a HIA?') }}</i>
    </p>
    <div class="input-group has-validation mb-3">
        <textarea name="stage" id="stage" type="text" rows="4" class="form-control @error('stage') is-invalid @enderror" required
                  placeholder="{{ __('Current Stage of Project') }}">{{ old('stage') ?? $project['stage'] ?? '' }}</textarea>
        @error('stage')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div>
    <label for="change" class="form-label">{{ __('Can the planning of the project be changed based on the recommendations of the HIA?') }}</label>
    <div class="input-group has-validation mb-3">
        <textarea name="change" id="change" type="text" rows="4" class="form-control @error('change') is-invalid @enderror" required
                  placeholder="{{ __('Changeability of the Planning') }}">{{ old('change') ?? $project['change'] ?? '' }}</textarea>
        @error('change')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
