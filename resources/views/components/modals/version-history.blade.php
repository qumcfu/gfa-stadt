<div class="modal fade" id="version-history-modal" tabindex="-1" aria-labelledby="version-history-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary text-wrap">
                <h5 class="modal-title" id="version-history-modal-label">{{ __('Version History') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @foreach(config('version.history') as $entry)
                    <h6><b>{{ ($entry['version'] ?? __('Unknown version')) }}</b> ({{ ($entry['release'] ?? __('Unknown release date')) }})</h6>
                    <ul>
                        @foreach($entry['updates'] as $update)
                            <li>{!! $update !!}</li>
                        @endforeach
                    </ul>
                @endforeach

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
