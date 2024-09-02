<div class="modal fade" id="show-script-modal-{{ $script['id'] }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="position-absolute btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: 1em; right: 1em;"></button>

                <div class="row g-2">

                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <tbody>
                            <tr>
                                <th class="text-end">{{ __('Name') }}</th>
                                <td>{{ $script['name'] ?? '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Created') }}</th>
                                <td>{{ $script['created_at'] != null ? (__('on :date at :time', ['date' => $script['created_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $script['created_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($script['author']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Updated') }}</th>
                                <td>{{ ($script['updated_at'] != null && $script['updated_at'] != $script['created_at']) ? (__('on :date at :time', ['date' => $script['updated_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $script['updated_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($script['editor']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 mt-3">
                        <pre class="mb-1">{{ $script['code'] }}</pre>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
