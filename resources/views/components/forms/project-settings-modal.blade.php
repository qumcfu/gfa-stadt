<div class="row g-2">

    <h5 class="color-heading" style="background-color: var(--bs-primary-bg-subtle);">{{ __('Screening') }}</h5>
    <p class="text-wrap mb-1">
        {{ __('Define what average scores (calculated from the assessment of all participants) an item must achieve in order to be highlighted in the screening report and recommended for adoption into the appraisal phase.') }}
    </p>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][mean_positive_th]"
                type="text"
                class="form-control @error('settings.' . $settings['id'] . '.mean_positive_th' ) is-invalid @enderror"
                id="mean-positive-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.mean_positive_th') ?? $settings['mean_positive_th'] ?? 1.0 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.mean_positive_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="mean-positive-threshold-{{ $settings['id'] }}">{{ __('Positive Effects') }} (&#8709;)</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][mean_negative_th]"
                type="text"
                class="form-control @error('settings.' . $settings['id'] . '.mean_negative_th' ) is-invalid @enderror"
                id="mean-negative-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.mean_negative_th') ?? $settings['mean_negative_th'] ?? 1.0 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.mean_negative_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="mean-negative-threshold-{{ $settings['id'] }}">{{ __('Negative Effects') }} (&#8709;)</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][mean_potential_th]"
                type="text"
                class="form-control @error('settings.' . $settings['id'] . '.mean_potential_th' ) is-invalid @enderror"
                id="mean-potential-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.mean_potential_th') ?? $settings['mean_potential_th'] ?? 1.0 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.mean_potential_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="mean-potential-threshold-{{ $settings['id'] }}">{{ __('Potential for improvement') }} (&#8709;)</label>
        </div>
    </div>

    <p class="text-wrap mt-3 mb-1">
        {{ __('Define thresholds for the highest individual scores in each case to include the point regardless of the average score.') }}
    </p>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][max_positive_th]"
                type="number"
                class="form-control @error('settings.' . $settings['id'] . '.max_positive_th' ) is-invalid @enderror"
                id="max-positive-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.max_positive_th') ?? $settings['max_positive_th'] ?? 1 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.max_positive_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="max-positive-threshold-{{ $settings['id'] }}">{{ __('Positive Effects') }} (max)</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][max_negative_th]"
                type="number"
                class="form-control @error('settings.' . $settings['id'] . '.max_negative_th' ) is-invalid @enderror"
                id="max-negative-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.max_negative_th') ?? $settings['max_negative_th'] ?? 1 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.max_negative_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="max-negative-threshold-{{ $settings['id'] }}">{{ __('Negative Effects') }} (max)</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][max_potential_th]"
                type="number"
                class="form-control @error('settings.' . $settings['id'] . '.max_potential_th' ) is-invalid @enderror"
                id="max-potential-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.max_potential_th') ?? $settings['max_potential_th'] ?? 1 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.max_potential_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="max-potential-threshold-{{ $settings['id'] }}">{{ __('Potential for improvement') }} (max)</label>
        </div>
    </div>

    <p class="text-wrap mt-3 mb-1">
        {{ __('Determine the minimum number of conditions defined above that must be met in order to recommend that the appropriate item be included in the appraisal phase.') }}
    </p>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <select name="settings[{{ $settings['id'] }}][min_met_conditions]" id="conditions-{{ $settings['id'] }}" class="form-control" required>
                @for($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}" {{ (old('settings.' . $settings['id'] . '.min_met_conditions') ?? $settings['min_met_conditions']) === $i ? 'selected' : '' }}> {{ $i }} </option>
                @endfor
            </select>
            <label for="conditions-{{ $settings['id'] }}">{{ __('Required fulfilled conditions') }}</label>
        </div>
    </div>

    <div class="col-6">
        <div class="form-floating input-group has-validation">
            <select name="settings[{{ $settings['id'] }}][operator]" id="operator-{{ $settings['id'] }}" class="form-control" required>
                <option value=">=" {{ (old('settings.' . $settings['id'] . '.operator') ?? $settings['operator']) === '>=' ? 'selected' : '' }}> {{ __('greater than or equal to') . ' (>=)' }} </option>
                <option value=">" {{ (old('settings.' . $settings['id'] . '.operator') ?? $settings['operator']) === '>' ? 'selected' : '' }}> {{ __('greater than') . ' (>)' }} </option>
            </select>
            <label for="operator-{{ $settings['id'] }}">{{ __('Relational Operator') }}</label>
        </div>
    </div>

    <h5 class="color-heading mt-3 d-none" style="background-color: var(--bs-success-bg-subtle);">{{ __('Appraisal') }}</h5>
    <p class="text-wrap mb-1 d-none">
        {{ __('Define from which average and maximum effect size an impact is listed in the final appraisal report. You can define these values individually for positive and negative effects.') }}
    </p>

    <div class="col-6 d-none">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][mean_pos_effects_th]"
                type="text"
                class="form-control @error('settings.' . $settings['id'] . '.mean_pos_effects_th' ) is-invalid @enderror"
                id="mean-positive-effects-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.mean_pos_effects_th') ?? $settings['mean_pos_effects_th'] ?? 1.0 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.mean_pos_effects_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="mean-positive-effects-threshold-{{ $settings['id'] }}">{{ __('Positive Effect Size') }} (&#8709;)</label>
        </div>
    </div>

    <div class="col-6 d-none">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][mean_neg_effects_th]"
                type="text"
                class="form-control @error('settings.' . $settings['id'] . '.mean_neg_effects_th' ) is-invalid @enderror"
                id="mean-negative-effects-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.mean_neg_effects_th') ?? $settings['mean_neg_effects_th'] ?? 1.0 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.mean_neg_effects_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="mean-negative-effects-threshold-{{ $settings['id'] }}">{{ __('Negative Effect Size') }} (&#8709;)</label>
        </div>
    </div>

    <div class="col-6 d-none">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][max_pos_effects_th]"
                type="number"
                class="form-control @error('settings.' . $settings['id'] . '.max_pos_effects_th' ) is-invalid @enderror"
                id="max-positive-effects-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.max_pos_effects_th') ?? $settings['max_pos_effects_th'] ?? 1 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.max_pos_effects_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="max-positive-effects-threshold-{{ $settings['id'] }}">{{ __('Positive Effect Size') }} (max)</label>
        </div>
    </div>

    <div class="col-6 d-none">
        <div class="form-floating input-group has-validation">
            <input
                name="settings[{{ $settings['id'] }}][max_neg_effects_th]"
                type="number"
                class="form-control @error('settings.' . $settings['id'] . '.max_neg_effects_th' ) is-invalid @enderror"
                id="max-negative-effects-threshold-{{ $settings['id'] }}"
                value="{{ old('settings.' . $settings['id'] . '.max_neg_effects_th') ?? $settings['max_neg_effects_th'] ?? 1 }}"
                required
            >
            @error('settings.' . $settings['id'] . '.max_neg_effects_th')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="max-negative-effects-threshold-{{ $settings['id'] }}">{{ __('Negative Effect Size') }} (max)</label>
        </div>
    </div>

</div>
