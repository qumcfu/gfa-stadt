@if($project->hasRelevantContent())

    @if(Lang::locale() === 'de')
        <h4>
            Detaillierte Auswertung
        </h4>
        <p>
            Im Folgenden sehen Sie eine Auflistung aller Themen, die für eine Gesundheitsfolgenabschätzung relevant sein könnten. <x-buttons.icon-toggle-modal :target='"#show-relevance-thresholds-modal"' :icon='"info-circle"' :color='"primary"' :size='1' :tooltip='__("How is the relevance of a subject determined?")'></x-buttons.icon-toggle-modal> Warum ein Thema als möglicherweise relevant erkannt wurde, können Sie der jeweiligen kurzen Erläuterung entnehmen. Die Wichtigkeit der Auswirkungen und Verbesserungspotentiale ist in Zahlen <b>zwischen 0</b> (nicht wichtig) <b>und 5</b> (sehr wichtig) angegeben.
        </p>
        <p>
            Klicken Sie auf den Titel eines Fragebogens oder die Namen seiner Themen, um eine detaillierte Zusammenfassung aller abgegebenen Einschätzungen zu erhalten. Wurden Kommentare zu einem Thema abgegeben, so ist dies unter dem Namen des Themas vermerkt. Klicken Sie auf den Vermerk, um die Kommentare einzusehen.
        </p>
    @elseif(Lang::locale() === 'en')
        <h4>
            Detailed evaluation
        </h4>
        <p>
            Below you can see a list of all topics that could be relevant for a health impact assessment. <x-buttons.icon-toggle-modal :target='"#show-relevance-thresholds-modal"' :icon='"info-circle"' :color='"primary"' :size='1' :tooltip='__("How is the relevance of a subject determined?")'></x-buttons.icon-toggle-modal> You can see why a topic was identified as possibly relevant in the respective short explanation. The importance of impacts and potentials for improvement is indicated in numbers <b>between 0</b> (not important) <b>and 5</b> (very important).
        </p>
        <p>
            Click on the title of a questionnaire or the names of its topics to get a detailed summary of all assessments given. If comments were made on a topic, this is noted under the name of the topic. Click on the note to view the comments.
        </p>
    @endif
@else
    @if(Lang::locale() === 'de')
        <p>
            Es konnten keine zu erwartenden Auswirkungen und keine Verbesserungspotentiale ermittelt werden, die eine nähere Betrachtung der Bereiche im Rahmen einer Gesundheitsfolgenabschätzung nahelegen würden. <x-buttons.icon-toggle-modal :target='"#show-relevance-thresholds-modal"' :icon='"info-circle"' :color='"primary"' :size='1' :tooltip='__("How is the relevance of a subject determined?")'></x-buttons.icon-toggle-modal>
        </p>
    @elseif(Lang::locale() === 'en')
        <p>
            No anticipated impacts or potential improvements could be identified that would suggest closer consideration of the areas as part of a health impact assessment. <x-buttons.icon-toggle-modal :target='"#show-relevance-thresholds-modal"' :icon='"info-circle"' :color='"primary"' :size='1' :tooltip='__("How is the relevance of a subject determined?")'></x-buttons.icon-toggle-modal>
        </p>
    @endif
@endif

