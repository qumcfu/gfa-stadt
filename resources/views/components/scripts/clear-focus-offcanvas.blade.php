<script>
    // Clear focus after offcanvas panel is closed.
    // (By default, the button that triggered the offcanvas is focused.)
    $('.offcanvas').on('shown.bs.offcanvas', function (event) {
        $('.btn').one('focus', function (event) {
            $(this).blur();
        });
    });
</script>
