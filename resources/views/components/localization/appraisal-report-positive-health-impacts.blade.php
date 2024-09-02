@if(Lang::locale() === 'de')
    <p>
        Auf der Grundlage der Einschätzungen aller Teilnehmenden könnte sich das Vorhaben positiv auf
        {{ $slot }}
        auswirken. Klicken Sie auf die Bezeichnungen der gesundheitlichen Auswirkungen, um zu erfahren, wodurch sie verursacht werden.
    </p>
    <p class="mb-0">
        Es kann sinnvoll sein, diese zu erwartenden Auswirkungen in die Gesundheitsfolgenabschätzung mit einzubeziehen, um das Vorhaben argumentativ zu unterstützen.
    </p>
@elseif(Lang::locale() === 'en')

@endif
