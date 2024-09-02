<div class="row g-3">

    <div class="col-12 mb-3">
        <div class="form-floating input-group has-validation">
            <input name="name" id="script-name" type="text"
                   class="form-control @error('name') is-invalid @enderror" required
                   value="{{ old('name') ?? $script->name ?? ''}}"
                   placeholder="{{ __('Name') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="script-name">{{ __('Name') }}</label>
        </div>
    </div>

    <div class="col-7 mb-2">
        <label for="code" class="form-label">{{ __('Code') }}</label>
        <div class="input-group has-validation">
            <textarea name="code" id="code-textarea" type="text" class="form-control" rows="20" placeholder="{{ __('Code') }}">{{ old('code') ?? $script->code ?? '' }}</textarea>
        </div>
    </div>

    <div class="col-5 pt-5">
        <h5>{{ __('Input Parameters') }}</h5>
        <p>
            {{ __('Population Size') }}: <code>population</code><br>
            {{ __('Male Residents') . ' (' . __('absolute') . ')' }}: <code>male</code><br>
            {{ __('Female Residents') . ' (' . __('absolute') . ')' }}: <code>female</code><br>
            {{ __('Number of Age Groups') }}: <code>ageGroups</code><br>
            {{ __('Age Ranges') }}: <code>ageRanges</code><br>
            {{ __('Lower and Upper Limit of :thing', ['thing' => __('Age Group') . ' 1']) }}:<br><code>ageRanges[1,1] / ageRanges[1,2]</code><br>
            {{ __('Changes in Movement') . ' (' . __('Duration in minutes per day') . ')' }}:<br><code>movement['walk', 'minutes'] / movement['bike', 'minutes']</code><br>
            {{ __('Changes in Movement') . ' (' . __('Affected Population in %') . ')' }}:<br><code>movement['walk', 'percent'] / movement['bike', 'percent']</code>
        </p>

        <h5>{{ __('Output Parameters') }}*</h5>
        <p>
            {{ __('Mortalities') }}: <code>mortality</code><br>
            {{ __('Cases of Cardiovascular Disease') }}: <code>cardio</code><br>
            {{ __('Cases of Diabetes') }}: <code>diabetes</code><br>
            {{ __('Cases of Dementia') }}: <code>dementia</code>
        </p>

        <div class="figure-caption">*{{ __('Vectors with a size of') }} <code>ageGroups</code></div>
    </div>

</div>

<input name="order_id" type="hidden" value="{{ $index ?? null }}">
