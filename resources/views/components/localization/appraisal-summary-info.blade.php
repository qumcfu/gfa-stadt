@php($progress = $stage->getProgress())
@php($currentQuestionnaire = $stage->getCurrentQuestionnaire())
@if(Lang::locale() === 'de')
    <p>
        @if($progress < 1.0)
            <span>Sie haben noch nicht alle Fragen der Analyse und Bewertung beantwortet. @if(isset($currentQuestionnaire))<a href="/appraisal/view/{{ $stage['membership']['id'] }}/{{ $currentQuestionnaire['stage_order_id'] }}">Klicken Sie hier</a><span>, um zum ersten Fragebogen weitergeleitet zu werden, der noch offene Fragen enthält.</span>@endif</span>
        @endif
    </p>
    <p>
        Unten sehen Sie eine Übersicht aller Bereiche der Analyse und Bewertung mit den zu erwartenden Auswirkungen des Vorhabens, die sich aus Ihren Einschätzungen ergeben. Fahren Sie mit dem Mauszeiger über die Symbole, um Ihre Bedeutung angezeigt zu bekommen oder klicken Sie auf den Titel eines Bereichs, um den jeweiligen Fragebogen zu öffnen.
    </p>
    <p class="mb-0">
        Wenn Sie möchten, können Sie sich den <a href="/appraisal/report/{{ $stage['membership']['project']['id'] }}">Bericht der Analyse und Bewertung</a> ansehen, der die Einschätzungen aller Teilnehmenden zusammenfasst.
    </p>
@elseif(Lang::locale() === 'en')
    <p>
        @if($progress < 1.0)
            <span>You have not yet answered all the appraisal questions. @if(isset($currentQuestionnaire))<a href="/appraisal/view/{{ $stage['membership']['id'] }}/{{ $currentQuestionnaire['stage_order_id'] }}">Click here</a><span> to be redirected to the first questionnaire which still contains open questions.</span>@endif</span>
        @endif
    </p>
    <p>
        Below is an overview of all appraisal areas with the expected effects of the project based on your assessments. Hover over the icons to see their meaning or click on the title of an area to open the respective questionnaire.
    </p>
    <p class="mb-0">
        If you wish, you can view the <a href="/appraisal/report/{{ $stage['membership']['project']['id'] }}">appraisal report</a>, which summarizes the assessments of all participants.
    </p>
@endif
