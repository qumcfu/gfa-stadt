<form action="" method="post" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    @php($next = $questionnaire->getNext())
    @php($previous = $questionnaire->getPrevious())
    @php($membership = $stage['membership'])

    <div class="position-fixed" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
        <x-buttons.round-icon-form-action :action='"/screening/view/" . $membership["id"] . "/" . ($previous["stage_order_id"] ?? 0)' :icon='"arrow-left"' :colorCode='$previous["color"] ?? null' :color='"secondary"' :tooltip='isset($previous) ? __("Back to :thing", ["thing" => __(":quote", ["quote" => $previous["name"] ?? __("Unknown Questionnaire")])]) : ""' :disabled='!isset($previous)'></x-buttons.round-icon-form-action>
    </div>
    <div class="position-fixed" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-form-action :action='"/screening/dashboard/" . $membership["id"]' :icon='"arrow-return-left"' :color='"secondary"' :tooltip='__("To Dashboard")'></x-buttons.round-icon-form-action>
    </div>

    <div class="d-flex">
        <div class="position-fixed" id="show-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-on-click :onClick='"unfoldButtons()"' :icon='"chevron-double-right"' :color='"secondary"' :tooltip='__("Show :things", ["things" => __("Questionnaires")])' :disabled='true'></x-buttons.round-icon-on-click>
        </div>
        <div class="position-fixed" id="hide-questionnaire-buttons" style="left: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px; display: none;">
            <x-buttons.round-icon-on-click :onClick='"collapseButtons()"' :icon='"chevron-double-left"' :color='"secondary"' :tooltip='__("Hide :things", ["things" => __("Questionnaires")])'></x-buttons.round-icon-on-click>
        </div>
        <livewire:questionnaire-menu :stage='$stage' :currentPage='"q-" . $questionnaire["id"]' :yPosition='5' />
    </div>

    <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') }}px;">
        @if(isset($next))
            <x-buttons.round-icon-form-action :action='"/screening/view/" . $membership["id"] . "/" . ($next["stage_order_id"] ?? 0)' :icon='"arrow-right"' :colorCode='$next["color"] ?? null' :color='"secondary"' :tooltip='isset($next) ? __("Continue with :thing", ["thing" => __(":quote", ["quote" => $next["name"]])]) : ""' :disabled='!isset($next)'></x-buttons.round-icon-form-action>
        @else
            <x-buttons.round-icon-form-action :action='"/screening/summary/" . $membership["id"]' :icon='"clipboard-data"' :color='"dark"' :tooltip='__("Show :thing", ["thing" => __("Summary")])'></x-buttons.round-icon-form-action>
        @endif
    </div>
    <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-form-action :action='"/screening/update/" . $membership["id"] . "/" . ($questionnaire["stage_order_id"] ?? 0)' :icon='"save"' :color='"success"' :tooltip='__("Save Changes")'></x-buttons.round-icon-form-action>
    </div>
    <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 2 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#show-info-modal"' :icon='"info-lg"' :color='"secondary"' :tooltip='__("About this tool")'></x-buttons.round-icon-toggle-modal>
    </div>
    <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 3 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#show-project-info-modal-" . $membership["project"]["id"]' :icon='"images"' :color='"secondary"' :tooltip='__("Additional info material")'></x-buttons.round-icon-toggle-modal>
    </div>
    <div class="position-fixed" style="right: {{ config('settings.buttons.section.position.x') }}px; top: {{ config('settings.buttons.section.position.y') + 4 * config('settings.buttons.gap') }}px;">
        <x-buttons.round-icon-toggle-modal :target='"#view-tutorial-video-modal"' :icon='"film"' :color='"info"' :tooltip='__("View tutorial video")'></x-buttons.round-icon-toggle-modal>
    </div>

    {{ $slot }}

    <div class="mt-3">
        @if(isset($previous))
            <button formaction="/screening/view/{{ $membership['id'] }}/{{ $previous['stage_order_id'] }}" class="btn auto-hover float-start {{ (isset($previous['color']) && $previous['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $previous['color']['hex'] ?? '#606060' }}; max-width: 25vw;">{{ __('Back to :thing', ['thing' => __(':quote', ['quote' => $previous['name']])]) }}</button>
        @endif
        @if(isset($next))
            <button formaction="/screening/view/{{ $membership['id'] }}/{{ $next['stage_order_id'] }}" class="btn auto-hover float-end {{ (isset($next['color']) && $next['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $next['color']['hex'] ?? '#606060' }}; max-width: 30vw;">{{ __('Continue with :thing', ['thing' => __(':quote', ['quote' => $next['name']])]) }}</button>
        @else
            <button formaction="/screening/summary/{{ $membership['id'] }}" class="btn btn-dark float-end">{{ __('Show :thing', ['thing' => __('Summary')]) }}</button>
        @endif
    </div>

</form>
