@if($project->hasRelevantContent('negative'))
    @if($project->hasRelevantContent('positive'))
        @if(Lang::locale() === 'de')
            <h3 class="my-1">
                Auf Basis der abgegebenen Einschätzungen wird die Durchführung einer Gesundheitsfolgenabschätzung empfohlen.
            </h3>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                Based on the assessments provided, it is recommended that a health impact assessment be conducted.
            </h3>
        @endif
    @else
        @if(Lang::locale() === 'de')
            <h3 class="my-1">
                Auf Basis der abgegebenen Einschätzungen wird die Durchführung einer Gesundheitsfolgenabschätzung dringend empfohlen.
            </h3>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                Based on the assessments provided, it is highly recommended that a health impact assessment be conducted.
            </h3>
        @endif
    @endif
@else
    @if($project->hasRelevantContent('positive'))
        @if(Lang::locale() === 'de')
            <h3 class="my-1">
                Die Durchführung einer Gesundheitsfolgenabschätzung ist nicht unbedingt notwendig.
            </h3>
            <h4>
                Sie kann dennoch sinnvoll sein, um das Vorhaben argumentativ zu unterstützen.
            </h4>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                It is not essential to conduct a health impact assessment.
            </h3>
            <h4>
                It can nevertheless be useful to support the project argumentatively.
            </h4>
        @endif
    @else
        @if(Lang::locale() === 'de')
            <h3 class="my-1">
                Die Durchführung einer Gesundheitsfolgenabschätzung ist nicht nötig.
            </h3>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                It is not necessary to conduct a health impact assessment.
            </h3>
        @endif
    @endif
@endif

