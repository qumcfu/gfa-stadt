<div class="modal fade" id="show-references-modal-{{ $questionnaire['id'] }}" tabindex="-1" aria-labelledby="show-references-modal-label-{{ $questionnaire['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="show-references-modal-label-{{ $questionnaire['id'] }}">{{ __('Additional information and references') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- this is also available as a livewire component -->

                @forelse($questionnaire['references'] as $reference)
                    <p class="text-break">{!! $reference->getApaStyle() !!}</p>
                @empty
                    <p class="text-body-secondary">– {{ __('Missing references') }} –</p>
                @endforelse

                <script>
                    let showReferencesModal_{{ $questionnaire['id'] }} = document.getElementById('show-references-modal-{{ $questionnaire['id'] }}')
                    showReferencesModal_{{ $questionnaire['id'] }}.addEventListener('show.bs.modal', function (event) {

                        let button = event.relatedTarget

                        let previousModalId = button.getAttribute('data-previous')
                        let backButton = showReferencesModal_{{ $questionnaire['id'] }}.querySelector('#references-back-button-{{ $questionnaire['id'] }}')

                        if(previousModalId != null) {
                            backButton.setAttribute('data-bs-target', previousModalId)
                            if(backButton.classList.contains('d-none')) backButton.classList.remove('d-none')
                        } else {
                            if(!backButton.classList.contains('d-none')) backButton.classList.add('d-none')
                        }
                    })
                </script>

            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary d-none" id="references-back-button-{{ $questionnaire['id'] }}" data-bs-toggle="modal" data-bs-target="">{{ __('Back') }}</button>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
