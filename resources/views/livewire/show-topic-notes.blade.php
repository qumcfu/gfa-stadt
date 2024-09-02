<div class="modal-body pb-2" style="border-color: {{ $topic->getQuestionnaire()['color']['hex'] ?? '#808080' }};">
    {!! $topic->getHyperlinkedNotes() !!}
</div>
