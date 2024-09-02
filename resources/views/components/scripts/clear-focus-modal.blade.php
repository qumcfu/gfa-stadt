<script>
    $('.modal').on('shown.bs.modal', function (event) {
        $('.btn').one('focus', function (event) {
            $(this).blur();
        });
    });
</script>
