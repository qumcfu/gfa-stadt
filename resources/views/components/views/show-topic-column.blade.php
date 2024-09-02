@php($child = $topic['topics'][0] ?? null)
@php($drawArrow = $child['draw_arrow'] ?? false)
<div class="col-12 @if($drawArrow) mb-5 @else mb-3 @endif">

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

@foreach($topic['topics'] as $child)
    @if($child['type'] === 'column')
        <x-views.show-topic-column :topic='$child' :questionnaire='$questionnaire' :width='12'></x-views.show-topic-column>
    @else
        <x-views.show-topic :topic='$child' :questionnaire='$questionnaire' :width='12'></x-views.show-topic>
    @endif
    @if(!is_null($child['origin_id']) && ($child['draw_arrow'] ?? false))
        <script defer>
            connectTopics('topic-{{ $child['origin_id'] }}', 'topic-{{ $child['id'] }}', '{{ $questionnaire['color']['hex'] ?? '#606060' }}')
        </script>
    @endif
@endforeach
