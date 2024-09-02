<div>
    <div class="fw-bold mb-2">
        {{ __('Define the scope of the appraisal') }}:
    </div>
    <form wire:submit="updateAppMode">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __($appModeName) }}
            </button>
            <ul class="dropdown-menu">
                <li><button wire:click="appModeIndex = 1" value="1" type="submit" class="dropdown-item">{{ __('Full HIA') }}</button></li>
                <li><button wire:click="appModeIndex = 2" value="2" type="submit" class="dropdown-item">{{ __('Compact HIA') }}</button></li>
                <li><button wire:click="appModeIndex = 3" value="3" type="submit" class="dropdown-item">{{ __('Rapid HIA') }}</button></li>
            </ul>
        </div>
    </form>

    <div class="row mt-2">
        <div class="col-3">
            <div>
                <div class="d-inline-block">
                    {{ __('Scope') }}:
                </div>
                <div class="d-inline-block float-end">
                    <b>{{ $questionCount }}</b> {{ __('Questions') }}
                </div>
            </div>
            <div>
                <div class="d-inline-block">
                    {{ __('Completion time') }}:
                </div>
                <div class="d-inline-block float-end">
                    <b>{{ $estimatedTime }}</b> {{ __('minutes') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <p class="mb-0">
                @if($appModeIndex === 1)
                    {{ __('In the appraisal stage, the selected key topics are examined in detail. The participants are asked to give their assessment of all potentially relevant aspects of the project.') }}
                @elseif($appModeIndex === 2)
                    {{ __('During the appraisal stage, the participants are presented with a balanced selection of questions on the key topics defined here. The aspects relevant to most projects are covered by this mode.') }}
                @elseif($appModeIndex === 3)
                    {{ __('Only the most important aspects of the selected key topics are dealt with during the appraisal stage. Due to the reduced scope, this mode offers the shortest completion time for a more general examination of the project.') }}
                @endif
            </p>
        </div>
    </div>
</div>
