<script>

    $( document ).ready(function() {
        applyType($('option:selected', this).attr('data-bs-name'))
    });

    $('#content-type').on('change', function() {
        applyType($('option:selected', this).attr('data-bs-name'))
    });

    function applyType(type){

        $('.content').each(function() {
            let disabled = $(this).attr('id').indexOf(type) < 0
            $(this).attr('hidden', disabled)
            $(this).find(':input').each(function() {
                $(this).prop('disabled', disabled || (!disabled && $(this).attr('data-bs-default-state') === 'disabled'))
            })
        })

        $('.preview').each(function() {
            let disabled = $(this).attr('id').indexOf(type) < 0
            $(this).attr('hidden', disabled)
            $(this).find(':input').each(function() {
                $(this).prop('disabled', disabled)
            })
        })
    }

</script>
