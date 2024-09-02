<div class="modal fade show-results-modal" id="show-item-results-modal-{{ $content['id'] }}" tabindex="-1" aria-labelledby="show-item-results-modal-label-{{ $content['id'] }}" aria-hidden="true" data-chart-id="{{ $content['id'] }}" data-chart-type="item" data-content-type="{{ $content['type']['shortname'] }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-item-results-modal-label-{{ $content['id'] }}">{{ (__('User ratings for :content', ['content' => $content['short'] ?? __('Unknown Content')])) . ' (' . ($content->getUniqueNumber() ?? '?') . ')' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <x-localization.show-item-results-modal>
                    <div class="row g-2">
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-item-results-positive-chart-{{ $content['id'] }}"></canvas>
                                <div class="text-center text-small position-absolute top-50 start-50 translate-middle">
                                    {{ __('Positive Effects') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-item-results-negative-chart-{{ $content['id'] }}"></canvas>
                                <div class="text-center text-small position-absolute top-50 start-50 translate-middle">
                                    {{ __('Negative Effects') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-item-results-potential-chart-{{ $content['id'] }}"></canvas>
                                <div class="text-center text-small position-absolute top-50 start-50 translate-middle">
                                    {!! __('Potential for improvement[hy]') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </x-localization.show-item-results-modal>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100 mb-0">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Participant') }}</th>
                            <th scope="col" class="col-2">{{ __('Positive') }}</th>
                            <th scope="col" class="col-2">{{ __('Negative') }}</th>
                            <th scope="col" class="col-2">{{ __('Potential') }}</th>
                            <th scope="col" class="col-1">{{ __('Info') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($project->getActiveStagesOfType($stageType) as $stage)
                            @php($entry = $stage->getEntry($content))
                            <tr id="item-results-row-{{ $content['id'] }}">
                                <td>
                                    {{ $stage['membership']['user']['username'] ?? __('Unknown User') }}
                                </td>
                                <td>
                                    @if($entry != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getPositiveIconName()' :htmlColor='$entry->getPositiveIconColor()' :tooltip='isset($entry["positive"]) ? ($entry["positive"] >= 0 ? ($entry->getPositiveImportance()) : __("unknown")) : __("no answer")'></x-icons.tooltip-icon><span class="positive-score" data-value="{{ $entry['positive'] ?? 0 }}">{{ ($entry['positive'] ?? -1) >= 0 ? $entry['positive'] : '' }}</span>
                                    @else
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"exclamation-circle-fill"' :color='"dark"' :tooltip='__("No Entry")'></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td>
                                    @if($entry != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getNegativeIconName()' :htmlColor='$entry->getNegativeIconColor()' :tooltip='isset($entry["negative"]) ? ($entry["negative"] >= 0 ? ($entry->getNegativeImportance()) : __("unknown")) : __("no answer")'></x-icons.tooltip-icon><span class="negative-score" data-value="{{ $entry['negative'] ?? 0 }}">{{ ($entry['negative'] ?? -1) >= 0 ? $entry['negative'] : '' }}</span>
                                    @else
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"exclamation-circle-fill"' :color='"dark"' :tooltip='__("No Entry")'></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td>
                                    @if($content['type']['shortname'] !== 'vulnerable-group-item')
                                        @if($entry != null)
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getPotentialIconName()' :htmlColor='$entry->getPotentialIconColor()' :tooltip='$entry->getPotentialTooltip()'></x-icons.tooltip-icon><span class="potential-score" data-value="{{ $entry['potential'] ?? 0 }}">{{ ($entry['potential'] ?? -1) >= 0 ? ($entry['potential'] * $entry['negative']) : '' }}</span>
                                        @else
                                            <x-icons.tooltip-icon :actAsButton='true' :icon='"exclamation-circle-fill"' :color='"dark"' :tooltip='__("No Entry")'></x-icons.tooltip-icon>
                                        @endif
                                    @else
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"dash-circle-dotted"' :color='"secondary"' :tooltip='__("not available")'></x-icons.tooltip-icon>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . ($entry["id"] ?? __("None")) '></x-icons.tooltip-icon>
                                    @if($entry != null && $entry['updated_at'] != null)
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='__("Last updated on :date at :time.", ["date" => $entry["updated_at"]->format("d.m.Y") ?? __("unknown date"), "time" => $entry["updated_at"]->format("H:i") ?? __("unknown time")])'></x-icons.tooltip-icon>
                                    @else
                                        <x-icons.tooltip-icon :actAsButton='true' :icon='"exclamation-circle-fill"' :color='"dark"' :tooltip='__("No Entry")'></x-icons.tooltip-icon>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    {{ __('No :things Available.', ['things' => __('Results')]) }}
                                </td>
                            </tr>
                        @endforelse
                        <tr>
                            <th>{{ __('Score') }}<span class="float-end text-body-secondary">&#8709;</span></th>
                            <th>
                                @php($positiveMean = $content->getMeanValue($project, 'positive'))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$project->getIcon($positiveMean, $content["type"]["shortname"])' :color='$positiveMean > 0 ? "success" : "dark"' :tooltip='$project->impactToString($positiveMean, $content["type"]["shortname"])'></x-icons.tooltip-icon>{{ number_format($positiveMean, 2, ",", "") }}
                                <span class="float-end">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle-fill"' :color='"secondary"' :tooltip='__("Average value calculated from all assessments submitted. If the effects were not assessed or were assessed as unknown, the value is not included in the calculation.")'></x-icons.tooltip-icon>
                                </span>
                            </th>
                            <th>
                                @php($negativeMean = $content->getMeanValue($project, 'negative'))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='$negativeMean > 0 ? "danger" : "dark"' :tooltip='$project->impactToString($negativeMean, $content["type"]["shortname"])'></x-icons.tooltip-icon>{{ number_format($negativeMean, 2, ",", "") }}
                                <span class="float-end">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle-fill"' :color='"secondary"' :tooltip='__("Average value calculated from all assessments submitted. If the effects were not assessed or were assessed as unknown, the value is not included in the calculation.")'></x-icons.tooltip-icon>
                                </span>
                            </th>
                            <th>
                                @php($potentialMean = $content->getMeanValue($project, 'potential'))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$project->getIcon($potentialMean)' :color='$potentialMean > 0 ? "primary" : "dark"' :tooltip='$project->potentialToString($potentialMean)'></x-icons.tooltip-icon>{{ number_format($potentialMean, 2, ",", "") }}
                                <span class="float-end">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle-fill"' :color='"secondary"' :tooltip='__("Average value calculated from all assessments submitted. If potential for improvement was identified, the value is based on the importance of the suspected negative effects. If the potential was not assessed or was assessed as unknown, the value is not included in the calculation.")'></x-icons.tooltip-icon>
                                </span>
                            </th>
                            <th></th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" id="results-back-button-{{ $content['id'] }}" data-bs-toggle="modal" data-bs-target="">{{ __('Back') }}</button>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>

<script>

    initCharts({{ $content['id'] }}, 'item')
    setChartData({{ $content['id'] }}, 'item', {{ '[' . $content->getScatteredValues($project, 'positive', false, true) . ']' }},
        {{ '[' . $content->getScatteredValues($project, 'negative', false, true) . ']' }},
        {{ '[' . $content->getScatteredValues($project, 'potential', false, true) . ']' }})

    document.getElementById('show-item-results-modal-{{ $content["id"] }}').addEventListener('show.bs.modal', function (event) {

        let backButton = $('#results-back-button-{{ $content["id"] }}')
        backButton.hide()
        let button = event.relatedTarget

        if(button != null) {
            let questionnaireId = button.getAttribute('data-modal-id')
            if(questionnaireId != null) backButton.show().attr('data-bs-target', '#show-questionnaire-results-modal-' + questionnaireId)
        }
    })

</script>
