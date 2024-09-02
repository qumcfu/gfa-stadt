<div class="table-responsive">
    <table class="table table-striped table-bordered w-100 mb-0">
        <thead>
        <tr>
            <th scope="col">{{ __('Questionnaire') }}</th>
            <th scope="col" class="col-1">{{ __('Progress') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stage->getQuestionnaires() as $questionnaire)
            @php($isInactive = ($stage['type']['shortname'] === 'appraisal' && isset($questionnaire['screeningQuestionnaire']) && !$questionnaire['screeningQuestionnaire']->hasFocusedContent($stage['membership']['project'])))
            <tr>
                <td>
                    <x-icons.tooltip-icon :actAsButton='true' :icon='$questionnaire["type"]["icon"]["name"]' :htmlColor='$questionnaire["type"]["color"]["hex"] ?? "#808080"'></x-icons.tooltip-icon>
                    <a @if(!$isInactive) href="/{{ $stage['type']['shortname'] }}/view/{{ $stage['membership']['id'] }}/{{ $questionnaire['stage_order_id'] }}" class="text-dark text-button" @endif><span @if($isInactive) class="text-decoration-line-through" @endif>{{ $questionnaire['name'] }}</span></a>
                </td>
                <td class="w-25 align-middle">
                    <a @if(!$isInactive) href="/{{ $stage['type']['shortname'] }}/view/{{ $stage['membership']['id'] }}/{{ $questionnaire['stage_order_id'] }}" class="progress-button" @endif>
                        @php($progress = $stage->getProgressForQuestionnaire($questionnaire) * 100)
                        <div class="progress bg-dark-subtle" role="progressbar" aria-label="{{ $questionnaire['name'] ?? __('Unknown Questionnaire') }}" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                            @if($isInactive)
                                <div class="progress-bar bg-info-subtle" style="width: 100%"><span class="text-dark text-center">{{ __('not relevant') }}</span></div>
                            @elseif($progress > 99)
                                <div class="progress-bar bg-success" style="width: {{ $progress }}%"><span class="text-center">{{ number_format($progress, 0, ',', '') }} %</span></div>
                            @elseif($progress > 75)
                                <div class="progress-bar bg-mostly-positive" style="width: {{ $progress }}%"><span class="text-center">{{ number_format($progress, 0, ',', '') }} %</span></div>
                            @elseif($progress >= 25)
                                <div class="progress-bar bg-warning" style="width: {{ $progress }}%"><span class="text-center">{{ number_format($progress, 0, ',', '') }} %</span></div>
                            @elseif($progress > 0)
                                <div class="progress-bar bg-mostly-negative" style="width: {{ max($progress, 20) }}%"><span class="text-center">{{ number_format($progress, 0, ',', '') }} %</span></div>
                            @else
                                <div class="progress-bar bg-danger" style="width: 15%">0 %</div>
                            @endif
                        </div>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">
                    {{ __('No :things Available.', ['things' => __('Questionnaires')]) }}
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
