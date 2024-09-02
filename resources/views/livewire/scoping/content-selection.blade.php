<div>
    <form wire:submit="updateScopingContents" method="post">
        @method('PUT')
        @csrf
        @php($index = 0)
        @php($count = 0)
        <div class="row gx-3 gy-1">
            <div class="col-sm-12 col-lg-4">
                @foreach($questionnaires as $questionnaire)
                    @if($questionnaire['stage_order_id'] > $index && $count < $contentCount * 0.31125)
                        <livewire:scoping.questionnaire-contents :project='$project' :questionnaire='$questionnaire' :stageType='$stageType' />
                        @php($index = $questionnaire['stage_order_id'])
                        @php($count += count($questionnaire['contents']))
                    @endif
                @endforeach
            </div>
            <div class="col-sm-12 col-lg-4">
                @foreach($questionnaires as $questionnaire)
                    @if($questionnaire['stage_order_id'] > $index && $count < $contentCount * 0.6225)
                        <livewire:scoping.questionnaire-contents :project='$project' :questionnaire='$questionnaire' :stageType='$stageType' />
                        @php($index = $questionnaire['stage_order_id'])
                        @php($count += count($questionnaire['contents']))
                    @endif
                @endforeach
            </div>
            <div class="col-sm-12 col-lg-4">
                @foreach($questionnaires as $questionnaire)
                    @if($questionnaire['stage_order_id'] > $index)
                        <livewire:scoping.questionnaire-contents :project='$project' :questionnaire='$questionnaire' :stageType='$stageType' />
                        @php($index = $questionnaire['stage_order_id'])
                        @php($count += count($questionnaire['contents']))
                    @endif
                @endforeach
            </div>
        </div>

    </form>
</div>
