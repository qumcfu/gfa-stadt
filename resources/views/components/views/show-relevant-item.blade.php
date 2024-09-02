@php($colorCode = $content['questionnaire']['color'])
<div class="relevant-item p-3" style="background-image: linear-gradient(to right, {{ isset($colorCode) ? $colorCode->getTransparentColor() : '#60606020' }} 65%, #fff0 73%);">
    @php($reasons = $content->getRelevanceReasons($project))
    <div class="row">
        <div class="col-sm-12 col-xl-8">
            <div>
                @php($commentCount = count($content->getComments($project) ?? []) + count($content->getReplies($project) ?? []))
                <div class="row">
                    <div class="col-11">
                        <h5 class="text-button" data-bs-toggle="modal" data-bs-target="#show-item-results-modal-{{ $content['id'] }}">{{ $content['short'] ?? __('Unknown Content') }}</h5>
                    </div>
                    <div class="col-1">
                        <span class="float-end text-muted text-nowrap overflow-visible">
                            {{ $content->getUniqueNumber() }}
                        </span>
                    </div>
                </div>
                @if($commentCount > 0)<div class="d-inline-block text-button mt-0" data-bs-toggle="modal" data-bs-target="#show-comments-modal-{{ $content['id'] }}">{{ $commentCount . ' ' . ($commentCount > 1 ? __('Comments') : __('Comment')) }}</div> @endif
            </div>
            <p class="mt-2 mb-0">
                <x-localization.show-relevant-item :content='$content' :project='$project'></x-localization.show-relevant-item>
            </p>
        </div>
        <div class="col-sm-12 col-xl-4 ps-3 align-middle">
            <div class="row g-1">
                <div class="col-6">
                    <div>&thinsp;</div>
                </div>
                <div class="col-3">
                    <div class="w-100 text-end">
                        <span class="@if($reasons['positive'] % 2 === 1 || $reasons['negative'] % 2 === 1 || $reasons['potential'] % 2 === 1) fw-bold @endif"><span class="text-small">{{ __('Mean Value') }}</span>&nbsp;&nbsp;</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="w-100 text-end">
                        <span class="@if($reasons['positive'] >= 2 || $reasons['negative'] >= 2 || $reasons['potential'] >= 2) fw-bold @endif"><span class="text-small">{{ __('Maximum') }}</span>&nbsp;&nbsp;</span>
                    </div>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-6">
                    <div class="text-end"><span class="text-small @if($reasons['positive'] > 0) fw-bold @endif">{{ __('Positive Effects') }}</span></div>
                    <div class="text-end"><span class="text-small @if($reasons['negative'] > 0) fw-bold @endif">{{ __('Negative Effects') }}</span></div>
                    <div class="text-end"><span class="text-small @if($reasons['potential'] > 0) fw-bold @endif">{{ __('Potential for Improvement') }}</span></div>
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                    <div>
                        @php($positiveMean = $content->getMeanValue($project, 'positive'))
                        @php($impact = $project->impactToString($positiveMean, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMean, $content["type"]["shortname"])' :color='$positiveMean > 0 ? "success" : "secondary"' :tooltip='$impact'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['positive'] % 2 === 1) fw-bold @endif">{{ number_format($positiveMean, 1, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                    <div>
                        @php($negativeMean = $content->getMeanValue($project, 'negative'))
                        @php($impact = $project->impactToString($negativeMean, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='$negativeMean > 0 ? "danger" : "secondary"' :tooltip='$impact'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['negative'] % 2 === 1) fw-bold @endif">{{ number_format($negativeMean, 1, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                    <div>
                        @php($potentialMean = $content->getMeanValue($project, 'potential'))
                        @php($potential = $project->potentialToString($potentialMean, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='$potentialMean > 0 ? "primary" : "secondary"' :tooltip='$potential'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['potential'] % 2 === 1) fw-bold @endif">{{ number_format($potentialMean, 1, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                    <div>
                        @php($positiveMax = $content->getMaxValue($project, 'positive'))
                        @php($impact = $project->impactToString($positiveMax, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMax, $content["type"]["shortname"])' :color='$positiveMax > 0 ? "success" : "secondary"' :tooltip='$impact'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['positive'] >= 2) fw-bold @endif">{{ number_format($positiveMax, 0, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                    <div>
                        @php($negativeMax = $content->getMaxValue($project, 'negative'))
                        @php($impact = $project->impactToString($negativeMax, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $content["type"]["shortname"])' :color='$negativeMax > 0 ? "danger" : "secondary"' :tooltip='$impact'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['negative'] >= 2) fw-bold @endif">{{ number_format($negativeMax, 0, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                    <div>
                        @php($potentialMax = $content->getMaxValue($project, 'potential'))
                        @php($potential = $project->potentialToString($potentialMax, $content['type']['shortname']))
                        <x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMax)' :color='$potentialMax > 0 ? "primary" : "secondary"' :tooltip='$potential'>
                        </x-icons.tooltip-icon><span class="float-end @if($reasons['potential'] >= 2) fw-bold @endif">{{ number_format($potentialMax, 0, ",", "") }}&nbsp;&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
