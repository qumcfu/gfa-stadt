<script>

    let darkColor = '#212529'
    let positiveColor = '#198754'
    let mostlyPositiveColor = '#9acd32'
    let neutralColor = '#ffc107'
    let mostlyNegativeColor = '#fd7e14'
    let negativeColor = '#dc3545'

    $( document ).ready(function() {

        let info = document.getElementById('appraisal-info')

        info.addEventListener('show.bs.collapse', function (event) {
            $('#left-icon').fadeOut(200, function() {
                $(this).removeClass('bi-caret-down-fill').addClass('bi-caret-up-fill').fadeIn(200)
            })
            $('#right-icon').fadeOut(200, function() {
                $(this).removeClass('bi-caret-down-fill').addClass('bi-caret-up-fill').fadeIn(200)
            })

            $('#upper-info-bar').fadeOut(200, function() {
                $(this).text('{{ __("Hide :thing", ["thing" => __("Overview of the interdependencies")]) }}').fadeIn(200)
            })
        })

        info.addEventListener('hide.bs.collapse', function (event) {
            $('#left-icon').fadeOut(200, function() {
                $(this).removeClass('bi-caret-up-fill').addClass('bi-caret-down-fill').fadeIn(200)
            })
            $('#right-icon').fadeOut(200, function() {
                $(this).removeClass('bi-caret-up-fill').addClass('bi-caret-down-fill').fadeIn(200)
            })
            $('#upper-info-bar').fadeOut(200, function() {
                $(this).text('{{ __("Show :thing", ["thing" => __("Overview of the interdependencies")]) }}').fadeIn(200)
            })
        })

        $('.appraisal-item').each(function() {
            let contentId = $(this).data('content-id')
            let impactYesButton = getImpactRadioButton(contentId, 'yes')
            let impactNoButton = getImpactRadioButton(contentId, 'no')
            let impactUnknownButton = getImpactRadioButton(contentId, 'unknown')
            let impactIrrelevantButton = getImpactRadioButton(contentId, 'irrelevant')

            impactYesButton.on('change', function() {
                updateEffectsIcon(contentId)
                updateSummary(contentId)
            })
            impactNoButton.on('change', function() {
                updateEffectsIcon(contentId)
                updateSummary(contentId)
            })
            impactUnknownButton.on('change', function() {
                updateEffectsIcon(contentId)
                updateSummary(contentId)
            })
            impactIrrelevantButton.on('change', function() {
                updateEffectsIcon(contentId)
                updateSummary(contentId)
            })
        })
    })

    function toggleComments(contentId, state) {
        getComments(contentId).prop('hidden', !state)
    }

    function updateIcons(contentId) {
        updateEffectsIcon(contentId)
    }

    function updateEffectsIcon(contentId) {
        reinitializeTooltips()
        let effectSize = getPositiveEffectSize(contentId)
        let absEffectSize = getPositiveAbsEffectSize(contentId)
        if(!hasImpact(contentId)) {
            effectSize = getNegativeEffectSize(contentId)
            absEffectSize = getNegativeAbsEffectSize(contentId)
        }
        getIcon(contentId, 'effects').removeClass().addClass(getEffectsIconClass(contentId, effectSize, absEffectSize)).css('color', getEffectsIconColor(effectSize, absEffectSize)).prop('title', getEffectsIconTooltip(contentId, effectSize, absEffectSize))
    }

    function updateSummary(contentId) {
        let summary = getSummary(contentId)
        let summaryText = ''
        if(!hasBeenRated(contentId)) summaryText = '{{ __("You have not rated this item yet.") }}'
        else if(hasUnknownImpact(contentId))  summaryText = '{{ __("The project's effects on this are unknown.") }}'
        else if(isIrrelevant(contentId))  summaryText = '{{ __("This is not relevant.") }}'
        else if(!hasImpact(contentId)) {
            let absEffectSize = getNegativeAbsEffectSize(contentId)
            if(absEffectSize === 0)  summaryText = '{{ __("The project has no effects on this.") }}'
            else {
                let effectSize = getNegativeEffectSize(contentId)
                summaryText = '{{ __("The project's effects on this are") }}' + ' ' + effectsToString(effectSize, absEffectSize) + '.'
            }
        } else {
            let effectSize = getPositiveEffectSize(contentId)
            let absEffectSize = getPositiveAbsEffectSize(contentId)
            summaryText = '{{ __("The project's effects on this are") }}' + ' ' + effectsToString(effectSize, absEffectSize) + '.'
        }
        summary.html(summaryText)
    }

    function hasBeenRated(contentId) {
        return getImpactRadioButton(contentId, 'yes').prop('checked') || getImpactRadioButton(contentId, 'no').prop('checked') || getImpactRadioButton(contentId, 'unknown').prop('checked') || getImpactRadioButton(contentId, 'irrelevant').prop('checked')
    }

    function hasImpact(contentId) {
        return getImpactRadioButton(contentId, 'yes').prop('checked')
    }

    function hasUnknownImpact(contentId) {
        return getImpactRadioButton(contentId, 'unknown').prop('checked')
    }

    function isIrrelevant(contentId) {
        return getImpactRadioButton(contentId, 'irrelevant').prop('checked')
    }

    function getEffectsIconColor(effectSize, absEffectSize) {
        if(absEffectSize === 0) return darkColor;
        if(effectSize === 0) return neutralColor;
        if(effectSize > 0 && absEffectSize === effectSize) return positiveColor;
        if(effectSize > 0 && absEffectSize > effectSize) return mostlyPositiveColor;
        if(effectSize < 0 && absEffectSize > Math.abs(effectSize)) return mostlyNegativeColor;
        if(effectSize < 0 && absEffectSize === Math.abs(effectSize)) return negativeColor;

        return darkColor;
    }

    function getEffectsIconClass(contentId, effectSize, absEffectSize) {
        if(!hasBeenRated(contentId)) return "bi-circle text-secondary"
        else if(hasUnknownImpact(contentId)) return "bi-question-circle text-dark"
        else if(isIrrelevant(contentId)) return "bi-x-circle text-secondary"
        else if(!hasImpact(contentId) && absEffectSize === 0) return "bi-x-circle text-dark"
        return "bi-circle-fill"
    }

    function getEffectsIconTooltip(contentId, effectSize, absEffectSize) {
        if(!hasBeenRated(contentId)) return '{{ __("You have not rated this item yet.") }}'
        else if(hasUnknownImpact(contentId)) return '{{ __("The project's effects on this are unknown.") }}'
        else if(isIrrelevant(contentId)) return '{{ __("This is not relevant.") }}'
        else if(!hasImpact(contentId) && absEffectSize === 0) return '{{ __("The project has no effects on this.") }}'
        return getTooltipString('{{ __("Effects") }}', effectsToString(effectSize, absEffectSize))
    }

    function getTooltipString(heading, value) {
        return '<span class="px-2 pt-2 fw-bold">' + heading + (value.length > 0 ? ':</span><br><span class="px-2">' + value : '') + '</span>'
    }

    function effectsToString(effectSize, absEffectSize) {
        if(absEffectSize === 0) return '{{ __('not existent') }}'
        if(effectSize === 0) return '{{ __('both positive and negative') }}'
        if(effectSize > 0 && absEffectSize === effectSize) return '{{ __('positive') }}'
        if(effectSize > 0 && absEffectSize > effectSize) return '{{ __('mostly positive') }}'
        if(effectSize < 0 && absEffectSize < Math.abs(effectSize)) return '{{ __('mostly negative') }}'
        if(effectSize < 0 && absEffectSize === Math.abs(effectSize)) return '{{ __('negative') }}'
        return '{{ __("undefined") }}'
    }

    function getImpactRadioButton(contentId, type) {
        return $('#appraisal-' + contentId + '-impact-' + type)
    }

    function getComments(contentId) {
        return $('#appraisal-' + contentId + '-comments')
    }

    function getSummary(contentId) {
        return $('#summary-' + contentId)
    }

    function getIcon(contentId, type) {
        return $('#' + type + '-icon-' + contentId)
    }

    function getPositiveEffectSize(contentId) {
        return $('.appraisal-item-icon[data-content-id=' + contentId + ']').data('positive-effect-size')
    }

    function getPositiveAbsEffectSize(contentId) {
        return $('.appraisal-item-icon[data-content-id=' + contentId + ']').data('positive-abs-effect-size')
    }

    function getNegativeEffectSize(contentId) {
        return $('.appraisal-item-icon[data-content-id=' + contentId + ']').data('negative-effect-size')
    }

    function getNegativeAbsEffectSize(contentId) {
        return $('.appraisal-item-icon[data-content-id=' + contentId + ']').data('negative-abs-effect-size')
    }

</script>
