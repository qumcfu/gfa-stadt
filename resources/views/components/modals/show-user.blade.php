<div class="modal fade" id="show-user-modal-{{ $user['id'] }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="position-absolute btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: 1em; right: 1em;"></button>

                <div class="row g-2">

                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <tbody>
                            <tr>
                                <th class="text-end">{{ __('Username') }}</th>
                                <td>{{ $user['username'] ?? '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Email') }}</th>
                                <td>{{ $user['email'] ?? '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('User Group') }}</th>
                                <td>{{ __($user['group']['name'] ?? '–') }}</td>
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
                                <td>{{ $user['created_at'] != null ? (__('on :date at :time', ['date' => $user['created_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $user['created_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($user['author']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Updated') }}</th>
                                <td>{{ ($user['updated_at'] != null && $user['updated_at'] != $user['created_at']) ? (__('on :date at :time', ['date' => $user['updated_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $user['updated_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($user['editor']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Last Login') }}</th>
                                <td>{{ $user['last_login'] != null ? $user['last_login']->format('d.m.Y H:i:s') : '–' }}</td>
                            </tr>
                            <tr style="border-bottom: 0 solid transparent;">
                                <th class="text-end">{{ __('Active') }}</th>
                                <td>@if($user['active'])<span>{{ __('Yes') }}@else<span class="text-danger">{{ __('No') }}</span>@endif</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
