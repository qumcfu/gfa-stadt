@if(Lang::locale() === 'de')
    <p>
        <span class="fw-bold">Es sind {{ $key === 'positive' ? 'positive' : ($key === 'negative' ? 'negative' : 'unbekannte') }} Auswirkungen in Bezug auf folgende Themen zu erwarten:</span>
    </p>
    {{ $slot }}
    <p class="mb-2">
        Der jeweils erste Wert in Klammern gibt an, wie hoch die Wichtigkeit dieser Auswirkungen <span class="fst-italic">durchschnittlich</span> (&thinsp;<x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>&thinsp;) eingeschätzt wurde. Der zweite Wert stellt die <span class="fst-italic">gravierendste abgegebene Einschätzung</span> (&thinsp;<x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>&thinsp;) dar. Die Werte liegen im Bereich <span class="fw-bold">zwischen 0</span> (nicht wichtig) <span class="fw-bold">und 5</span> (sehr wichtig).
    </p>
@elseif(Lang::locale() === 'en')
    <p>
        <span class="fw-bold">{{ $key === 'positive' ? 'Positive' : ($key === 'negative' ? 'Negative' : 'Unknown') }} effects related to the following issues are expected:</span>
    </p>
    {{ $slot }}
    <p class="mb-2">
        The first value in parentheses indicates how high the importance of these effects was assessed <span class="fst-italic">on average</span> (&thinsp;<x-icons.tooltip-icon :icon='"people-fill"' :color='"dark"' :size='0.8' :tooltip='__("Mean Value")'></x-icons.tooltip-icon>&thinsp;). The second value represents <span class="fst-italic">the most serious assessment</span> (&thinsp;<x-icons.tooltip-icon :icon='"person-fill"' :color='"dark"' :size='0.8' :tooltip='__("Highest Value")'></x-icons.tooltip-icon>&thinsp;) given. The values lie in the range <span class="fw-bold">between 0</span> (not important) <span class="fw-bold">and 5</span> (very important).
    </p>
@endif
