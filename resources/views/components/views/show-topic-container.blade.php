<div class="row justify-content-center">
    <div class="col-{{ $width }} @if($topic['origin_id'] === 0) px-0 @endif">

        @php($questionnaireColorCode = $questionnaire['color'] ?? null)

        <div class="mb-{{ $topic->hasConnections() ? '5' : '3' }}" id="topic-{{ $topic['id'] }}">
            <h5 class="color-heading screening-heading text-center br-round-top br-round-bottom text-start text-dark border border-4" style="background-color: {{ ($topic['origin_id'] !== 0 ? ($questionnaireColorCode['hex'] ?? '#606060') : '#ffffff') }}80; border-color: {{ ($questionnaireColorCode['hex'] ?? '#606060') }} !important;">
                <span>{{ $topic['name'] }}</span>

                @if(strlen($topic['description'] ?? '') > 0)
                    <div class="mt-0 px-0">
                        <div class="text-center px-3">
                            <h5 class="my-0 py-2">{{ $topic['description'] }}</h5>
                        </div>
                    </div>
                @endif

                <div class="pt-3 pb-2 px-2">
                    <div class="row gx-3 gy-2 justify-content-center">
                        @foreach($topic['topics'] as $child)
                            @if($child['type'] === 'default')
                                <x-views.show-topic :topic='$child' :questionnaire='$questionnaire' :width='$topic->getChildWidth($child)'></x-views.show-topic>
                            @elseif($child['type'] === 'column')
                                <div class="col-{{ $topic->getChildWidth($child) }}">
                                    <div class="row justify-content-center">
                                        <x-views.show-topic-column :topic='$child' :questionnaire='$questionnaire'></x-views.show-topic-column>
                                    </div>
                                </div>
                            @elseif($child['type'] === 'container' && $child['origin_id'] === 0)
                                <x-views.show-topic-container :topic='$child' :questionnaire='$questionnaire'></x-views.show-topic-container>
                            @endif
                        @endforeach
                    </div>
                </div>

            </h5>
        </div>

    </div>
</div>
