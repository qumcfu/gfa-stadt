@if(Lang::locale() === 'de')
    <p>
        Auf der Grundlage der Einschätzungen aller Teilnehmenden könnte sich das Vorhaben negativ auf
        {{ $slot }}
        auswirken. Klicken Sie auf die Bezeichnungen der gesundheitlichen Auswirkungen, um zu erfahren, wodurch sie verursacht werden.
    </p>
    <p class="mb-0">
        Zu diesen Auswirkungen sollten Sie ämterübergreifend diskutieren und ggf. alternative Maßnahmen in Betracht ziehen.
    </p>
@elseif(Lang::locale() === 'en')

@endif
