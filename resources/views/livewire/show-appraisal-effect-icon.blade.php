<span class="appraisal-item-icon" data-content-id="{{ $content['id'] ?? 0 }}" data-positive-abs-effect-size="{{ $content->getPositiveAbsEffectSize() }}" data-negative-abs-effect-size="{{ $content->getNegativeAbsEffectSize() }}" data-positive-effect-size="{{ $content->getPositiveEffectSize() }}" data-negative-effect-size="{{ $content->getNegativeEffectSize() }}">
    <i id="effects-icon-{{ $content['id'] ?? 0 }}" class="bi-question-circle text-dark" data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"{{ config('settings.tooltips.delay') + 100 }}", "hide":"0"}' data-bs-html="true" style="font-size: 0.8rem; vertical-align: middle;"></i>
    <div x-data="appraisalIconData()" x-init="initializeIcon({{ $content['id'] ?? 0 }})"></div>
</span>

@script
<script defer>
    window.appraisalIconData = () => {
        return {
            initializeIcon (contentId) {
                updateSummary(contentId)
                updateIcons(contentId)
            }
        }
    }
</script>
@endscript