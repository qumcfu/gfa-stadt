<div class="row gx-2 gy-2" id="form-effects">

    @if(count($questionnaires) > 0)
    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <select name="effects[{{ $effect['id'] ?? 0 }}][content_id]" id="effect-content-{{ $effect['id'] ?? 0 }}" class="form-control" required>
                @foreach($questionnaires as $questionnaire)
                    <option disabled>{{ $questionnaire['type']['name'] . ': ' . $questionnaire['name'] }}</option>
                    @foreach($questionnaire['contents'] as $content)
                        <option value="{{ $content['id'] }}" {{ $content['id'] == (old('effects.' . ($effect['id'] ?? 0) .'.content_id') ?? $effect['content']['id'] ?? 0) ? 'selected' : '' }}>{{ __($content['short'] ?? 'Unknown Content') }}</option>
                    @endforeach
                @endforeach
            </select>
            <label for="effect-content-{{ $effect['id'] ?? 0 }}">{{ __('Content') }}</label>
        </div>
    </div>
    @endif

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <select name="effects[{{ $effect['id'] ?? 0 }}][effect_type_id]" id="effect-type-{{ $effect['id'] ?? 0 }}" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type['id'] }}" {{ $type['id'] == (old('effects.' . ($effect['id'] ?? 0) .'.effect_type_id') ?? $effect['type']['id'] ?? 0) ? 'selected' : '' }}>{{ __($type['name']) }}</option>
                @endforeach
            </select>
            <label for="effect-type-{{ $effect['id'] ?? 0 }}">{{ __('Effect Type') }}</label>
        </div>
    </div>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <input name="effects[{{ $effect['id'] ?? 0 }}][size_y]" type="number" id="effect-size-y-{{ $effect['id'] ?? 0 }}" class="form-control"
                   placeholder="{{ __('Effect Size for :quote', ['quote' => __('yes')]) }}" value="{{ old('effects.' . ($effect['id'] ?? 0) . '.size_y') ?? $effect['size_y'] ?? '0' }}">
            <label for="effect-size-y-{{ $effect['id'] ?? 0 }}">{{ __('Effect Size for :quote', ['quote' => __(':quote', ['quote' => __('yes')])]) }}</label>
        </div>
    </div>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <input name="effects[{{ $effect['id'] ?? 0 }}][size_n]" type="number" id="effect-size-n-{{ $effect['id'] ?? 0 }}" class="form-control"
                   placeholder="{{ __('Effect Size for :quote', ['quote' => __('yes')]) }}" value="{{ old('effects.' . ($effect['id'] ?? 0) . '.size_n') ?? $effect['size_n'] ?? '0' }}">
            <label for="effect-size-n-{{ $effect['id'] ?? 0 }}">{{ __('Effect Size for :quote', ['quote' => __(':quote', ['quote' => __('no')])]) }}</label>
        </div>
    </div>

</div>
