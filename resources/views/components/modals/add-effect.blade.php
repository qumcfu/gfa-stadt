<div class="modal fade" id="add-effect-modal" tabindex="-1" aria-labelledby="add-effect-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/effects" method="post" class="">
                @csrf
                <div class="modal-header bg-body-secondary">
                    <h5 class="modal-title" id="add-effect-modal-label">{{ __('Add :thing', ['thing' => __('Effect')]) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <p class="mb-1"><span>{{ __('Please specify which content the effect refers to, what type of effect it is and specify the effect size.') }}</span></p>
                        </div>
                    </div>

                    <x-forms.effect-modal :effect='null' :types='$types' :questionnaires='$questionnaires'></x-forms.effect-modal>

                    @if($contentId > 0)
                        <input name="effects[0][content_id]" type="hidden" value="{{ $contentId }}">
                    @endif

                </div>

                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary">{{ __('Add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

@error('effects.0.*')
<script>
    show('add-effect-modal')
</script>
@enderror
