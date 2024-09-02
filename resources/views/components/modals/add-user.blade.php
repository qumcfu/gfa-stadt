<div class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="add-user-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/users" method="post" class="needs-validation">
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="add-user-modal-label">{{ __('Create :thing', ['thing' => __('User Account')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-forms.user-modal :user='$user ?? null' :groups='$groups'></x-forms.user-modal>

                </div>

                <input name="order_id" type="hidden" id="order-id" value="{{ old('order_id') ?? null }}">

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-sm btn-primary">{{ __('Add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    let addUserModal = document.getElementById('add-user-modal')
    addUserModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        if (button != null) {
            let orderId = button.getAttribute('data-order-id')
            addUserModal.querySelector('#order-id').setAttribute('value', orderId)
        }
    })

    addUserModal.addEventListener('shown.bs.modal', function (event) {
        document.getElementById('username-0').focus()
    })
</script>

@error('data.0.*')
<script>
    show('add-user-modal')
</script>
@enderror
