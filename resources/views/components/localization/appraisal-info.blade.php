@if(Lang::locale() === 'de')
    <p class="mt-3">
        In dieser Übersicht können Sie sich über die Bedeutung des Themas „{{ $questionnaire['name'] ?? __('Unknown Questionnaire') }}“ für eine gesundheitsfördernde Stadtplanung informieren. Klicken Sie die hervorgehobenen Flächen an, um weitere Informationen zu relevanten Schlüsselfaktoren sowie zu erwartenden Effekten und gesundheitlichen Auswirkungen zu erhalten.
    </p>

@elseif(Lang::locale() === 'en')
    <p class="mt-3">
        In this overview you can learn about the importance of the topic "{{ $questionnaire['name'] ?? __('Unknown Questionnaire') }}" for health-promoting urban planning. Click on the highlighted areas for more information on relevant key factors and expected effects and impacts on health.
    </p>
@endif
