<div>
    <h5 class="color-heading report-heading br-round-top text-center mt-2 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
        <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} me-3" style="font-size: 1.2em;"></i>
        <span>{{ $questionnaire['name'] }}</span>
        <i class="bi-{{ $questionnaire['icon']['name'] ?? 'x' }} ms-3" style="font-size: 1.2em;"></i>
    </h5>
    <div class="color-frame br-round-bottom mt-0 px-0" style="border-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
        <div class="text-button-dark d-flex justify-content-center p-0" wire:click="toggle" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}20;">
            <div class="px-3 py-2">
                <i class="bi-{{ $iconName }} me-2" id="left-icon-{{ $questionnaire['id'] ?? 0 }}"></i>
                <span id="detailed-questionnaire-bar-{{ $questionnaire['id'] ?? 0 }}">{{ __($label) }}</span>
                <i class="bi-{{ $iconName }} ms-2" id="right-icon-{{ $questionnaire['id'] ?? 0 }}"></i>
            </div>
        </div>
        <div class="col-12 px-0 {{ $isActive ? '' : 'd-none' }}" id="detailed-questionnaire-{{ $questionnaire['id'] ?? 0 }}" style="border-top: 2px solid {{ $questionnaire['color']['hex'] ?? '#606060' }};">
            @php($items = $questionnaire['screeningQuestionnaire']->getAppraisalItems($project))
            @php($itemIndex = 0)
            @php($itemCount = count($items))

            @foreach($items ?? [] as $item)
                @php($itemIndex++)
                <div style="border-width: 0; {{ $itemIndex < $itemCount ?  'border-bottom-width: 2px;  border-style: solid; border-color: ' . ($questionnaire['color']['hex'] ?? '#606060') : '' }};">
                    <div class="px-2 py-2">
                        <livewire:appraisal.detailed-content :project='$project' :content='$item' :key='$item["id"]' />
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @script
    <script>
        $wire.on('reinitialize-tooltips', () => {
            reinitializeTooltips()
        });
    </script>
    @endscript
</div>
