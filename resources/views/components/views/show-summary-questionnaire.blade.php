<a href="/{{ $stage['type']['shortname'] }}/view/{{ $stage['membership']['id'] }}/{{ $questionnaire['stage_order_id'] }}">
    <h6 class="color-heading screening-heading text-center br-round-top mt-3 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark text-button-dark' : 'text-light text-button-light' }}" style="background-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">{{ $questionnaire['name'] }}</h6>
</a>
<div class="color-frame text-center mt-0 px-2 py-1" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }};">
    @php($progress = $stage->getProgressForQuestionnaire($questionnaire))
    <div class="d-inline-block"><x-icons.tooltip-icon :actAsButton='true' :icon='$progress < 1.0 ? "exclamation-circle-fill" : "check-circle-fill"' :color='$progress < 1.0 ? "danger" : "success"' :tooltip='""'></x-icons.tooltip-icon></div>
    <div class="d-inline-block ms-1">{{ __(':percent completed', ['percent' => number_format($progress * 100) . ' %']) }}</div>
</div>

@if($stage['type']['shortname'] === 'screening')
    @foreach($questionnaire['contents'] as $content)
        <div class="color-frame @if($content->isLast()) br-round-bottom @endif px-2 py-1" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}; background-color: {{ isset($questionnaire['color']) ? $questionnaire['color']->getTransparentColor() : '#60606020' }};">
            @php($entry = $content->getEntry($stage))
            <div class="row gx-3">
                <div class="col-8 ps-2">
                    <span>{{ $content['short'] ?? __('Unknown Content') }}</span>
                </div>
                <div class="col-4 d-flex justify-content-end" style="padding-right: 12px;">
                    @if($entry != null)
                        @if($content['type']['shortname'] === 'screening-item' || $content['type']['shortname'] === 'vulnerable-group-item' && ($entry['negative'] ?? 0) <= 0)
                            @php($tooltipHeading = $entry->getTooltipHeading('positive'))
                            <x-icons.tooltip-icon :actAsButton='false' :icon='$entry->getPositiveIconName()' :htmlColor='$entry->getPositiveIconColor()' :size='0.8' :tooltip='"<span class=\"px-2 pt-2 fw-bold\">" . $tooltipHeading . "</span><br><span class=\"px-2\">" . (isset($entry["positive"]) ? ($entry["positive"] >= 0 ? (($content["type"]["shortname"] === "vulnerable-group-item" && ($entry["positive"] ?? 0) <= 0) ? __("not affected") : $entry->getPositiveImportance()) : __("unknown")) : __("no answer")) . "</span>"'></x-icons.tooltip-icon>@if($entry->hasImpact())<span class="ms-2 @if($content['type']['shortname'] === 'screening-item') me-2 @endif">{{ ($entry['positive'] ?? -1) >= 0 ? $entry['positive'] : '' }}</span>@endif
                        @endif
                        @if($entry->hasImpact())
                            @if($content['type']['shortname'] === 'screening-item' || $content['type']['shortname'] === 'vulnerable-group-item' && ($entry['negative'] ?? 0) > 0)
                                @php($tooltipHeading = $entry->getTooltipHeading('negative'))
                                <x-icons.tooltip-icon :actAsButton='false' :icon='$entry->getNegativeIconName()' :htmlColor='$entry->getNegativeIconColor()' :size='0.8' :tooltip='"<span class=\"px-2 pt-2 fw-bold\">" . $tooltipHeading . "</span><br><span class=\"px-2\">" . (isset($entry["negative"]) ? ($entry["negative"] >= 0 ? ($entry->getNegativeImportance()) : __("unknown")) : __("no answer")) . "</span>"'></x-icons.tooltip-icon><span class="ms-2 @if($content['type']['shortname'] === 'screening-item') me-2 @endif">{{ ($entry['negative'] ?? -1) >= 0 ? $entry['negative'] : '' }}</span>
                            @endif
                            @if($content['type']['shortname'] === 'screening-item')
                                <x-icons.tooltip-icon :actAsButton='false' :icon='$entry->getPotentialIconName()' :htmlColor='$entry->getPotentialIconColor()' :size='0.8' :tooltip='"<span class=\"px-2 pt-2 fw-bold\">" . __("Potential for improvement") . "</span><br><span class=\"px-2\">" . $entry->getPotentialTooltip() . "</span>"'></x-icons.tooltip-icon>@if($entry->hasPotential())<span class="ms-2">{{ $entry->getPotentialScore() }}</span>@endif
                            @endif
                        @endif
                    @else
                        <x-icons.tooltip-icon :actAsButton='false' :icon='"exclamation-circle-fill"' :color='"dark"' :size='0.8' :tooltip='__("No Entry")'></x-icons.tooltip-icon>
                    @endif
                </div>
            </div>
        </div>
   @endforeach
@elseif($stage['type']['shortname'] === 'appraisal')
    @php($effectTypeCount = $stage->getEffectTypeCount($questionnaire))
    @php($index = 1)
    @foreach($effectTypes as $type)
        @php($score = $stage->getEffectScore($questionnaire, $type, true))
        @if($score['positive'] > 0 || $score['negative'] > 0)
        <div class="color-frame @if($index === $effectTypeCount) br-round-bottom @endif px-2 py-1" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}; background-color: {{ isset($questionnaire['color']) ? $questionnaire['color']->getTransparentColor() : '#60606020' }};">
            <div class="row gx-3">
                <div class="col-8 ps-2">
                    <x-icons.tooltip-icon :actAsButton='true' :icon='$type["icon"]["name"]' :color='"dark"'></x-icons.tooltip-icon>
                    <span>{{ __($type['name'] ?? 'Unknown Type') }}</span>
                </div>
                <div class="col-2 ps-2">
                    <x-icons.tooltip-icon :actAsButton='true' :icon='"arrow-" . ($type["is_positive"] ? "up" : "down") . "-circle" . ($score["positive"] > 0 ? "-fill" : "")' :color='"success"'></x-icons.tooltip-icon>
                    <span class="float-end">{{ $score['positive'] }}</span>
                </div>
                <div class="col-2 ps-2">
                    <x-icons.tooltip-icon :actAsButton='true' :icon='"arrow-" . ($type["is_positive"] ? "down" : "up") . "-circle" . ($score["negative"] > 0 ? "-fill" : "")' :color='"danger"'></x-icons.tooltip-icon>
                    <span class="float-end">{{ $score['negative'] }}</span>
                </div>
            </div>
        </div>
            @php($index++)
        @endif
    @endforeach
    @if($index === 1)
        <div class="color-frame br-round-bottom text-center px-2 py-1" style="border-left-width: 2px; border-top-width: 0; border-right-width: 2px; border-bottom-width: 2px; border-style: solid; border-color: {{ $questionnaire['color']['hex'] ?? '#606060' }}; background-color: {{ isset($questionnaire['color']) ? $questionnaire['color']->getTransparentColor() : '#60606020' }};">{{ __('No direct effects have been identified.') }}</div>
    @endif
@endif
