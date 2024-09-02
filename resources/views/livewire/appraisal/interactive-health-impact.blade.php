<div class="row gx-2 gy-1">
    @php($multiplier = 10.0)
    @foreach($questionnaires as $questionnaire)
    <style>
        .questionnaire-{{ $questionnaire['id'] }}.active {
            color: var(--bs-dark);
            background-color: {{ $questionnaire['color']['hex'] }}80 !important;
            border-color: {{ $questionnaire['color']['hex'] }} !important;
        }
    </style>
    @endforeach

    <h4>{{ __('Interactive chart') }}</h4>
    <p>
        Klicken Sie ein <b>Schwerpunktthema</b>, einen <b>direkten Effekt</b> oder eine <b>gesundheitliche Auswirkung</b> an, um die Zusammenhänge, welche der Auswertung zugrunde liegen, sichtbar zu machen. Die Werte neben <span class="text-success">grünen Pfeilen<i class="bi-caret-up-fill ms-1"></i><i class="bi-caret-down-fill me-1"></i></span> beschreiben die Verbesserung dieses Aspekts, während Werte neben <span class="text-danger">roten Pfeilen<i class="bi-caret-up-fill ms-1"></i><i class="bi-caret-down-fill me-1"></i></span> eine Verschlechterung bezeichnen. Bei Schwerpunktthemen und direkten Effekten werden die Werte für Verbesserung und Verschlechterung getrennt angegeben, um das Verhältnis der Maßnahmen bezüglich dieses Aspekts aufzuzeigen.
    </p>
    <p>
        Je <span class="text-success">positiver</span> ein Aspekt eingeschätzt wurde, desto intensiver <span class="text-success">färbt sich das jeweilige Feld grün</span>. Eine <span class="text-danger">rote Färbung</span> deutet dagegen auf eine <span class="text-danger">negative Einschätzung</span> hin. Die Farbe der Pfeile zwischen den einzelnen Feldern entspricht der Art und Intensität der Auswirkung, ein <span class="text-success">kräftiges Grün</span> steht für einen sehr positiven Effekt, ein <span class="text-danger">schwaches Rot</span> für einen leicht negativen und umgekehrt.
    </p>
    <p>
        Der <b>mögliche Wertebereich</b> liegt bei Schwerpunktthemen und direkten Effekten zwischen –10 und 10. Bei den gesundheitlichen Auswirkungen ergeben sich die Werte aus der Summe der Beträge der mit ihnen in Verbindung stehenden direkten Effekte und können daher außerhalb dieses Bereichs liegen.
    </p>

    <div class="col-4">
        <h5>{{ __('Key topics') }}</h5>
        <div class="list-group">
            @foreach($questionnaires as $questionnaire)
                @if(($activeQuestionnaire['id'] ?? 0) === 0 && !is_null($activeEffectType))
                    @php($positiveIconClass = $activeEffectType['is_positive'] ? 'bi-caret-up-fill' : 'bi-caret-down-fill')
                    @php($negativeIconClass = $activeEffectType['is_positive'] ? 'bi-caret-down-fill' : 'bi-caret-up-fill')
                @elseif(($activeQuestionnaire['id'] ?? 0) === 0 && !is_null($activeHealthImpactType))
                    @php($positiveIconClass = $activeHealthImpactType['is_positive'] ? 'bi-caret-up-fill' : 'bi-caret-down-fill')
                    @php($negativeIconClass = $activeHealthImpactType['is_positive'] ? 'bi-caret-down-fill' : 'bi-caret-up-fill')
                @endif
                @php($textColorClass = (($categories[$questionnaire['id']]['alpha'] ?? 0) > 168 && ($activeQuestionnaire['id'] ?? 0) === 0) ? 'text-light' : 'text-dark')
                <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start {{ $textColorClass }} questionnaire-{{ $questionnaire['id'] }} @if(($activeQuestionnaire['id'] ?? 0) === $questionnaire['id']) active fw-bold @endif" id="questionnaire-{{ $questionnaire['id'] }}" @if(!isset($activeQuestionnaire)) style="background-color: {{ $categories[$questionnaire['id']]['color'] ?? '#fff0' }};" @endif wire:click="selectQuestionnaire({{ $questionnaire['id'] }})">
                    <div>{{ $questionnaire['name'] }}</div>
                    @if(($activeEffectType['id'] ?? 0) > 0 || ($activeHealthImpactType['id'] ?? 0) > 0)
                    <div class="text-nowrap">
                        @php($adjustedPositive = ($categories[$questionnaire['id']]['positive'] ?? 0) * $multiplier)
                        @php($adjustedNegative = ($categories[$questionnaire['id']]['negative'] ?? 0) * $multiplier)
                        <span class="{{ $textColorClass }}" style="font-size: 0.8rem;">{{ round($adjustedPositive, 1) }}</span>
                        <i class="{{ $positiveIconClass }} text-success" style="font-size: 0.8rem;"></i>
                        <span class="{{ $textColorClass }}" style="font-size: 0.8rem;">{{ round($adjustedNegative, 1) }}</span>
                        <i class="{{ $negativeIconClass }} text-danger" style="font-size: 0.8rem;"></i>
                    </div>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-3">
        <h5>{{ __('Direct Effects') }}</h5>
        <div class="list-group">
            @foreach($effectTypes as $effectType)
                @php($isHighlighted = ($activeEffectType['id'] ?? 0) === $effectType['id'] || !is_null($activeQuestionnaire) || !is_null($activeHealthImpactType))
                @if($isHighlighted)
                    @php($positiveIconClass = $effectType['is_positive'] ? 'bi-caret-up-fill' : 'bi-caret-down-fill')
                    @php($negativeIconClass = $effectType['is_positive'] ? 'bi-caret-down-fill' : 'bi-caret-up-fill')
                @endif
                @php($textColorClass = ($isHighlighted && ($effects[$effectType['id']]['alpha'] ?? 0) > 168) ? 'text-light' : 'text-dark')
                <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start {{ $textColorClass }} @if(($activeEffectType['id'] ?? 0) === $effectType['id']) active fw-bold @endif" id="effect-type-{{ $effectType['id'] }}" @if($isHighlighted) style="background-color: {{ $effects[$effectType['id']]['color'] ?? '#fff0' }};" @endif wire:click="selectEffectType({{ $effectType['id'] }})">
                    <div>{{ __($effectType['name']) }}</div>
                    @if($isHighlighted)
                    <div class="text-nowrap">
                        @php($adjustedPositive = ($effects[$effectType['id']]['positive'] ?? 0) * $multiplier)
                        @php($adjustedNegative = ($effects[$effectType['id']]['negative'] ?? 0) * $multiplier)
                        <span class="{{ $textColorClass }}" style="font-size: 0.8rem;">{{ round($adjustedPositive, 1) }}</span>
                        <i class="{{ $positiveIconClass }} text-success" style="font-size: 0.8rem;"></i>
                        <span class="{{ $textColorClass }}" style="font-size: 0.8rem;">{{ round($adjustedNegative, 1) }}</span>
                        <i class="{{ $negativeIconClass }} text-danger" style="font-size: 0.8rem;"></i>
                    </div>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-3">
        <h5>{{ __('Health Impacts') }}</h5>
        <div class="list-group">
            @foreach($healthImpactTypes as $impactType)
                @php($isHighlighted = ($activeHealthImpactType['id'] ?? 0) === $impactType['id'] || !is_null($activeQuestionnaire) || !is_null($activeEffectType))
                @if($isHighlighted)
                    @php($impact = $healthImpacts[$impactType['id']]['value'] ?? 0)
                    @php($isPositiveResult = $impact > 0 && $impactType['is_positive'] || $impact < 0 && !$impactType['is_positive'])
                    @php($isNegativeResult = $impact < 0 && $impactType['is_positive'] || $impact > 0 && !$impactType['is_positive'])
                    @php($healthIconClass = $impact > 0 ? 'bi-caret-up-fill' : ($impact < 0 ? 'bi-caret-down-fill' : 'bi-caret-right-fill'))
                    @php($iconColorClass = ($healthImpacts[$impactType['id']]['alpha'] ?? 0) > 175 ? 'text-light' : ($isPositiveResult ? 'text-success' : ($isNegativeResult ? 'text-danger' : 'text-secondary')))
                @endif
                @php($textColorClass = ($isHighlighted && ($healthImpacts[$impactType['id']]['alpha'] ?? 0) > 168) ? 'text-light' : 'text-dark')
                <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start {{ $textColorClass }} @if(($activeHealthImpactType['id'] ?? 0) === $impactType['id']) active fw-bold @endif" id="health-impact-type-{{ $impactType['id'] }}" @if($isHighlighted) style="background-color: {{ $healthImpacts[$impactType['id']]['color'] ?? '#fff0' }};" @endif wire:click="selectHealthImpactType({{ $impactType['id'] }})">
                    <div class="">{{ __($impactType['name']) }}</div>
                    @if($isHighlighted)
                    <div class="text-nowrap">
                        @php($adjustedImpact = $impact * $multiplier)
                        <span class="{{ $textColorClass }}" style="font-size: 0.8rem;">{{ round($adjustedImpact, 1) }}</span>
                        <i class="{{ $healthIconClass . ' ' . $iconColorClass }}" style="font-size: 0.8rem;"></i>
                    </div>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
</div>
