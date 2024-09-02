<div class="modal fade show-results-modal" id="show-questionnaire-results-modal-{{ $questionnaire['id'] }}" tabindex="-1" aria-labelledby="show-item-questionnaire-modal-label-{{ $questionnaire['id'] }}" aria-hidden="true" data-chart-id="{{ $questionnaire['id'] }}" data-chart-type="questionnaire" data-content-type="{{ $questionnaire->getMainContentType() }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-questionnaire-results-modal-{{ $questionnaire['id'] }}">{{ __('User ratings for :content', ['content' => $questionnaire['name'] ?? __('Unknown Questionnaire')]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <x-localization.show-item-results-modal>
                    <div class="row g-2">
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-questionnaire-results-positive-chart-{{ $questionnaire['id'] }}"></canvas>
                                <div class="text-center text-small position-absolute top-50 start-50 translate-middle">
                                    {{ __('Positive Effects') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-questionnaire-results-negative-chart-{{ $questionnaire['id'] }}"></canvas>
                                <div class="text-center text-small position-absolute top-50 start-50 translate-middle">
                                    {{ __('Negative Effects') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-4 px-4 pt-2 pb-4">
                            <div class="chart position-relative">
                                <canvas class="chart-canvas" id="show-questionnaire-results-potential-chart-{{ $questionnaire['id'] }}"></canvas>
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
                            <th scope="col">{{ __('Item') }}</th>
                            <th scope="col">{{ __('Participant') }}</th>
                            <th scope="col" class="col-2">{{ __('Positive') }}</th>
                            <th scope="col" class="col-2">{{ __('Negative') }}</th>
                            <th scope="col" class="col-2">{{ __('Potential') }}</th>
                            <th scope="col" class="col-1">{{ __('Info') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($stages = $project->getActiveStagesOfType($stageType))
                        @forelse($questionnaire['contents'] as $content)
                            @php($index = 0)
                            @forelse($stages as $stage)
                                @php($entry = $stage->getEntry($content))
                                <tr id="questionnaire-results-row-{{ $questionnaire['id'] }}">
                                    @if($index === 0)
                                        <td rowspan="{{ count($stages) }}">
                                            <span class="text-button" data-bs-toggle="modal" data-bs-target="#show-item-results-modal-{{ $content['id'] }}" data-modal-id="{{ $questionnaire['id'] }}">{{ $content['short'] ?? __('Unknown Item') }}</span>
                                        </td>
                                    @endif
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
                                @php($index++)
                            @empty
                                <tr>
                                    <td colspan="6">
                                        {{ __('No :things Available.', ['things' => __('Results')]) }}
                                    </td>
                                </tr>
                            @endforelse
                        @empty
                            <tr>
                                <td colspan="6">
                                    {{ __('No :things Available.', ['things' => __('Items')]) }}
                                </td>
                            </tr>
                        @endforelse
                        <tr>
                            <th colspan="2">{{ __('Score') }}<span class="float-end text-body-secondary">&#8709;</span></th>
                            <th>
                                @php($positiveMean = $questionnaire->getMeanValue($project, 'positive'))
                                @php($tooltip = $project->impactToString($positiveMean, $questionnaire->getMainContentType()))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$positiveMean > 3.33 ? "circle-fill" : ($positiveMean > 1.66 ? "circle-half" : "circle")' :color='"success"' :tooltip='$tooltip'></x-icons.tooltip-icon>{{ number_format($positiveMean, 2, ",", "") }}
                                <span class="float-end">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle-fill"' :color='"secondary"' :tooltip='__("Average value calculated from all assessments submitted. If the effects were not assessed or were assessed as unknown, the value is not included in the calculation.")'></x-icons.tooltip-icon>
                                </span>
                            </th>
                            <th>
                                @php($negativeMean = $questionnaire->getMeanValue($project, 'negative'))
                                @php($tooltip = $project->impactToString($negativeMean, $questionnaire->getMainContentType()))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$negativeMean > 3.33 ? "circle-fill" : ($negativeMean > 1.66 ? "circle-half" : "circle")' :color='"danger"' :tooltip='$tooltip'></x-icons.tooltip-icon>{{ number_format($negativeMean, 2, ",", "") }}
                                <span class="float-end">
                                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle-fill"' :color='"secondary"' :tooltip='__("Average value calculated from all assessments submitted. If the effects were not assessed or were assessed as unknown, the value is not included in the calculation.")'></x-icons.tooltip-icon>
                                </span>
                            </th>
                            <th>
                                @php($potentialMean = $questionnaire->getMeanValue($project, 'potential'))
                                @php($tooltip = $project->impactToString($potentialMean, $questionnaire->getMainContentType()))
                                <x-icons.tooltip-icon :actAsButton='true' :icon='$potentialMean > 3.33 ? "circle-fill" : ($potentialMean > 1.66 ? "circle-half" : ($potentialMean > 0 ? "circle" : "x-circle"))' :color='$potentialMean > 0 ? "primary" : "dark"' :tooltip='$tooltip'></x-icons.tooltip-icon>{{ number_format($potentialMean, 2, ",", "") }}
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
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>

<script>

    initCharts({{ $questionnaire['id'] }}, 'questionnaire')
    setChartData({{ $questionnaire['id'] }}, 'questionnaire', {{ '[' . $questionnaire->getScatteredValues($project, 'positive', false, true) . ']' }},
        {{ '[' . $questionnaire->getScatteredValues($project, 'negative', false, true) . ']' }},
        {{ '[' . $questionnaire->getScatteredValues($project, 'potential', false, true) . ']' }})

</script>
