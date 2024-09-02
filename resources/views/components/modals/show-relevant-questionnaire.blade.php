<div class="modal fade" id="show-relevant-questionnaire-modal-{{ $key }}-{{ $questionnaire['id'] }}" tabindex="-1" aria-labelledby="show-relevant-questionnaire-modal-label-{{ $key }}-{{ $questionnaire['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-relevant-questionnaire-modal-label-{{ $key }}-{{ $questionnaire['id'] }}">{{ __(':things in the area of :area', ['things' => ($key !== 'potential' ? __(ucfirst($key) . ' Effects') : __('Potentials for improvement')), 'area' => $questionnaire['name']]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                @php($contents = $questionnaire->getRelevantContents($project, $key))

                <x-localization.show-relevant-questionnaire :key='$key'>
                    <ul>
                        @foreach($contents as $content)
                            <li>
                                {{ $content['short'] ?? __('Unknown Content') }}
                                @php($mean = $content->getMeanValue($project, $key))
                                @php($max = $content->getMaxValue($project, $key))
                                @php($tooltips = ($key !== 'potential' ? ['mean' => $project->impactToString($mean, $content['type']['shortname']), 'max' => $project->impactToString($max, $content['type']['shortname'])] : ['mean' => $project->potentialToString($mean, $content['type']), 'max' => $project->potentialToString($max, $content['type'])]))
                                <span>(&thinsp;<x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($mean, 1, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($mean, $content["type"]["shortname"])' :color='$mean > 0 ? ($key === "positive" ? "success" : ($key === "negative" ? "danger" : "primary")) : "dark"' :size='0.7' :tooltip='$tooltips["mean"]'></x-icons.tooltip-icon>
                            &thinsp;/&thinsp;<x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>
                            <span class="mx-1">{{ number_format($max, 0, ",", "") }}</span>
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($max, $content["type"]["shortname"])' :color='$max > 0 ? ($key === "positive" ? "success" : ($key === "negative" ? "danger" : "primary")) : "dark"' :size='0.7' :tooltip='$tooltips["max"]'></x-icons.tooltip-icon>&thinsp;)
                        </span>
                            </li>
                        @endforeach
                    </ul>
                </x-localization.show-relevant-questionnaire>

            </div>

            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
