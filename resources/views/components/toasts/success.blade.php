<div id="success-toast-{{ $id ?? 0 }}" class="toast align-items-center bg-success border-0" role="alert" data-bs-delay="{{ 2500 + strlen($message) * 20 }}" aria-live="assertive" aria-atomic="true" @if(strlen($message) > 45) style="width: 500px;" @endif>
    <div class="d-flex">
        <div class="toast-body text-white">
            {{ $message ?? __('Success') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<script>

    $(document).ready(function() {
        $('#success-toast-{{ $id ?? 0 }}').toast("show")
    })

</script>
