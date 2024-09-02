<div class="row">
    <div class="col-7">
        <div class="px-2">
            <div class="row">
                <div class="col-11">
                    {{ $content['text'] ?? __('Unknown Content') }}
                </div>
                <div class="col-1">
                    <span class="float-end text-muted text-nowrap overflow-visible">
                        {{ $content->getUniqueNumber() }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row align-items-start align-content-end">

            <div class="col-auto">
                <div class="px-2">
                    <x-buttons.icon-toggle-modal :target='"#show-appraisal-item-modal-" . $content["id"]' :icon='"check-circle"' :color='"dark"' :tooltip='__("Yes")' />
                    <span class="@if($yesAnswerCount > 0){{ $yesIsPositive ? 'text-success' : 'text-danger' }}@endif mx-1 {{ $yesIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $yesAnswerCount }}
                        <span class="ms-1 {{ $yesIsMostCommonAnswer ? 'fw-bold' : 'text-muted' }}">
                            <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                            <span class="ms-1">{{ __('Yes') }}</span>
                        </span>
                    </span>
                </div>
                <div class="px-2">
                    <x-buttons.icon-toggle-modal :target='"#show-appraisal-item-modal-" . $content["id"]' :icon='"x-circle"' :color='"dark"' :tooltip='__("No")' />
                    <span class="@if($noAnswerCount > 0){{ $noIsPositive ? 'text-success' : 'text-danger' }}@endif mx-1 {{ $noIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $noAnswerCount }}
                        <span class="ms-1 {{ $noIsMostCommonAnswer ? 'fw-bold' : 'text-muted' }}">
                            <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                            <span class="ms-1">{{ __('No') }}</span>
                        </span>
                    </span>
                </div>
            </div>

            <div class="col-auto">
                <div class="px-2">
                    <x-buttons.icon-toggle-modal :target='"#show-appraisal-item-modal-" . $content["id"]' :icon='"question-circle"' :color='"dark"' :tooltip='__("Unknown")' />
                    <span class="mx-1 {{ $unknownIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $unknownAnswerCount }}
                        <span class="ms-1">
                            <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                            <span class="text-muted ms-1">{{ __('Unknown') }}</span>
                        </span>
                    </span>
                </div>
                <div class="px-2">
                    <x-buttons.icon-toggle-modal :target='"#show-appraisal-item-modal-" . $content["id"]' :icon='"slash-circle"' :color='"dark"' :tooltip='__("Not relevant")' />
                    <span class="mx-1 {{ $irrelevantIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $irrelevantAnswerCount }}
                        <span class="ms-1">
                            <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                        <span class="text-muted ms-1">{{ __('Not relevant') }}</span>
                        </span>
                    </span>
                </div>
            </div>

            <div class="col-auto">
                <div class="px-2">
                    <x-buttons.icon-toggle-modal :target='"#show-appraisal-item-modal-" . $content["id"]' :icon='"search"' :color='"dark"' :tooltip='__("Inspect")' />
                    <span class="text-muted">{{ __('This question has been answered by :n participants.', ['n' => $ratedCount . '/' . $totalMembershipCount]) }}</span>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="show-appraisal-item-modal-{{ $content['id'] }}" tabindex="-1" aria-labelledby="show-appraisal-item-modal-label-{{ $content['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="show-appraisal-item-modal-label-{{ $content['id'] }}">{{ ($content['short'] ?? __('Unknown Content')) . ' (' . ($content->getUniqueNumber() ?? '?') . ')' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <p>{{ $content['text'] }}</p>

                    <table class="table table-borderless">
                        <thead>
                            <tr class="fw-bold">
                                <th class="col-2">
                                    {{ __('Answer options') }}
                                </th>
                                <th>
                                    {{ __('Associated effects') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr class="py-0">
                            <td class="py-0">
                                <x-icons.tooltip-icon :icon='"check-circle"' :color='"dark"' />
                                <span class="@if($yesAnswerCount > 0){{ $yesIsPositive ? 'text-success' : 'text-danger' }}@endif mx-1 {{ $yesIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $yesAnswerCount }}
                                    <span class="ms-1 {{ $yesIsMostCommonAnswer ? 'fw-bold' : 'text-muted' }}">
                                        <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                                        <span class="ms-1">{{ __('Yes') }}</span>
                                    </span>
                                 </span>
                            </td>
                            <td class="py-0">
                                @php($index = 0)
                                @foreach($content['effects'] as $effect)
                                    @if($effect['size_y'] !== 0)
                                        @if($index > 0)<span>, </span>@endif
                                        <span>{{ __($effect['type']['name']) }}</span>
                                        @if($yesAnswerCount === 0)<span class="text-secondary">+/-&thinsp;0</span>
                                        @elseif($effect['size_y'] > 0)<span class="fw-bold @if($effect['type']['is_positive']) text-success @else text-danger @endif">+{{ $effect['size_y'] * ($yesAnswerCount ?? 0) }}</span>
                                        @elseif($effect['size_y'] < 0)<span class="fw-bold @if($effect['type']['is_positive']) text-danger @else text-success @endif">{{ $effect['size_y'] * ($yesAnswerCount ?? 0) }}</span>@endif
                                        @php($index++)
                                    @endif
                                @endforeach
                                @if($index === 0)<span class="text-muted">{{ __('No effects') }}</span>@endif
                            </td>
                        </tr>
                        <tr>
                            <td class="py-0">
                                <x-icons.tooltip-icon :icon='"x-circle"' :color='"dark"' :tooltip='__("No")' />
                                <span class="@if($noAnswerCount > 0){{ $noIsPositive ? 'text-success' : 'text-danger' }}@endif mx-1 {{ $noIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $noAnswerCount }}
                                    <span class="ms-1 {{ $noIsMostCommonAnswer ? 'fw-bold' : 'text-muted' }}">
                                        <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                                        <span class="ms-1">{{ __('No') }}</span>
                                    </span>
                                </span>
                            </td>
                            <td class="py-0">
                                @php($index = 0)
                                @foreach($content['effects'] as $effect)
                                    @if($effect['size_n'] !== 0)
                                        @if($index > 0)<span>, </span>@endif
                                        <span>{{ __($effect['type']['name']) }}</span>
                                        @if($noAnswerCount === 0)<span class="text-secondary">+/-&thinsp;0</span>
                                        @elseif($effect['size_n'] > 0)<span class="fw-bold @if($effect['type']['is_positive']) text-success @else text-danger @endif">+{{ $effect['size_n'] * ($noAnswerCount ?? 0) }}</span>
                                        @elseif($effect['size_n'] < 0)<span class="fw-bold @if($effect['type']['is_positive']) text-danger @else text-success @endif">{{ $effect['size_n'] * ($noAnswerCount ?? 0) }}</span>@endif
                                        @php($index++)
                                    @endif
                                @endforeach
                                @if($index === 0)<span class="text-muted">{{ __('No effects') }}</span>@endif
                            </td>
                        </tr>
                        <tr>
                            <td class="py-0">
                                <x-icons.tooltip-icon :icon='"question-circle"' :color='"dark"' :tooltip='__("Unknown")' />
                                <span class="mx-1 {{ $unknownIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $unknownAnswerCount }}
                                    <span class="ms-1">
                                        <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                                        <span class="text-muted ms-1">{{ __('Unknown') }}</span>
                                    </span>
                                </span>
                            </td>
                            <td class="py-0"></td>
                        </tr>
                        <tr>
                            <td class="py-0">
                                <x-icons.tooltip-icon :icon='"slash-circle"' :color='"dark"' :tooltip='__("Not relevant")' />
                                <span class="mx-1 {{ $irrelevantIsMostCommonAnswer ? 'fw-bold' : '' }}">{{ $irrelevantAnswerCount }}
                                    <span class="ms-1">
                                        <x-icons.tooltip-icon :icon='"arrow-right"' :color='"dark"' />
                                    <span class="text-muted ms-1">{{ __('Not relevant') }}</span>
                                    </span>
                                </span>
                            </td>
                            <td class="py-0"></td>
                        </tr>
                        </tbody>
                    </table>

                    <hr>

                    <table class="table">
                        <thead>
                        <tr class="fw-bold">
                            <th class="col-2">
                                {{ __('Participant') }}
                            </th>
                            <th class="col-2">
                                {{ __('Answer') }}
                            </th>
                            <th class="col-8">
                                <span class="ms-4">{{ __('Comment') }}</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content->getEntries($project) as $entry)
                            <tr>
                                <td class="py-2">
                                    {{ $entry['stage']['membership']['user']['username'] }}
                                </td>
                                <td class="text-nowrap py-2">
                                    @if($entry['positive'] > 0)
                                        <x-icons.tooltip-icon :icon='"check-circle"' :color='"dark"' /><span class="ms-2">{{ __('Yes') }}</span>
                                    @elseif($entry['negative'] > 0)
                                        <x-icons.tooltip-icon :icon='"x-circle"' :color='"dark"' /><span class="ms-2">{{ __('No') }}</span>
                                    @elseif(isset($entry['positive']) && $entry['positive'] < -1.5)
                                        <x-icons.tooltip-icon :icon='"slash-circle"' :color='"dark"' /><span class="ms-2">{{ __('Not relevant') }}</span>
                                    @elseif(isset($entry['positive']) && $entry['positive'] < -0.5)
                                        <x-icons.tooltip-icon :icon='"question-circle"' :color='"dark"' /><span class="ms-2">{{ __('Unknown') }}</span>
                                    @else
                                        <x-icons.tooltip-icon :icon='"exclamation-circle"' :color='"dark"' /><span class="ms-2">{{ __('No rating') }}</span>
                                    @endif
                                </td>
                                <td class="pt-2 pb-0 pe-3">
                                    @if($entry->hasComment())
                                        <livewire:show-comment :comment='$entry["comment"]' :allowInteraction='false' />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>

            </div>
        </div>
    </div>

</div>
