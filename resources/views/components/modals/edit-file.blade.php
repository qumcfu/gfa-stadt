<div class="modal fade" id="edit-file-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="edit-file-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/files/update/{{ $file['id'] }}" method="post" class="" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="edit-file-modal-label-{{ $file['id'] }}">{{ __('Edit :thing', ['thing' => __('File')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <p><span>{{ __('Please give the file a name and select the project in which the file is to be used.') }}</span></p>
                            <p class="mb-2"><span>{{ __('You can also use the file in multiple projects by declaring it global.') }}</span></p>
                        </div>
                    </div>

                    <x-forms.file-modal :file='$file' :projects='$projects' :types='$types'></x-forms.file-modal>

                </div>

                <div class="modal-footer bg-body-secondary p-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-sm btn-primary">{{ __('Save Changes') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('files.' . $file['id'] . '.*')
<script>
    show('edit-file-modal-{{ $file['id'] }}')
</script>
@enderror
