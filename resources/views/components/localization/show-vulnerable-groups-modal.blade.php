@if(Lang::locale() === 'de')

    @if($groupCount > 0)
        <p>
            Beim Abschluss der Voruntersuchung wurde beschlossen, folgende Gruppen während der Analysephase gesondert zu berücksichtigen. Der folgenden Tabelle können Sie entnehmen, wie die Teilnehmenden die positiven und negativen Auswirkungen des Vorhabens auf die jeweilige Gruppe durchschnittlich eingeschätzt haben.
        </p>
    @else
        <p>
            Beim Abschluss der Voruntersuchung wurde beschlossen, dass der Einfluss des Vorhabens auf gefährdete Gruppen so gering ist, dass sie während der Analysephase nicht gesondert betrachtet werden müssen.
        </p>
    @endif
    {{ $slot }}
    @if($groupCount > 0)
        <p class="mb-2">
            Bitte versuchen Sie, diese Einschätzungen in Ihre Bewertungen einfließen zu lassen.
        </p>
    @endif

@elseif(Lang::locale() === 'en')
    @if($groupCount > 0)
        <p>
            At the conclusion of the screening, it was decided to consider the following groups separately during the scoping and appraisal phase. The following table shows the participants' average assessment of the positive and negative effects of the project on each group.
        </p>
    @else
        <p>
            At the conclusion of the screening, it was decided that the impact of the project on vulnerable groups would be so small that they would not need to be considered separately during the scoping and appraisal phases.
        </p>
    @endif
    {{ $slot }}
    @if($groupCount > 0)
        <p class="mb-2">
            Please try to incorporate these assessments into your evaluations.
        </p>
    @endif
@endif
