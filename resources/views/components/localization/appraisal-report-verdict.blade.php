@if($project->hasNegativeHealthImpacts())
    @if($project->hasPositiveHealthImpacts())
        @if(Lang::locale() === 'de')
            <h4 class="my-1">
                Die Maßnahmen des Vorhabens führen voraussichtlich zu gemischten Auswirkungen auf die Gesundheit der Bevölkerung.
            </h4>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                The measures in the project are likely to have a mixed impact on health.
            </h3>
        @endif
    @else
        @if(Lang::locale() === 'de')
            <h4 class="my-1">
                Die Maßnahmen des Vorhabens werden sich voraussichtlich negativ auf die Gesundheit der Bevölkerung auswirken.
            </h4>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                The measures in the project are likely to have a negative impact on health.
            </h3>
        @endif
    @endif
@else
    @if($project->hasPositiveHealthImpacts())
        @if(Lang::locale() === 'de')
            <h4 class="my-1">
                Die Maßnahmen des Vorhabens werden sich voraussichtlich positiv auf die Gesundheit der Bevölkerung auswirken.
            </h4>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                The measures in the project are likely to have a positive impact on health.
            </h3>
        @endif
    @else
        @if(Lang::locale() === 'de')
            <h4 class="my-1">
                Die Maßnahmen des Vorhabens werden sich voraussichtlich nicht oder kaum auf die Gesundheit der Bevölkerung auswirken.
            </h4>
        @elseif(Lang::locale() === 'en')
            <h3 class="my-1">
                The measures in the project are likely to have no or hardly any impact on health.
            </h3>
        @endif
    @endif
@endif

