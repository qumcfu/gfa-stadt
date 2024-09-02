@if(Lang::locale() === 'de')
    <h5>
        Zusammenfassung
    </h5>
    <p>
        Anhand dieser drei Grafiken können Sie einsehen, wie groß der Anteil der Teilnehmenden ist, der positive bzw. negative Auswirkungen oder Verbesserungspotential der Maßnahmen erkannt hat. Fahren Sie mit der Maus über die Abschnitte, um mehr zu erfahren.
    </p>
    {{ $slot }}
    <h5>
        Auflistung aller abgegebenen Einschätzungen
    </h5>
    <p>
        Die Ziffern neben den Symbolen leiten sich aus den Angaben der Teilnehmenden ab und dienen der Auswertung. Fehlende Ziffern deuten auf nicht abgegebene oder als unbekannt gekennzeichnete Einschätzungen hin. Diese fließen nicht in die Auswertung ein.
    </p>
    <p>
        Die höchsten Werte jeder Spalte sind farbig hervorgehoben. In der letzten Zeile finden Sie die Durchschnittswerte aller abgegebenen Einschätzungen.
    </p>
    <p>
        Fahren Sie mit dem Mauszeiger über die Symbole, um ihre Bedeutung angezeigt zu bekommen.
    </p>
@elseif(Lang::locale() === 'en')
    <h5>
        Summary
    </h5>
    <p>
        These three charts allow you to see the percentage of participants who identified positive or negative effects or potential for improvement of the measures. Hover your mouse over the sections to learn more.
    </p>
    {{ $slot }}
    <h5>
        List of all assessments submitted
    </h5>
    <p>
        The numbers next to the symbols are derived from the information provided by the participants and are used for evaluation purposes. Missing numbers indicate assessments that were not given or marked as unknown. These are not included in the evaluation.
    </p>
    <p>
        The highest values in each column are highlighted in color. The last line shows the average values of all assessments submitted.
    </p>
    <p>
        Hover your mouse over the icons to see their meaning.
    </p>
@endif
