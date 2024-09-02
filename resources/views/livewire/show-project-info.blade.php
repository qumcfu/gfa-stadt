<div>
    @php($defaultFile = $project->getDefaultFile())

    <h5 class="color-heading {{ !is_null($project['color']) && $project['color']->isBright() ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}">{{ __('Available Files') }}</h5>

    @forelse($project->getLinkedFiles() as $file)
        @php($link = $file->getLinkTo($project))
        <div class="project-info-file @if($link['default'] ?? false) fw-bold @endif" id="file-{{ $file['id'] }}">
            <span class="text-dark cursor-pointer" onclick="updatePreview({{ $file['id'] }}, '{{ $file['type']['shortname'] }}', '{{ $file->getStoragePath() }}')"><x-icons.tooltip-icon :actAsButton='true' :icon='$file["type"]["icon"]["name"]' :color='"secondary"' :tooltip='$file["type"]["name"]'></x-icons.tooltip-icon>{{ $file['name'] . '.' . $file['extension'] }}</span>
            @if($file->hasPreview())
                <x-buttons.icon-on-click :icon='"eye" . (($link["default"] ?? false) ? "-fill" : "")' :color='"primary"' :class='"preview-icon px-1 py-0"' :function='"updatePreview(" . $file["id"] . ", \"" . $file["type"]["shortname"] . "\", \"" . $file->getStoragePath() . "\")"' :tooltip='__("Preview")'></x-buttons.icon-on-click>
                <a class="btn btn-icon-primary px-1 py-0" href="{{ $file->getStoragePath() }}" target="_blank" rel="noopener noreferrer"><x-icons.tooltip-icon :actAsButton='false' :cursor='"pointer"' :icon='"fullscreen"' :color='"primary"' :tooltip='__("Open")'></x-icons.tooltip-icon></a>
            @endif
            <a class="btn btn-icon-primary px-1 py-0" href="{{ $file->getStoragePath() }}" download="{{ $file['name'] . '.' . $file['extension'] }}"><x-icons.tooltip-icon :actAsButton='false' :cursor='"pointer"' :icon='"download"' :color='"primary"' :tooltip='__("Download")'></x-icons.tooltip-icon></a>
        </div>
    @empty
        <p>{{ __('No additional information is available for this project.') }}</p>
    @endforelse

    <h5 class="color-heading my-3 {{ !is_null($project['color']) && $project['color']->isBright() ? 'text-dark' : 'text-light' }}" style="background-color: {{ $project['color']['hex'] ?? '#606060' }}">{{ __('Preview') }}</h5>

    <div class="text-center" id="media-preview" @if(is_null($defaultFile)) hidden @endif>
        <img class="rounded w-100" src="@if(!is_null($defaultFile) && $defaultFile['type']['shortname'] === 'image'){{ $defaultFile->getStoragePath() }}@endif" @if(is_null($defaultFile) || $defaultFile['type']['shortname'] !== 'image') hidden @endif>
        <embed class="w-100" src="@if(!is_null($defaultFile) && $defaultFile['type']['shortname'] === 'pdf'){{ $defaultFile->getStoragePath() }}@endif" style="height: 64em;" @if(is_null($defaultFile) || $defaultFile['type']['shortname'] !== 'pdf') hidden @endif>
        <iframe class="w-100" style="height: 432px;" src="@if(!is_null($defaultFile) && $defaultFile['type']['shortname'] === 'video'){{ $defaultFile->getStoragePath() }}@endif" @if(is_null($defaultFile) || $defaultFile['type']['shortname'] !== 'video') hidden @endif></iframe>
        <audio controls src="@if(!is_null($defaultFile) && $defaultFile['type']['shortname'] === 'audio'){{ $defaultFile->getStoragePath() }}@endif" @if(is_null($defaultFile) || $defaultFile['type']['shortname'] !== 'audio') hidden @endif></audio>
        <div class="text-body-secondary" id="unknown-file-type" hidden>{{ __('There is no preview for this file type.') }}</div>
    </div>
</div>
