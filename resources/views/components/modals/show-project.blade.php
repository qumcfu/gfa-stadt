<div class="modal fade" id="show-project-modal-{{ $project['id'] }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="position-absolute btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: 1em; right: 1em;"></button>

                <div class="row g-2">

                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <tbody>
                            <tr>
                                <th class="text-end">{{ __('Title') }}</th>
                                <td>{{ $project['name'] ?? '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Memberships') }}</th>
                                <td>{{ $activeMemberships }}@if($inactiveMemberships > 0)<span> (&thinsp;<span class="text-danger">{{ '+' . $inactiveMemberships . ' ' . __('inactive') }}</span>&thinsp;)</span>@endif</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Data Records') }}</th>
                                <td>{{ $activeStages }}@if($inactiveStages > 0)<span> (&thinsp;<span class="text-danger">{{ '+' . $inactiveStages . ' ' . __('inactive') }}</span>&thinsp;)</span>@endif</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Created') }}</th>
                                <td>{{ $project['created_at'] != null ? (__('on :date at :time', ['date' => $project['created_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $project['created_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($project['author']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            <tr style="border-bottom: 0 solid transparent;">
                                <th class="text-end">{{ __('Updated') }}</th>
                                <td>{{ ($project['updated_at'] != null && $project['updated_at'] != $project['created_at']) ? (__('on :date at :time', ['date' => $project['updated_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $project['updated_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($project['editor']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
