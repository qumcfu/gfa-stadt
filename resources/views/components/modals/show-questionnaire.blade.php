<div class="modal fade" id="show-questionnaire-modal-{{ $questionnaire['id'] }}" tabindex="-1" aria-hidden="true">
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
                                <td>{{ $questionnaire['name'] ?? '–' }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Type') }}</th>
                                <td><x-icons.tooltip-icon :icon='$questionnaire["type"]["icon"]' :color='$questionnaire["type"]["color"]' :opacity='75'></x-icons.tooltip-icon>&nbsp;{{ __($questionnaire['type']['name']) }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Contents') }}</th>
                                <td>{{ count($questionnaire['contents']) }}</td>
                            </tr>
                            <tr>
                                <th class="text-end">{{ __('Created') }}</th>
                                <td>{{ $questionnaire['created_at'] != null ? (__('on :date at :time', ['date' => $questionnaire['created_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $questionnaire['created_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($questionnaire['author']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>
                            <tr style="border-bottom: 0 solid transparent;">
                                <th class="text-end">{{ __('Updated') }}</th>
                                <td>{{ ($questionnaire['updated_at'] != null && $questionnaire['updated_at'] != $questionnaire['created_at']) ? (__('on :date at :time', ['date' => $questionnaire['updated_at']->format('d.m.Y') ?? __('unknown date'), 'time' => $questionnaire['updated_at']->format('H:i') ?? __('unknown time')]) . ' ' . __('by') . ' ' . ($questionnaire['editor']['username'] ?? __('Unknown User'))) : '–' }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100 mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="text-end">#</th>
                                <th scope="col">{{ __('Content') }}</th>
                                <th scope="col">{{ __('Related Entries') }}</th>
                                <th scope="col">{{ __('Info') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($questionnaire['contents'] as $content)
                                <tr>
                                    <td class="text-end text-nowrap">{{ $content['order_id'] }}&nbsp;<x-icons.tooltip-icon :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $content["id"]'></x-icons.tooltip-icon></td>
                                    <td><x-icons.tooltip-icon :actAsButton='false' :icon='$content["type"]["icon"]' :color='$content["type"]["color"]' :opacity='75' :tooltip='__($content["type"]["name"])'></x-icons.tooltip-icon>&nbsp;{{ $content['short'] ?? __('No Description') }}</td>
                                    <td>{{ count($content['entries']) }}</td>
                                    <td>
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip="__('Created by :author at :time.', ['author' => $content['author']['username'] ?? __('Unknown User'), 'time' => $content['created_at']->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                        @if($content['editor'] != null)
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip="__('Last edited by :editor at :time.', ['editor' => $content['editor']['username'] ?? __('Unknown User'), 'time' => $content['updated_at']->format('d.m.Y H:i:s') ?? ''])"></x-icons.tooltip-icon>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        {{ __('No :things Available.', ['things' => __('Contents')]) }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
