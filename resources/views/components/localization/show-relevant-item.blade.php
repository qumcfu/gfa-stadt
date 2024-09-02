@php($reasons = $content->getRelevanceReasons($project))

@if($reasons['positive'] === 1)
    @php($positiveMean = $content->getMeanValue($project, 'positive'))
    @php($impact = $project->impactToString($positiveMean, $content["type"]["shortname"]))
    @if(Lang::locale() === 'de')
        Die <span class="fw-bold">positiven Auswirkungen</span> wurden durchschnittlich als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($positiveMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMean, $content["type"]["shortname"])' :color='"success"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) bewertet.
    @elseif(Lang::locale() === 'en')

    @endif
@elseif($reasons['positive'] === 2)
    @php($positiveMax = $content->getMaxValue($project, 'positive'))
    @php($impact = $project->impactToString($positiveMax, $content["type"]["shortname"]))
    @if(Lang::locale() === 'de')
        Die <span class="fw-bold">positiven Auswirkungen</span> wurden von mindestens einer Person als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($positiveMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMax, $content["type"]["shortname"])' :color='"success"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) eingeschätzt.

    @elseif(Lang::locale() === 'en')

    @endif
@endif
@if($reasons['positive'] === 3)
    @php($positiveMean = $content->getMeanValue($project, 'positive'))
    @php($positiveMax = $content->getMaxValue($project, 'positive'))
    @php($impact = ['mean' => $project->impactToString($positiveMean, $content["type"]["shortname"]), 'max' => $project->impactToString($positiveMax, $content["type"]["shortname"])])
    @if(Lang::locale() === 'de')
        Die <span class="fw-bold">positiven Auswirkungen</span> wurden durchschnittlich als <span class="fw-bold">{{ $impact['mean'] }}</span> (&thinsp;{{ number_format($positiveMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMean, $content["type"]["shortname"])' :color='"success"' :size='0.7' :tooltip='$impact["mean"]'></x-icons.tooltip-icon>) und von mindestens einer Person als <span class="fw-bold">{{ $impact['max'] }}</span> (&thinsp;{{ number_format($positiveMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($positiveMax, $content["type"]["shortname"])' :color='"success"' :size='0.7' :tooltip='$impact["max"]'></x-icons.tooltip-icon>) bewertet.
    @elseif(Lang::locale() === 'en')

    @endif
@endif


@if($reasons['negative'] === 1)
    @php($negativeMean = $content->getMeanValue($project, 'negative'))
    @php($impact = $project->impactToString($negativeMean, $content["type"]["shortname"]))
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) > 0)
            Die <span class="fw-bold">negativen Auswirkungen</span> hingegen wurden durchschnittlich als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($negativeMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) bewertet.
        @else
            Die <span class="fw-bold">negativen Auswirkungen</span> wurden durchschnittlich als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($negativeMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) bewertet.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) > 0)

        @else

        @endif
    @endif
