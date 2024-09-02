<div class="row g-3 mt-1 mb-3">
    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <select name="content[type_id]" id="content-type" type="number" class="form-control @error('content.type_id') is-invalid @enderror" required>
                @foreach($contentTypes as $type)
                    @switch($type->type)
                        @case('group')
                            <option class="optionGroup" disabled>{{ __($type->name) }}</option>
                        @break
                        @default
                            <option value="{{ $type->id }}" data-bs-name="{{ $type->shortname }}" {{ $type->id == (old('content.type_id') ?? $content->type->id ?? 2) ? 'selected' : '' }}> {{ __($type->name) }} </option>
                        @break
                    @endswitch
                @endforeach
            </select>
            @error('content.type_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="content-type">{{ __('Content Type') }}</label>
        </div>
    </div>
</div>
