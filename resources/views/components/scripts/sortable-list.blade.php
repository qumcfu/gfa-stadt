<input name="order" id="order" type="hidden" value="">
<script type="text/javascript" src="{{ asset('js/Sortable.min.js') }}"></script>

<script>
    new Sortable(sortable, {
        animation: 150,
        @if($handle)handle: '.sortable-handle',@endif
        ghostClass: 'sortable-ghost'
    });

    $( document ).ready(function() {
        updateList();
    });

    $('#sortable').bind('sort', function(event, ui) {
        updateList();
        $('#save-order-button').attr('disabled', false);
    });

    function updateList() {

        let ids = [];

        $('#sortable .sortable-item').each(function(index) {
            ids.push($(this).attr('id'));
        });

        $('#order').attr('value', JSON.stringify(ids));
    }
</script>
