<div class="row g-2">

    <div class="col-9">

        <div class="form-floating input-group has-validation">
            <input name="project[{{ $project['id'] ?? 0 }}][name]" id="project-name-{{ $project['id'] ?? 0 }}" type="text" class="form-control @error('project.' . ($project['id'] ?? 0) . '.name') is-invalid @enderror" required
                   value="{{ old('project.' . ($project['id'] ?? 0) . '.name') ?? $project['name'] ?? '' }}" placeholder="{{ __('Project Title') }}">
            @error('project.' . ($project['id'] ?? 0) . '.name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="project-name-{{ $project['id'] ?? 0 }}" class="form-label">{{ __('Project Title') }}</label>
        </div>
    </div>

    <div class="col-3">

        <div class="form-floating input-group has-validation">
            <input name="project[{{ $project['id'] ?? 0 }}][key]" id="project-enrollment-key-{{ $project['id'] ?? 0 }}" type="text" class="form-control @error('project.' . ($project['id'] ?? 0) . '.key') is-invalid @enderror" required
                   value="{{ old('project.' . ($project['id'] ?? 0) . '.key') ?? $project['enrollment_key'] ?? '' }}" placeholder="{{ __('Enrollment Key') }}">
            @error('project.' . ($project['id'] ?? 0) . '.key')
            <span class="invalid-feedback text-wrap" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="project-enrollment-key-{{ $project['id'] ?? 0 }}" class="form-label">{{ __('Enrollment Key') }}</label>
        </div>
    </div>

    <div class="row d-none" id="project-enrollment-key-warning-{{ $project['id'] ?? 0 }}">
        <div class="col-12 mt-2 text-danger text-wrap">
            <b>{{ __('Warning') }}</b>: {{ __('You are about to change the enrollment key for this project.') }} {!! __('The previous key :key will become invalid.', ['key' => __('<em>' . ($project['enrollment_key'] ?? __('Unknown')) . '</em>')]) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-wrap mt-3">
            <span id="modal-content">{{ __('What is the purpose of the project under consideration?') }}</span>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <textarea name="project[{{ $project['id'] ?? 0 }}][type]" id="project-type-{{ $project['id'] ?? 0 }}" type="text" class="form-control @error('project.' . ($project['id'] ?? 0) . '.type') is-invalid @enderror"
                      placeholder="{{ __('Project Purpose') }}" style="height: 110px;">{{ old('project.' . ($project['id'] ?? 0) . '.type') ?? $project['type'] ?? '' }}</textarea>
            @error('project.' . ($project['id'] ?? 0) . '.type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="project-type-{{ $project['id'] ?? 0 }}" class="form-label">{{ __('Project Purpose') }}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-wrap mt-3">
            <span id="modal-content">{{ __('In which phase / development stage is the project?') }}<br>
            <i>{{ __('Has a final decision already been made on the implementation of the project proposal?') }}</i><br>
            <i>{{ __('Is there sufficient time available to conduct a HIA?') }}</i></span>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <textarea name="project[{{ $project['id'] ?? 0 }}][stage]" id="project-stage-{{ $project['id'] ?? 0 }}" type="text" class="form-control @error('project.' . ($project['id'] ?? 0) . '.stage') is-invalid @enderror"
                      placeholder="{{ __('Current Stage of Project') }}" style="height: 110px;">{{ old('project.' . ($project['id'] ?? 0) . '.stage') ?? $project['stage'] ?? '' }}</textarea>
            @error('project.' . ($project['id'] ?? 0) . '.stage')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="project-stage-{{ $project['id'] ?? 0 }}" class="form-label">{{ __('Current Stage of Project') }}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-wrap mt-3">
            <span id="modal-content">{{ __('Can the planning of the project be changed based on the recommendations of the HIA?') }}</span>
        </div>
    </div>

    <div class="col-12">
        <div class="form-floating input-group has-validation">
            <textarea name="project[{{ $project['id'] ?? 0 }}][change]" id="project-change-{{ $project['id'] ?? 0 }}" type="text" class="form-control @error('project.' . ($project['id'] ?? 0) . '.change') is-invalid @enderror"
                      placeholder="{{ __('Changeability of the Planning') }}" style="height: 110px;">{{ old('project.' . ($project['id'] ?? 0) . '.change') ?? $project['change'] ?? '' }}</textarea>
            @error('project.' . ($project['id'] ?? 0) . '.change')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="project-change-{{ $project['id'] ?? 0 }}" class="form-label">{{ __('Changeability of the Planning') }}</label>
        </div>
    </div>

</div>

<div class="row g-2">
    <div class="col-12 mt-3">
        <span id="color-button-{{ $project['id'] ?? 0 }}"><x-buttons.toggle-modal :target='"#select-color-modal"' :icon='"circle-fill"' :iconHtmlColor='$project["color"]["hex"] ?? "dimgray"' :color='"outline-dark"' :orderId='$project["order_id"] ?? null' :currentId='$project["color"]["id"] ?? 0' :origin='$origin'>{{ __('Color') }}</x-buttons.toggle-modal></span>
        <input name="project[{{ $project['id'] ?? 0 }}][color_id]" id="project-color-{{ $project['id'] ?? 0 }}" type="hidden" class="form-control @error('data.' . ($project['id'] ?? 0) . '.color_id') is-invalid @enderror" required
               value="{{ old('project.' . ($project['id'] ?? 0) . '.color_id') ?? $project['color']['id'] ?? 1 }}" placeholder="{{ __('Color') }}">
        @error('data.' . ($project['id'] ?? 0) . '.color_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
