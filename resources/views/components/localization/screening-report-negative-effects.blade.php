@if(Lang::locale() === 'de')
    <p>
        Auf der Grundlage der Einschätzungen aller Teilnehmenden sind negative Auswirkungen in den Bereichen
        {{ $slot }}
        zu erwarten. Klicken Sie auf die Namen der Bereiche, um zu erfahren, welche Punkte betroffen sind.
    </p>
    <p class="mb-0">
        Zu diesen Punkten sollten Sie ämterübergreifend diskutieren, um mögliche Wege zu finden, dies in der Planung zu berücksichtigen.
    </p>
@elseif(Lang::locale() === 'en')
    <p>
        Based on the assessments of all participants, negative effects in the areas of
        {{ $slot }}
        to be expected. Click on the names of the areas to find out which points are affected.
    </p>
    <p class="mb-0">
        Regarding these points, discuss across offices to find possible ways to address this in planning.
    </p>
@endif
