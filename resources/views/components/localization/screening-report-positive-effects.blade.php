@if(Lang::locale() === 'de')
    <p>
        Auf der Grundlage der Einschätzungen aller Teilnehmenden sind positive Auswirkungen in den Bereichen
        {{ $slot }}
        zu erwarten. Klicken Sie auf die Namen der Bereiche, um zu erfahren, welche Punkte betroffen sind.
    </p>
    <p class="mb-0">
        Die Einbeziehung dieser Bereiche in eine Gesundheitsfolgenabschätzung kann sinnvoll sein, um das Vorhaben argumentativ zu unterstützen.
    </p>
@elseif(Lang::locale() === 'en')
    <p>
        Based on the assessments of all participants, positive effects in the areas of
        {{ $slot }}
        to be expected. Click on the names of the areas to find out which points are affected.
    </p>
    <p class="mb-0">
        Including these areas in a health impact assessment may be useful to provide argumentative support for the project.
    </p>
@endif
