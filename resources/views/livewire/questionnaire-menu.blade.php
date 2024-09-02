<div>
    @php($index = $yPosition)
    @php($membership = $stage['membership'])
    @php($project = $membership['project'])
    @foreach($stage->getQuestionnaires() as $q)
        @if($stage['type']['shortname'] === 'screening')
            @php($completed = $stage->hasCompletedQuestionnaire($q))
            <div class="position-fixed questionnaire-button" data-left="{{ config('settings.buttons.section.position.x') * (1 + 2 * ($index % 2)) }}" style="left: -60px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') * 0.5 }}px;">
                <x-buttons.round-icon-form-action :action='"/screening/view/" . $membership["id"] . "/" . $q["stage_order_id"]' :icon='$completed ? "check-lg" : ($q["icon"]["name"] ?? "x")' :colorCode='$q["color"]' :tooltip='$q["name"] . "<br>(" . __(":percent completed", ["percent" => number_format($stage->getProgressForQuestionnaire($q) * 100, "0") . " %"]) . ")"' :disabled='$currentPage === "q-" . $q["id"]'></x-buttons.round-icon-form-action>
            </div>
            @php($index++)
        @elseif($stage['type']['shortname'] === 'appraisal')
            @if(isset($q['screeningQuestionnaire']) && $q['screeningQuestionnaire']->hasFocusedContent($project))
                @php($completed = $stage->hasCompletedQuestionnaire($q))
                <div class="position-fixed questionnaire-button" data-left="{{ config('settings.buttons.section.position.x') * (1 + 2 * ($index % 2)) }}" style="left: -60px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') * 0.5 }}px;">
                    <x-buttons.round-icon-form-action :action='"/appraisal/view/" . $membership["id"] . "/" . $q["stage_order_id"]' :icon='$completed ? "check-lg" : ($q["icon"]["name"] ?? "x")' :colorCode='$q["color"]' :tooltip='$q["name"] . "<br>(" . __(":percent completed", ["percent" => number_format($stage->getProgressForQuestionnaire($q) * 100, "0") . " %"]) . ")"' :disabled='$currentPage === "q-" . $q["id"]'></x-buttons.round-icon-form-action>
                </div>
                @php($index++)
            @endif
        @endif
    @endforeach
    <div class="position-fixed questionnaire-button" data-left="{{ config('settings.buttons.section.position.x') * (1 + 2 * ($index % 2)) }}" style="left: -60px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') * 0.5 }}px;">
        <x-buttons.round-icon-form-action :action='"/" . $stage["type"]["shortname"] . "/summary/" . $membership["id"]' :icon='"clipboard-data"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Summary")])' :disabled='$currentPage === "summary"'></x-buttons.round-icon-form-action>
    </div>
    @php($index++)
    <div class="position-fixed questionnaire-button" data-left="{{ config('settings.buttons.section.position.x') * (1 + 2 * ($index % 2)) }}" style="left: -60px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') * 0.5 }}px;">
        <x-buttons.round-icon-form-action :action='"/" . $stage["type"]["shortname"] . "/report/" . $stage["membership"]["project"]["id"]' :onClick='"showLoading()"' :icon='"journal-bookmark-fill"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Report")])' :disabled='$currentPage === "report"'></x-buttons.round-icon-form-action>
    </div>
    @php($index++)
    <div class="position-fixed questionnaire-button" data-left="{{ config('settings.buttons.section.position.x') * (1 + 2 * ($index % 2)) }}" style="left: -60px; top: {{ config('settings.buttons.section.position.y') + $index * config('settings.buttons.gap') * 0.5 }}px;">
        <x-buttons.round-icon-form-action :action='"/" . $stage["type"]["shortname"] . "/comments/" . $stage["membership"]["project"]["id"]' :icon='"chat-dots-fill"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Comments")])' :disabled='$currentPage === "comments"'></x-buttons.round-icon-form-action>
    </div>
    <div x-data="menuData()" x-init="showButton()"></div>
</div>

@script
<script>
    window.menuData = () => {
        return {
            showButton () {
                $('#show-questionnaire-buttons > span > button').prop('disabled', false)
                reinitializeTooltips()
            }
        }
    }
</script>
@endscript