@elseif($reasons['negative'] === 2)
    @php($negativeMax = $content->getMaxValue($project, 'negative'))
    @php($impact = $project->impactToString($negativeMax, $content["type"]["shortname"]))
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) > 0)
            Die <span class="fw-bold">negativen Auswirkungen</span> hingegen wurden von mindestens einer Person als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($negativeMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) bewertet.
        @else
            Die <span class="fw-bold">negativen Auswirkungen</span> wurden von mindestens einer Person als <span class="fw-bold">{{ $impact }}</span> (&thinsp;{{ number_format($negativeMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact'></x-icons.tooltip-icon>) eingeschätzt.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) > 0)

        @else

        @endif
    @endif
@endif
@if($reasons['negative'] === 3)
    @php($negativeMean = $content->getMeanValue($project, 'negative'))
    @php($negativeMax = $content->getMaxValue($project, 'negative'))
    @php($impact = ['mean' => $project->impactToString($negativeMean, $content["type"]["shortname"]), 'max' => $project->impactToString($negativeMax, $content["type"]["shortname"])])
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) > 0)
            Die <span class="fw-bold">negativen Auswirkungen</span> wurden hingegen durchschnittlich als <span class="fw-bold">{{ $impact['mean'] }}</span> (&thinsp;{{ number_format($negativeMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact["mean"]'></x-icons.tooltip-icon>) und von mindestens einer Person als <span class="fw-bold">{{ $impact['max'] }}</span> (&thinsp;{{ number_format($negativeMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact["max"]'></x-icons.tooltip-icon>) bewertet.
        @else
            Die <span class="fw-bold">negativen Auswirkungen</span> wurden durchschnittlich als <span class="fw-bold">{{ $impact['mean'] }}</span> (&thinsp;{{ number_format($negativeMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMean, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact["mean"]'></x-icons.tooltip-icon>) und von mindestens einer Person als <span class="fw-bold">{{ $impact['max'] }}</span> (&thinsp;{{ number_format($negativeMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($negativeMax, $content["type"]["shortname"])' :color='"danger"' :size='0.7' :tooltip='$impact["max"]'></x-icons.tooltip-icon>) bewertet.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) > 0)

        @else

        @endif
    @endif
@endif


@if($reasons['potential'] === 1)
    @php($potentialMean = $content->getMeanValue($project, 'potential'))
    @php($potential = $project->potentialToString($potentialMean))
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)
            Darüber hinaus wurde durchschnittlich <span class="fw-bold">{{ $potential }}</span> (&thinsp;{{ number_format($potentialMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='"primary"' :size='0.7' :tooltip='$potential'></x-icons.tooltip-icon>) erkannt.
        @else
            Im Durchschnitt wurde <span class="fw-bold">{{ $potential }}</span> (&thinsp;{{ number_format($potentialMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='"primary"' :size='0.7' :tooltip='$potential'></x-icons.tooltip-icon>) erkannt.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)

        @else

        @endif
    @endif
@elseif($reasons['potential'] === 2)
    @php($potentialMax = $content->getMaxValue($project, 'potential'))
    @php($potential = $project->potentialToString($potentialMax))
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)
            Mindestens eine Person hat darüber hinaus <span class="fw-bold">{{ $potential }}</span> (&thinsp;{{ number_format($potentialMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMax)' :color='"primary"' :size='0.7' :tooltip='$potential'></x-icons.tooltip-icon>) erkannt.
        @else
            Mindestens eine Person hat <span class="fw-bold">{{ $potential }}</span> (&thinsp;{{ number_format($potentialMax, 0, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMax)' :color='"primary"' :size='0.7' :tooltip='$potential'></x-icons.tooltip-icon>) erkannt.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)

        @else

        @endif
    @endif
@endif
@if($reasons['potential'] === 3)
    @php($potentialMean = $content->getMeanValue($project, 'potential'))
    @php($potentialMax = $content->getMaxValue($project, 'potential'))
    @php($potential = ['mean' => $project->potentialToString($potentialMean), 'max' => $project->potentialToString($potentialMax)])
    @if(Lang::locale() === 'de')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)
            Darüber hinaus wurde <span class="fw-bold">{{ $potential['mean'] }}</span> (&thinsp;{{ number_format($potentialMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='"primary"' :size='0.7' :tooltip='$potential["mean"]'></x-icons.tooltip-icon>) erkannt.
        @else
            Es wurde <span class="fw-bold">{{ $potential['mean'] }}</span> (&thinsp;{{ number_format($potentialMean, 1, ",", "") }}&thinsp;<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($potentialMean)' :color='"primary"' :size='0.7' :tooltip='$potential["mean"]'></x-icons.tooltip-icon>) erkannt.
        @endif
    @elseif(Lang::locale() === 'en')
        @if(($reasons['positive'] ?? 0) + ($reasons['negative'] ?? 0) > 0)

        @else

        @endif
    @endif
@endif
