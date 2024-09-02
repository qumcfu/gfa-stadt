<div>
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
