@if(Lang::locale() === 'de')
    <p>
        Die folgenden direkten Effekte wirken sich auf <span class="fw-bold">{{ __($impactType['name']) }}</span> aus und setzen sich wie folgt zusammen:
    </p>
    {{ $slot }}
    <p class="mt-3 mb-2">
        Die Einschätzungen der Teilnehmenden zu den geplanten Maßnahmen des Vorhabens wurden anhand ihrer voraussichtlichen direkten Effekte ausgewertet. Der mögliche Wertebereich liegt zwischen –10 und 10. Da gesundheitliche Auswirkungen von mehr als einem direkten Effekt beeinflusst werden können, wurden die Beträge der Einzelwerte addiert. Die Summe der Einzelwerte beträgt <span class="fw-bold {{ $key === 'positive' ? 'text-success' : ($key === 'negative' ? 'text-danger' : 'text-secondary') }}">{{ number_format($value * 10.0, 2) }}</span>. Geteilt durch die Anzahl der diese gesundheitliche Auswirkung beeinflussenden direkten Effekte ergibt sich ein Durchschnittswert von <span class="fw-bold {{ $key === 'positive' ? 'text-success' : ($key === 'negative' ? 'text-danger' : 'text-secondary') }}">{{ number_format(($value / max(count($impactType['healthImpacts'] ?? []) , 1)) * 10.0, 2) }}</span>.
    </p>
@elseif(Lang::locale() === 'en')

@endif
