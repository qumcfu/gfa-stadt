<div class="modal fade" id="delete-file-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="delete-file-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="delete-file-modal-label-{{ $file['id'] }}">{{ __('Delete :thing', ['thing' => $file['name']]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><span>{{ __('You are about to delete this file.') }}</span> <span class="fw-bold">{{ __('This operation cannot be undone.') }}</span></p>
                @if(count($file['links'] ?? []) > 0)<p>{{ __('The file is currently used by the following projects:') }}</p>
                    <ul class="mb-1">
                        @foreach($file['links'] as $link)
                            <li>{{ $link['project']['name'] ?? __('Unknown Project') }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <form action="/files/delete/{{ $file['id'] }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">{{ __('Delete :target', ['target' => __('File')]) }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
