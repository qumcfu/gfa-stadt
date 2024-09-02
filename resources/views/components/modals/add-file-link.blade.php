<div class="modal fade" id="add-file-link-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="add-file-link-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form name="main-form" method="post" action="/files/link/{{ $file['id'] }}">
                @csrf

                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="add-file-link-modal-label-{{ $file['id'] }}">{{ __('Add file to project') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div id="add-file-link-modal-body-holder-{{ $file['id'] }}">
                    <div class="modal-body" id="add-file-link-modal-body-{{ $file['id'] }}">

                        <p class="">
                            {{ __('To which project should the file be added?') }}
                        </p>

                        <div class="form-floating input-group has-validation">
                            <select name="links[{{ $file['id'] }}][project_id]" type="text" id="project-id-{{ $file['id'] }}" class="form-control" required>
                                @php($index = 0)
                                @foreach($projects as $project)
                                    @if(!$file->hasLinkTo($project))
                                        <option value="{{ $project['id'] }}" {{ $project['id'] === (old('links.' . $file["id"] . '.project_id') ?? 0) ? 'selected' : '' }}>{{ $project['name'] }}</option>
                                        @php($index++)
                                    @endif
                                @endforeach
                                @if($index === 0)
                                    <option disabled>{{ __('No :things Available.', ['things' => __('Projects')]) }}</option>
                                @endif
                            </select>
                            <label for="project-id-{{ $file['id'] }}">{{ __('Project') }}</label>
                        </div>

                    </div>
                </div>

                <div class="modal-footer bg-body-secondary p-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-target="#show-file-links-modal-{{ $file['id'] }}" data-bs-toggle="modal">{{ __('Back') }}</button>
                    <button class="btn btn-sm btn-primary">{{ __('Add') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
