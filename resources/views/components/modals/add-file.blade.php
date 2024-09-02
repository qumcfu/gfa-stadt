<div class="modal fade" id="add-file-modal" tabindex="-1" aria-labelledby="add-file-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="main-form" action="/files" method="post" class="" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="add-file-modal-label">{{ __('Add :thing', ['thing' => __('File')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <p><span>{{ __('Please give the file a name and select the project in which the file is to be used.') }}</span></p>
                            <p class="mb-2"><span>{{ __('You can also use the file in multiple projects by declaring it global.') }}</span></p>
                        </div>
                    </div>

                    <x-forms.file-modal :file='null' :projects='$projects' :types='$types'></x-forms.file-modal>

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('files.0.*')
<script>
    show('add-file-modal')
</script>
@enderror
