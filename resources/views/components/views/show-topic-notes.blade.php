@if(strlen($topic['notes'] ?? '') > 0)
    <x-modals.show-topic-notes :topic='$topic'></x-modals.show-topic-notes>
@endif

@foreach($topic['topics'] as $child)
    <x-views.show-topic-notes :topic='$child'></x-views.show-topic-notes>
@endforeach
