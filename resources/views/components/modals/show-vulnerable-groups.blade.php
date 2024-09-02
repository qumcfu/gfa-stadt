<div class="modal fade" id="show-vulnerable-groups-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-vulnerable-groups-modal-label">{{ __('Expected impact of the project on vulnerable groups') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                @php($focusedGroups = $project->getFocusedVulnerableGroups())
                <x-localization.show-vulnerable-groups-modal :groupCount='count($focusedGroups)'>

                    @if(count($focusedGroups) > 0)

                        <table class="table table-striped table-bordered w-100" id="vulnerable-groups-table">
                            <thead>
                            <tr>
                                <th style="width: 40%;"></th>
                                <th style="width: 30%;">{{ __('Positive Impact') }}</th>
                                <th style="width: 30%;">{{ __('Negative Impact') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                                @forelse($focusedGroups as $group)

                                    @php($positiveMean = $group->getMeanValue($project, 'positive'))
                                    @php($negativeMean = $group->getMeanValue($project, 'negative'))
                                    @php($tooltips = [
                                        'positive' => $project->impactToString($positiveMean, $group['type']['shortname']),
                                        'negative' => $project->impactToString($negativeMean, $group['type']['shortname'])])
                                    <tr>
                                        <td>
                                            <span>{{ $group['short'] }}</span>
                                        </td>
                                        <td>
                                            <x-icons.tooltip-icon :icon='"people-fill"' :color='$positiveMean > 0 ? "dark" : "secondary"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                                            <span class="@if($positiveMean) fw-bold @else text-muted @endif mx-1">{{ number_format($positiveMean, 1, ",", "") }}</span>
                                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMean, $group["type"]["shortname"])' :color='$positiveMean > 0 ? "success" : "dark"' :size='0.7' :tooltip='$tooltips["positive"]'></x-icons.tooltip-icon>
                                        </td>
                                        <td>
                                            <x-icons.tooltip-icon :icon='"people-fill"' :color='$negativeMean > 0 ? "dark" : "secondary"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                                            <span class="@if($negativeMean > 0) fw-bold @else text-muted @endif mx-1">{{ number_format($negativeMean, 1, ",", "") }}</span>
                                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $group["type"]["shortname"])' :color='$negativeMean > 0 ? "danger" : "dark"' :size='0.7' :tooltip='$tooltips["negative"]'></x-icons.tooltip-icon>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="3"><span class="fst-italic">{{ __('Unable to find vulnerable groups.') }}</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    @endif

                </x-localization.show-vulnerable-groups-modal>

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
