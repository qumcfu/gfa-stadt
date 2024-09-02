@php($positive = $group->getMeanValue($project, 'positive', true))
@php($negative = $group->getMeanValue($project, 'negative', true))
@php($participantCount = count($group->getEntries($project)))
@php($positiveCount = (int)number_format($positive * $participantCount))
@php($negativeCount = (int)number_format($negative * $participantCount))
@php($noImpactCount = $group->getNoImpactCount($project))
@php($unknownCount = $group->getUnknownCount($project))
@php($unratedCount = $group->getUnratedCount($project))
@php($comments = $group->getSortedComments($project))
@if(Lang::locale() === 'de')
    <p>
        @if($positiveCount > 0 && $negativeCount <= 0)
            @if($positiveCount === 1)<span>In der Vorprüfung gab <span class="fw-bold text-success">eine</span> Person von {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-success">positiv</span> auf diese Gruppe auswirken wird</span>@else<span>In der Vorprüfung gaben <span class="fw-bold text-success">{{ $positiveCount }}</span> der {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-success">positiv</span> auf diese Gruppe auswirken wird</span>@endif<span></span>@if($noImpactCount === 1)<span>, während <span class="fw-bold text-secondary">eine</span> Person <span class="fw-bold text-secondary">keine Auswirkungen</span> erwartet</span>@elseif($noImpactCount > 1)<span>, während <span class="fw-bold text-secondary">{{ $noImpactCount }}</span> Personen <span class="fw-bold text-secondary">keine Auswirkungen</span> erwarten</span>@endif<span>.</span>
            @if($unknownCount === 1)
                <span> Dabei hat <span class="fw-bold text-secondary">eine</span> Person angegeben, dass ihr die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @elseif($unratedCount > 1)
                <span> Dabei haben <span class="fw-bold text-secondary">{{ $unknownCount }}</span> Personen angegeben, dass ihnen die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @endif
            @if($unratedCount === 1)
                <span> <span class="fw-bold text-dark">Eine</span> weitere Person hat hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @elseif($unratedCount > 1)
                <span> Weitere <span class="fw-bold text-dark">{{ $unratedCount }}</span> Teilnehmende haben hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @endif
        @endif
        @if($positiveCount > 0 && $negativeCount > 0)
            @if($positiveCount === 1)
                <span>In der Vorprüfung gab <span class="fw-bold text-success">eine</span> Person von {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-success">positiv</span> auf diese Gruppe auswirken wird.</span>
            @else
                <span>In der Vorprüfung gaben <span class="fw-bold text-success">{{ $positiveCount }}</span> der {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-success">positiv</span> auf diese Gruppe auswirken wird.</span>
            @endif
            @if($negativeCount === 1)<span><span class="fw-bold text-danger">Eine</span> Person schätzte die Auswirkungen dagegen als <span class="fw-bold text-danger">negativ</span> ein</span>@else<span><span class="fw-bold text-danger">{{ $negativeCount }}</span> Personen schätzten die Auswirkungen dagegen als <span class="fw-bold text-danger">negativ</span> ein</span>@endif<span></span>@if($noImpactCount === 1)<span>, während <span class="fw-bold text-secondary">eine</span> weitere Person angab, <span class="fw-bold text-secondary">keine Auswirkungen</span> zu erwarten</span>@elseif($noImpactCount > 1)<span>, während <span class="fw-bold text-secondary">{{ $noImpactCount }}</span> Teilnehmende angaben, <span class="fw-bold text-secondary">keine Auswirkungen</span> zu erwarten</span>@endif<span>.</span>
            @if($unknownCount === 1)
                <span> Dabei hat <span class="fw-bold text-secondary">eine</span> Person angegeben, dass ihr die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @elseif($unratedCount > 1)
                <span> Dabei haben <span class="fw-bold text-secondary">{{ $unknownCount }}</span> Personen angegeben, dass ihnen die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @endif
            @if($unratedCount === 1)
                <span> <span class="fw-bold text-dark">Eine</span> weitere Person hat hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @elseif($unratedCount > 1)
                <span> Weitere <span class="fw-bold text-dark">{{ $unratedCount }}</span> Teilnehmende haben hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @endif
        @endif
        @if($positiveCount <= 0 && $negativeCount > 0)
            @if($negativeCount === 1)<span>In der Vorprüfung gab <span class="fw-bold text-danger">eine</span> Person von {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-danger">negativ</span> auf diese Gruppe auswirken wird</span>@else<span>In der Vorprüfung gaben <span class="fw-bold text-danger">{{ $negativeCount }}</span> der {{ $participantCount }} Teilnehmenden an, dass sich das Vorhaben voraussichtlich <span class="fw-bold text-danger">negativ</span> auf diese Gruppe auswirken wird</span>@endif<span></span>@if($noImpactCount === 1)<span>, während <span class="fw-bold text-secondary">eine</span> Person <span class="fw-bold text-secondary">keine Auswirkungen</span> erwartet</span>@elseif($noImpactCount > 1)<span>, während <span class="fw-bold text-secondary">{{ $noImpactCount }}</span> Personen <span class="fw-bold text-secondary">keine Auswirkungen</span> erwarten</span>@endif<span>.</span>
            @if($unknownCount === 1)
                <span> Dabei hat <span class="fw-bold text-secondary">eine</span> Person angegeben, dass ihr die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @elseif($unratedCount > 1)
                <span> Dabei haben <span class="fw-bold text-secondary">{{ $unknownCount }}</span> Personen angegeben, dass ihnen die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @endif
            @if($unratedCount === 1)
                <span> <span class="fw-bold text-dark">Eine</span> weitere Person hat hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @elseif($unratedCount > 1)
                <span> Weitere <span class="fw-bold text-dark">{{ $unratedCount }}</span> Teilnehmende haben hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @endif
        @endif
        @if($positiveCount <= 0 && $negativeCount <= 0)
            <span>In der Vorprüfung haben die {{ $participantCount }} Teilnehmenden weder positive noch negative Auswirkungen des Vorhabens auf diese Gruppe festgestellt.</span>
            @if($unknownCount === 1)
                <span> Dabei hat <span class="fw-bold text-secondary">eine</span> Person angegeben, dass ihr die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @elseif($unratedCount > 1)
                <span> Dabei haben <span class="fw-bold text-secondary">{{ $unknownCount }}</span> Personen angegeben, dass ihnen die Auswirkungen <span class="fw-bold text-secondary">unbekannt</span> sind.</span>
            @endif
            @if($unratedCount === 1)
                <span> <span class="fw-bold text-dark">Eine</span> weitere Person hat hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @elseif($unratedCount > 1)
                <span> Weitere <span class="fw-bold text-dark">{{ $unratedCount }}</span> Teilnehmende haben hierzu <span class="fw-bold text-dark">keine Angaben</span> gemacht.</span>
            @endif
        @endif
    </p>
    @if(count($comments ?? []) > 0)
        <p>
            Zu dieser Gruppe wurden folgende Anmerkungen verfasst:
        </p>
    @endif
    @foreach($comments as $comment)
        <x-views.show-comment :comment='$comment' :allowInteraction='false'></x-views.show-comment>
    @endforeach

    {{ $slot }}

@elseif(Lang::locale() === 'en')

    <p>[Missing translation]</p>

    @if(count($comments ?? []) > 0)
        <p>
            The following comments were made on this group:
        </p>
    @endif
    @foreach($comments as $comment)
        <x-views.show-comment :comment='$comment' :allowInteraction='false'></x-views.show-comment>
    @endforeach

    {{ $slot }}

@endif
