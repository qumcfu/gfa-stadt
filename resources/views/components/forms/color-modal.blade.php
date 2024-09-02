<div class="row gx-2 gy-2" id="form-colors">

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <input name="color[{{ $color['id'] }}][name]" id="color-name-{{ $color['id'] ?? 0 }}" type="text" class="form-control @error('color.' . ($color['id'] ?? 0) . '.name') is-invalid @enderror" required
                   value="{{ old('color.' . ($color['id'] ?? 0) . '.name') ?? $color['name'] ?? '' }}" placeholder="{{ __('Name') }}" autocomplete="off" @if(!$color['customizable']) disabled @endif>
            @error('color.' . ($color['id'] ?? 0) . '.name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="color-name-{{ $color['id'] ?? 0 }}" class="form-label">{{ __('Name') }}</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input name="color[{{ $color['id'] }}][hex]" id="color-hex-{{ $color['id'] ?? 0 }}" type="text" class="color-hex-input form-control @error('color.' . ($color['id'] ?? 0) . '.hex') is-invalid @enderror" required
                   value="{{ old('color.' . ($color['id'] ?? 0) . '.hex') ?? $color['hex'] ?? '' }}" placeholder="{{ __('Hex') }}" autocomplete="off" data-id="{{ $color['id'] }}" @if(!$color['customizable']) disabled @endif>
            @error('color.' . ($color['id'] ?? 0) . '.hex')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="color-hex-{{ $color['id'] ?? 0 }}" class="form-label">{{ __('Hex') }}</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <select name="color[{{ $color['id'] }}][category]" type="text" id="color-category-{{ $color['id'] }}" class="form-control" required>
                <option value="red" {{ 'red' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Red') }}</option>
                <option value="pink" {{ 'pink' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Pink') }}</option>
                <option value="orange" {{ 'orange' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Orange') }}</option>
                <option value="yellow" {{ 'yellow' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Yellow') }}</option>
                <option value="purple" {{ 'purple' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Purple') }}</option>
                <option value="green" {{ 'green' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Green') }}</option>
                <option value="blue" {{ 'blue' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Blue') }}</option>
                <option value="brown" {{ 'brown' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Brown') }}</option>
                <option value="white" {{ 'white' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('White') }}</option>
                <option value="gray" {{ 'gray' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Gray') }}</option>
                <option value="fhe" {{ 'fhe' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('FH Erfurt') }}</option>
                <option value="custom" {{ 'custom' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Custom') }}</option>
                <option value="bootstrap" {{ 'bootstrap' === (old('color.' . $color["id"] . '.category') ?? $color['category'] ?? '') ? 'selected' : '' }}>{{ __('Bootstrap') }}</option>
            </select>
            <label for="color-category-{{ $color['id'] }}">{{ __('Category') }}</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <select name="color[{{ $color['id'] }}][is_bright]" type="text" id="color-is-bright-{{ $color['id'] }}" class="form-control">
                <option value="{{ null }}" {{ null == (old('color.' . $color["id"] . '.is_bright') ?? $color['is_bright'] ?? '') ? 'selected' : '' }}>{{ __('Auto') }}</option>
                <option value="{{ 1 }}" {{ 1 == (old('color.' . $color["id"] . '.is_bright') ?? $color['is_bright'] ?? '') ? 'selected' : '' }}>{{ __('Bright') }}</option>
                <option value="{{ 0 }}" {{ 0 == (old('color.' . $color["id"] . '.is_bright') ?? $color['is_bright'] ?? '') ? 'selected' : '' }}>{{ __('Dark') }}</option>
            </select>
            <label for="color-is-bright-{{ $color['id'] }}">{{ __('Brightness') }}</label>
        </div>
    </div>

</div>
