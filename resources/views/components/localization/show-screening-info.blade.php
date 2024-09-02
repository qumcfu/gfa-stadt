@if(Lang::locale() === 'de')
    <p>
        Die <b>Fortschrittsanzeige</b> gibt Aufschluss darüber, wie viele der im Rahmen des Screenings gestellten Fragen Sie bereits beantwortet haben. Klicken Sie den Fortschrittsbalken an, um eine <b>Aufschlüsselung nach Fragebögen</b> einzusehen, über die Sie die einzelnen Fragebögen auch direkt aufrufen können.
    </p>
    <p>
        Wenn Sie das Screening begonnen und unterbrochen oder Fragen ausgelassen haben, gelangen Sie mit <b>„Fortsetzen“</b> zum ersten Fragebogen, der noch unbeantwortete Fragen enthält. Nachdem Sie das Screening abgeschlossen haben, können Sie Ihre Eintragungen jederzeit über <b>„Bearbeiten“</b> ändern oder ergänzen.
    </p>
    <p class="mb-1">
        Ein Klick auf <b>„Zusammenfassung“</b> führt Sie zu einer Übersichtsseite, auf der <i>Ihre bisher abgegebenen Einschätzungen</i> kompakt dargestellt werden. Der <b>„Bericht“</b> fasst dagegen die Einschätzungen <i>aller Teilnehmenden</i> in einer Auswertung zusammen.
    </p>
@elseif(Lang::locale() === 'en')
    <p>
        The <b>progress bar</b> shows how many of the screening items you have already answered. Click on the progress bar to view a <b>breakdown by questionnaire</b>, which also allows you to access the individual questionnaires directly.
    </p>
    <p>
        If you have started the screening and interrupted it or omitted questions, <b>“Resume”</b> will take you to the first questionnaire that still contains unanswered items. After you have completed the screening, you can change or add to your entries at any time by clicking <b>“Edit”</b>.
    </p>
    <p class="mb-1">
        Clicking on <b>“Summary”</b> takes you to an overview page that shortly presents the assessments you have submitted so far. The <b>“Report”</b>, on the other hand, summarizes the assessments of all participants in one evaluation.
    </p>
@endif
