@php $data = json_decode($content->data ?? '', true); @endphp

<div class="row g-3" id="form-script">

    <div class="col-8">
        <div class="form-floating input-group has-validation">
            <select name="content[size]" type="number" id="script-select" class="form-control" required>
                @forelse($scripts as $script)
                    <option value="{{ $script->id }}" {{ $script->id === (old('content.size') ?? $content->size ?? 1) ? 'selected' : '' }}>{{ $script->name }}</option>
                @empty
                    <option value="{{ 0 }}" selected disabled>{{ __('No Scripts Available.') }}</option>
                @endforelse
            </select>
            <label for="script-select">{{ __('Script') }}</label>
        </div>
    </div>

    <div class="col-4">
        <div class="form-floating input-group has-validation">
            <select name="data[mode]" type="number" id="script-mode" class="form-control" required>
                <option value="auto" {{ 'auto' === (old('data.mode') ?? $data['mode'] ?? '') ? 'selected' : '' }}>{{ __('Execute on page load') }}</option>
                <option value="manual" {{ 'manual' === (old('data.mode') ?? $data['mode'] ?? '') ? 'selected' : '' }}>{{ __('Execute manually') }}</option>
                <option value="both" {{ 'both' === (old('data.mode') ?? $data['mode'] ?? '') ? 'selected' : '' }}>{{ __('Enable both') }}</option>
            </select>
            <label for="script-mode">{{ __('Execution Mode') }}</label>
        </div>
    </div>

    <input name="content[text]" type="hidden" id="script-input" value="R">

</div>

<script>

    $( document ).ready(function() {
        updateText()
        updateButton()
    })

    $('#script-select').on('change', function() {
        updateText()
    })

    $('#script-mode').on('change', function() {
        updateButton()
    })

    function updateText() {
        $('#script-input').val('R (' + $( "#script-select option:selected" ).text() + ')')
    }

    function updateButton() {
        $('#script-button').prop('hidden', $('#script-mode').val() === 'auto')
    }

</script>
