@if($topic['type'] === 'container')
    <x-views.show-topic-container :topic='$topic' :questionnaire='$questionnaire'></x-views.show-topic-container>
@else
    <div class="col-{{ $width }}">

        @php($questionnaireColorCode = $questionnaire['color'] ?? null)
        @if(strlen($topic['description'] ?? '') > 0)
            <div class="mt-0 px-0">
                <div class="text-center px-3">
                    <h5 class="my-0 py-2">{{ $topic['description'] }}</h5>
                </div>
            </div>
        @endif

        <div class="mb-2" id="topic-{{ $topic['id'] }}">
            <h5 class="color-heading screening-heading auto-hover text-center br-round-top br-round-bottom text-start cursor-pointer {{ !is_null($questionnaireColorCode) && $questionnaireColorCode->isBright() ? 'text-dark' : 'text-light' }}" data-bs-toggle="modal" data-bs-target="#show-topic-notes-modal-{{ $topic['id'] }}" style="background-color: {{ ($questionnaireColorCode['hex'] ?? '#606060') }};">
                <span>{{ $topic['name'] }}</span>
            </h5>
        </div>

    </div>
@endif

@foreach($topic['topics'] as $child)
    @if($child['type'] === 'container')
        <x-views.show-topic-container :topic='$child' :questionnaire='$questionnaire'></x-views.show-topic-container>
    @elseif($topic['type'] === 'column')
        <x-views.show-topic-column :topic='$child' :questionnaire='$questionnaire'></x-views.show-topic-column>
    @elseif($topic['type'] === 'default')
        <x-views.show-topic :topic='$child' :questionnaire='$questionnaire'></x-views.show-topic>
    @endif
    @if(!is_null($child['origin_id']) && ($child['draw_arrow'] ?? false))
    <script defer>
        // wait for page to load – this is essential for arrows!
        connectTopics('topic-{{ $child['origin_id'] }}', 'topic-{{ $child['id'] }}', '{{ $questionnaire['color']['hex'] ?? '#606060' }}')
    </script>
    @endif
@endforeach
