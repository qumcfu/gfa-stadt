<div class="row g-2" id="file-form-{{ $file['id'] ?? 0 }}">

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <input name="files[{{ $file['id'] ?? 0 }}][name]" id="file-name-{{ $file['id'] ?? 0 }}" type="text" class="form-control @error('files.' . ($file['id'] ?? 0) . '.name') is-invalid @enderror" required
                   value="{{ old('files.' . ($file['id'] ?? 0) . '.name') ?? $file['name'] ?? '' }}" placeholder="{{ __('Name') }}">
            @error('files.' . ($file['id'] ?? 0) . '.name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="file-name-{{ $file['id'] ?? 0 }}">{{ __('Name') }}</label>
        </div>
    </div>

    <div class="col-9">
        <div class="form-floating input-group has-validation">
            <select name="files[{{ $file['id'] ?? 0 }}][project_id]" id="file-project-{{ $file['id'] ?? 0 }}" class="form-control" @if(isset($file)) disabled="disabled" @endif>
                @if(isset($file))
                    <option value="{{ $file['project']['id'] }}" selected>{{ $file['project']['name'] }}</option>
                @else
                    @forelse($projects as $project)
                        <option value="{{ $project['id'] }}" @if(count($projects) === 1) hidden @endif {{ $project['id'] === (old('files.' . ($file['id'] ?? 0) .'.project_id') ?? $file['project']['id'] ?? 0) ? 'selected' : '' }}>{{ __($project['name']) }}</option>
                    @empty
                        <option value="{{ null }}" selected disabled>{{ __('No :things Available.', ['things' => __('Projects')]) }}</option>
                    @endforelse
                @endif
            </select>
            <label for="file-project-{{ $file['id'] ?? 0 }}">{{ __('Associated Project') }}</label>
        </div>
    </div>

    @if(isset($file))<input name="files[{{ $file['id'] ?? 0 }}][project_id]" type="hidden" value="{{ $file['project']['id'] ?? 0 }}">@endif

    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <select name="files[{{ $file['id'] ?? 0 }}][is_global]" id="file-global-{{ $file['id'] ?? 0 }}" class="form-control" required>
                <option value="1" {{ 1 === (old('files.' . ($file['id'] ?? 0) .'.is_global') ?? $file['is_global'] ?? 0) ? 'selected' : '' }}>{{ __('Yes') }}</option>
                <option value="0" {{ 1 !== (old('files.' . ($file['id'] ?? 0) .'.is_global') ?? $file['is_global'] ?? 0) ? 'selected' : '' }}>{{ __('No') }}</option>
            </select>
            <label for="file-project-{{ $file['id'] ?? 0 }}">{{ __('Global') }}</label>
        </div>
    </div>

    <div class="col-12">
        <input name="files[{{ $file['id'] ?? 0 }}][file]" type="file" class="file-input form-control {{ !isset($file) ? 'required' : '' }}"
        accept=".jpg,.jpeg,.bmp,.png,.gif,.svg,.mp3,.m4a,.wav,.mp4,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip,.rar" data-id="{{ $file['id'] ?? 0 }}">
    </div>

    <div class="col-12">

        <div class="text-center mt-2" id="image-preview-{{ $file['id'] ?? 0 }}" @if(strlen($file['path'] ?? '') === 0 || ($file['type']['shortname'] ?? '') !== 'image') hidden @endif>
            <img class="w-100 rounded img-thumbnail" id="preview-image-{{ $file['id'] ?? 0 }}" src="{{ strlen($file['path'] ?? '') > 0 ? Storage::url($file['path']) : '' }}">
        </div>

    </div>

</div>
