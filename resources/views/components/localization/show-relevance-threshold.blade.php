@php($settings = $project['settings'])
@if(Lang::locale() === 'de')
    @if($stageType['shortname'] === 'screening')
        <p>
            Ob ein Thema innerhalb des Berichts als relevant gilt, hängt von den Einschätzungen aller Teilnehmenden, die den Screening-Prozess vollständig oder teilweise durchgeführt haben, ab.
            Dabei werden für jede der drei Kategorien „Positive Auswirkungen“, „Negative Auswirkungen“ und „Verbesserungspotential“ jeweils der <i>Durchschnittswert</i>, der aus allen Einschätzungen berechnet wird, sowie der <i>höchste abgegebene Wert</i> betrachtet.
            Ist einer dieser sechs Werte <i>{{ $settings->getOperatorAsString() }} einem Vergleichswert</i>, ist ein <i>Relevanzkriterium</i> erfüllt.
        </p>

        <p>
            Der Vergleichswert liegt bei positiven Auswirkungen für den Durchschnittswert bei <b>{{ number_format($settings['mean_positive_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_positive_th"])' :color='"success"' :size='0.8'></x-icons.tooltip-icon>) und für den höchsten Wert bei <b>{{ number_format($settings['max_positive_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_positive_th"])' :color='"success"' :size='0.8'></x-icons.tooltip-icon>).
            Bei negativen Auswirkungen liegt der Vergleichswert für den Durchschnittswert bei <b>{{ number_format($settings['mean_negative_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_negative_th"])' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>) und für den höchsten Wert bei <b>{{ number_format($settings['max_negative_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_negative_th"])' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>).
            Beim Verbesserungspotential liegt der Vergleichswert für den Durchschnittswert bei <b>{{ number_format($settings['mean_potential_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_potential_th"])' :color='"primary"' :size='0.8'></x-icons.tooltip-icon>) und für den höchsten Wert bei <b>{{ number_format($settings['max_potential_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_potential_th"])' :color='"primary"' :size='0.8'></x-icons.tooltip-icon>).
        </p>

        <p class="mb-0">
            @if($settings['min_met_conditions'] === 1)
                <i>Ab einem erfüllten Relevanzkriterium</i>
            @else
                <i>Ab {{ $settings['min_met_conditions'] }} erfüllten Relevanzkriterien</i>
            @endif
            <i>gilt ein Thema als relevant.</i>
        </p>
    @else
        <p>
            Ob ein direkter Effekt innerhalb des Berichts als relevant gilt, hängt von den Einschätzungen aller Teilnehmenden, die die Projektphase der „Analyse und Bewertung“ vollständig oder teilweise durchgeführt haben, ab.
            Aus den Antworten aller Teilnehmenden werden die zu erwartenden positiven und negativen direkten Effekte berechnet.
            Es wird für die positiven und negativen direkten Effekte jeweils ein <i>Durchschnittswert</i> aus den berechneten Werten aller Teilnehmenden gebildet. Auch <i>der höchste aus den Antworten einer Person hervorgehende Wert</i> wird für jeden Bereich betrachtet.
            Ist für einen Bereich einer dieser vier Werte <i>{{ $settings->getOperatorAsString() }} einem Vergleichswert</i>, ist ein <i>Relevanzkriterium</i> erfüllt.
        </p>

        <p>
            Der Vergleichswert liegt bei positiven direkten Effekten für den Durchschnittswert bei <b>{{ number_format($settings['mean_pos_effects_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='"arrow-up-circle"' :color='"success"' :size='0.8'></x-icons.tooltip-icon>) und für den höchsten Wert bei <b>{{ number_format($settings['max_pos_effects_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='"arrow-up-circle-fill"' :color='"success"' :size='0.8'></x-icons.tooltip-icon>).
            Bei negativen direkten Effekten liegt der Vergleichswert für den Durchschnittswert bei <b>{{ number_format($settings['mean_neg_effects_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='"arrow-down-circle"' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>) und für den höchsten Wert bei <b>{{ number_format($settings['max_neg_effects_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='"arrow-down-circle-fill"' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>).
        </p>

        <p class="mb-0">
            @if($settings['min_met_conditions'] === 1)
                <i>Ab einem erfüllten Relevanzkriterium</i>
            @else
                <i>Ab {{ $settings['min_met_conditions'] }} erfüllten Relevanzkriterien</i>
            @endif
            <i>gilt ein Bereich als relevant.</i>
        </p>
    @endif
@elseif(Lang::locale() === 'en')
    @if($stageType['shortname'] === 'screening')
        <p>
            Whether a topic is considered relevant within the report depends on the assessments of all participants who completed all or part of the screening process.
            For each of the three categories "positive effects", "negative effects" and "potential for improvement", the <i>average value</i> calculated from all assessments and the <i>highest value</i> given are considered.
            If one of these six values is <i>{{ $settings->getOperatorAsString() }} a comparison value</i>, a relevance criterion is met.
        </p>
        <p>
            The comparison value is <b>{{ number_format($settings['mean_positive_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_positive_th"])' :color='"success"' :size='0.8'></x-icons.tooltip-icon>) for the average value and <b>{{ number_format($settings['max_positive_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_positive_th"])' :color='"success"' :size='0.8'></x-icons.tooltip-icon>) for the highest value in the case of positive effects.
            In the case of negative effects, the comparison value for the average value is <b>{{ number_format($settings['mean_negative_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_negative_th"])' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>), while for the highest value it is <b>{{ number_format($settings['max_negative_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_negative_th"])' :color='"danger"' :size='0.8'></x-icons.tooltip-icon>).
            For the improvement potential, the comparison value for the average value is <b>{{ number_format($settings['mean_potential_th'], 1, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["mean_potential_th"])' :color='"primary"' :size='0.8'></x-icons.tooltip-icon>) and for the highest value <b>{{ number_format($settings['max_potential_th'], 0, ',', '') }}</b> (<x-icons.tooltip-icon :actAsButton='false' :icon='$project->getIcon($settings["max_potential_th"])' :color='"primary"' :size='0.8'></x-icons.tooltip-icon>).
        </p>
        <p class="mb-0">
            @if($settings['min_met_conditions'] === 1)
                <i>From one fulfilled relevance criterion</i>
            @else
                <i>From {{ $settings['min_met_conditions'] }} fulfilled relevance criteria</i>
            @endif
            <i>a subject is considered relevant.</i>
        </p>
    @else
        <p>
            ENGLISH TRANSLATION MISSING
        </p>
    @endif
@endif
