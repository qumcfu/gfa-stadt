<div>
    <div class="row g-2 mb-2 hide-when-printing">
        <div class="col-3">
            <div class="form-floating input-group has-validation">
                <select id="health-impacts-per-questionnaire" class="form-control" wire:model.live="currentQuestionnaireId">
                    @foreach($questionnaires as $questionnaire)
                        <option value="{{ $questionnaire['id'] }}">{{ $questionnaire['name'] }}</option>
                    @endforeach
                    <option value="0">{{ __('All') }}</option>
                </select>
                <label for="health-impacts-per-questionnaire">{{ __('Key topic') }}</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-floating input-group has-validation">
                <select id="normalize-health-impact-values" class="form-control" wire:model.live="currentModeId">
                    <option value="0">{{ __('Absolute values') }}</option>
                    <option value="1">{{ __('Normalized values') }}</option>
                </select>
                <label for="normalize-health-impact-values">{{ __('Calculation mode') }}</label>
            </div>
        </div>
    </div>
</div>
