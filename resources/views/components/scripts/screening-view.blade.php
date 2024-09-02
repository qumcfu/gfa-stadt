<script>

    $( document ).ready(function() {

        let darkColor = '#212529'
        let positiveColor = '#198754'
        let mostlyPositiveColor = '#9acd32'
        let neutralColor = '#ffc107'
        let mostlyNegativeColor = '#fd7e14'
        let negativeColor = '#dc3545'
        let potentialColor = '#0d6efd'

        $('.screening-item').each(function() {
            let contentId = $(this).data('content-id')
            let impactYesButton = getImpactRadioButton(contentId, 'yes')
            let impactNoButton = getImpactRadioButton(contentId, 'no')
            let impactUnknownButton = getImpactRadioButton(contentId, 'unknown')

            toggleAdditional(contentId, impactYesButton.prop('checked'))
            toggleCommentsOnly(contentId, impactNoButton.prop('checked') || impactUnknownButton.prop('checked'))
            updateSummary(contentId)
            updateIcons(contentId)
            toggleFormula(contentId, impactYesButton.prop('checked'))
            togglePotentialOverview(contentId, impactYesButton.prop('checked'))

            impactYesButton.on('change', function() {
                toggleAdditional(contentId, true)
                toggleCommentsOnly(contentId, false)
                updateEffectsIcon(contentId)
                updateSummary(contentId)
                toggleFormula(contentId, true)
                togglePotentialOverview(contentId, true)
            })
            impactNoButton.on('change', function() {
                toggleAdditional(contentId, false)
                toggleCommentsOnly(contentId, true)
                updateEffectsIcon(contentId)
                updateSummary(contentId)
                toggleFormula(contentId, false)
                togglePotentialOverview(contentId, false)
            })
            impactUnknownButton.on('change', function() {
                toggleAdditional(contentId, false)
                toggleCommentsOnly(contentId, true)
                updateEffectsIcon(contentId)
                updateSummary(contentId)
                toggleFormula(contentId, false)
                togglePotentialOverview(contentId, false)
            })
            getPotentialRadioButton(contentId, 'yes').on('change', function() {
                updatePotentialIcon(contentId)
                updateSummary(contentId)
            })
            getPotentialRadioButton(contentId, 'no').on('change', function() {
                updatePotentialIcon(contentId)
                updateSummary(contentId)
            })
            getPotentialRadioButton(contentId, 'unknown').on('change', function() {
                updatePotentialIcon(contentId)
                updateSummary(contentId)
            })
            getPositiveScale(contentId).on('change', function() {
                updateEffectsIcon(contentId)
                updatePositiveIcon(contentId)
                updateSummary(contentId)
            })
            getNegativeScale(contentId).on('change', function() {
                updateEffectsIcon(contentId)
                updateNegativeIcon(contentId)
                updatePotentialIcon(contentId)
                updateSummary(contentId)
            })
        })

        $('.vulnerable-group-item').each(function() {
            let contentId = $(this).data('content-id')
            let impactPositiveButton = getImpactRadioButton(contentId, 'positive')
            let impactNegativeButton = getImpactRadioButton(contentId, 'negative')
            let impactNoButton = getImpactRadioButton(contentId, 'no')
            let impactUnknownButton = getImpactRadioButton(contentId, 'unknown')

            toggleComments(contentId, hasBeenRated(contentId, true))
            updateAffectedIcon(contentId)
            updateVulnerableGroupItemSummary(contentId)

            impactPositiveButton.on('change', function() {
                toggleComments(contentId, true)
                updateAffectedIcon(contentId)
                updateVulnerableGroupItemSummary(contentId)
            })
            impactNegativeButton.on('change', function() {
                toggleComments(contentId, true)
                updateAffectedIcon(contentId)
                updateVulnerableGroupItemSummary(contentId)
            })
            impactNoButton.on('change', function() {
                toggleComments(contentId, true)
                updateAffectedIcon(contentId)
                updateVulnerableGroupItemSummary(contentId)
            })
            impactUnknownButton.on('change', function() {
                toggleComments(contentId, true)
                updateAffectedIcon(contentId)
                updateVulnerableGroupItemSummary(contentId)
            })
        })

        function toggleAdditional(contentId, state) {
            getPositiveLabel(contentId).prop('hidden', !state)
            getNegativeLabel(contentId).prop('hidden', !state)
            togglePositiveScale(contentId, state)
            toggleNegativeScale(contentId, state)
            togglePotential(contentId, state)
            toggleComments(contentId, state)
        }

        function toggleComments(contentId, state) {
            getComments(contentId).prop('hidden', !state)
        }

        function toggleCommentsOnly(contentId, state) {
            getCommentsOnly(contentId).prop('hidden', !state)
            getCommentsOnly(contentId).find(':input').each(function() {
                $(this).prop('disabled', !state)
            })
        }

        function togglePositiveScale(contentId, state) {
            getPositiveScale(contentId).prop('hidden', !state)
        }

        function toggleNegativeScale(contentId, state) {
            getNegativeScale(contentId).prop('hidden', !state)
            getNegativeScale(contentId).find(':input').each(function() {
                $(this).prop('disabled', !state)
            })
        }

        function togglePotential(contentId, state) {
            getPotentialBlock(contentId).prop('hidden', !state)
        }

        function toggleFormula(contentId, state) {
            getFormula(contentId).prop('hidden', !state)
        }

        function togglePotentialOverview(contentId, state) {
            getPotentialOverviewLabel(contentId).prop('hidden', !state)
            getIcon(contentId, 'potential').prop('hidden', !state)
        }

        function updateIcons(contentId) {
            updateEffectsIcon(contentId)
            updatePositiveIcon(contentId)
            updateNegativeIcon(contentId)
            updatePotentialIcon(contentId)
        }

        function updateEffectsIcon(contentId) {
            let positiveScore = getPositiveScore(contentId)
            let negativeScore = getNegativeScore(contentId)
            reinitializeTooltips()
            getIcon(contentId, 'effects').removeClass().addClass(getEffectsIconClass(contentId)).css('color', getEffectsIconColor(positiveScore, negativeScore)).prop('title', getEffectsIconTooltip(contentId, positiveScore, negativeScore))
        }

        function updateAffectedIcon(contentId) {
            let positiveScore = getPositiveScore(contentId, true)
            let negativeScore = getNegativeScore(contentId, true)
            reinitializeTooltips()
            getIcon(contentId, 'effects').removeClass().addClass(getEffectsIconClass(contentId, true)).css('color', getEffectsIconColor(positiveScore, negativeScore)).prop('title', getAffectedIconTooltip(contentId, positiveScore, negativeScore))
        }

        function updatePositiveIcon(contentId) {
            let positiveScore = getPositiveScore(contentId)
            reinitializeTooltips()
            getIcon(contentId, 'positive').removeClass().addClass(getPositiveIconClass(positiveScore)).css('color', getPositiveIconColor(positiveScore)).prop('title', getPositiveIconTooltip(positiveScore))
        }

        function updateNegativeIcon(contentId) {
            let negativeScore = getNegativeScore(contentId)
            reinitializeTooltips()
            getIcon(contentId, 'negative').removeClass().addClass(getNegativeIconClass(negativeScore)).css('color', getNegativeIconColor(negativeScore)).prop('title', getNegativeIconTooltip(negativeScore))
        }

        function updatePotentialIcon(contentId) {
            reinitializeTooltips()
            getIcon(contentId, 'potential').removeClass().addClass(getPotentialIconClass(contentId)).css('color', getPotentialIconColor(contentId)).prop('title', getPotentialIconTooltip(contentId))
        }

        function updateSummary(contentId) {
            let summary = getSummary(contentId)
            if(!hasBeenRated(contentId)) summary.html('{{ __("You have not rated this item yet.") }}')
            else if(hasUnknownImpact(contentId)) summary.html('{{ __("The project's effects on this are unknown.") }}')
            else if(!hasImpact(contentId)) summary.html('{{ __("The project has no effects on this.") }}')
            else {
                let summaryText = '{{ __("The project's effects on this are") }} <b>'
                summaryText += effectsToString(getPositiveScore(contentId), getNegativeScore(contentId))
                summaryText += '</b> {{ __("and") }} <b>'
                summaryText += importanceToString(getImportance(contentId))
                summaryText += '</b>.'

                if(hasPotentialBeenRated(contentId)) {
                    summaryText += ' '
                    if(hasUnknownPotential(contentId)) summaryText += '{{ __("It is unclear whether there is potential for improvement.") }}'
                    else if(!hasPotential(contentId)) summaryText += '{{ __("There is no potential for improvement.") }}'
                    else if(hasPotential(contentId)) summaryText += '{{ __("There is potential for improvement.") }}'
                }

                summary.html(summaryText)
            }
        }

        function updateVulnerableGroupItemSummary(contentId) {
            let summary = getSummary(contentId)
            if(!hasBeenRated(contentId, true)) summary.html('{{ __("You have not rated this item yet.") }}')
            else if(hasUnknownImpact(contentId)) summary.html('{{ __("It is unknown whether this group will be affected by the impacts.") }}')
            else if(!hasImpact(contentId, true)) summary.html('{{ __("This group is not affected by the impacts.") }}')
            else {
                let summaryText = '{{ __("This group is") }} <b>'
                summaryText += effectsToString(getPositiveScore(contentId, true), getNegativeScore(contentId, true))
                summaryText += '</b> {{ __("affected by the impact") }}.'

                summary.html(summaryText)
            }
        }

        function hasBeenRated(contentId, isVulnerableGroupItem = false) {
            if(isVulnerableGroupItem) return getImpactRadioButton(contentId, 'positive').prop('checked') || getImpactRadioButton(contentId, 'negative').prop('checked') || getImpactRadioButton(contentId, 'no').prop('checked') || getImpactRadioButton(contentId, 'unknown').prop('checked')
            return getImpactRadioButton(contentId, 'yes').prop('checked') || getImpactRadioButton(contentId, 'no').prop('checked') || getImpactRadioButton(contentId, 'unknown').prop('checked')
        }

        function hasImpact(contentId, isVulnerableGroupItem = false) {
            if(isVulnerableGroupItem) return hasPositiveImpact(contentId) || hasNegativeImpact(contentId)
            return getImpactRadioButton(contentId, 'yes').prop('checked')
        }

        function hasPositiveImpact(contentId) {
            // vulnerable group items only!
            return getImpactRadioButton(contentId, 'positive').prop('checked')
        }

        function hasNegativeImpact(contentId) {
            // vulnerable group items only!
            return getImpactRadioButton(contentId, 'negative').prop('checked')
        }

        function hasUnknownImpact(contentId) {
            return getImpactRadioButton(contentId, 'unknown').prop('checked')
        }

        function getPositiveScore(contentId, isVulnerableGroupItem = false) {
            if(isVulnerableGroupItem) return hasPositiveImpact(contentId) ? 5.0 : 0.0;
            return getPositiveScale(contentId).val()
        }

        function getNegativeScore(contentId, isVulnerableGroupItem = false) {
            if(isVulnerableGroupItem) return hasNegativeImpact(contentId) ? 5.0 : 0.0;
            return getNegativeScale(contentId).val()
        }

        function getImportance(contentId, isVulnerableGroupItem = false) {
            return Math.max(getPositiveScore(contentId, isVulnerableGroupItem), getNegativeScore(contentId, isVulnerableGroupItem))
        }

        function hasPotentialBeenRated(contentId) {
            return getPotentialRadioButton(contentId, 'yes').prop('checked') || getPotentialRadioButton(contentId, 'no').prop('checked') || getPotentialRadioButton(contentId, 'unknown').prop('checked')
        }

        function hasPotential(contentId) {
            return getPotentialRadioButton(contentId, 'yes').prop('checked')
        }

        function hasUnknownPotential(contentId) {
            return getPotentialRadioButton(contentId, 'unknown').prop('checked')
        }

        function getEffectsIconClass(contentId, isVulnerableGroupItem = false) {
            if(!hasBeenRated(contentId, isVulnerableGroupItem)) return "bi-circle text-secondary"
            else if(hasUnknownImpact(contentId)) return "bi-question-circle text-dark"
            else if(!hasImpact(contentId, isVulnerableGroupItem)) return "bi-x-circle text-dark"

            let importanceScore = getImportance(contentId, isVulnerableGroupItem)
            let icon = "bi-circle"
            if(importanceScore <= 1.0) icon += ''
            else if(importanceScore <= 3.0) icon += '-half'
            else icon += '-fill'
            return icon
        }

        function getPositiveIconClass(positiveScore) {
            let icon = "bi-circle"
            if(positiveScore <= 1.0) icon += ''
            else if(positiveScore <= 3.0) icon += '-half'
            else icon += '-fill'
            return icon
        }

        function getNegativeIconClass(negativeScore) {
            let icon = "bi-circle"
            if(negativeScore <= 1.0) icon += ''
            else if(negativeScore <= 3.0) icon += '-half'
            else icon += '-fill'
            return icon
        }

        function getPotentialIconClass(contentId) {
            if(!hasPotentialBeenRated(contentId)) return "bi-circle text-secondary"
            else if(hasUnknownPotential(contentId)) return "bi-question-circle text-dark"
            else if(!hasPotential(contentId)) return "bi-x-circle text-dark"

            let negativeScore = getNegativeScore(contentId)
            let icon = "bi-circle"
            if(negativeScore <= 1.0) icon += ''
            else if(negativeScore <= 3.0) icon += '-half'
            else icon += '-fill'
            return icon
        }

        function getEffectsIconColor(positiveScore, negativeScore) {
            let difference = positiveScore - negativeScore
            if (positiveScore <= 0.001 && negativeScore <= 0.001) return darkColor
            if (positiveScore <= 0.001 && negativeScore > 0.0) return negativeColor
            if (positiveScore > 0.0 && negativeScore <= 0.001) return positiveColor

            if (difference < -0.5) return mostlyNegativeColor
            if (difference > 0.5) return mostlyPositiveColor

            return neutralColor
        }

        function getPositiveIconColor(positiveScore) {
            if (positiveScore <= 0.001) return darkColor
            return positiveColor
        }

        function getNegativeIconColor(negativeScore) {
            if (negativeScore <= 0.001) return darkColor
            return negativeColor
        }

        function getPotentialIconColor(contentId) {
            if(!hasPotentialBeenRated(contentId) || !hasPotential(contentId) || hasUnknownPotential(contentId)) return darkColor
            return potentialColor
        }

        function getEffectsIconTooltip(contentId, positiveScore, negativeScore) {
            if(!hasBeenRated(contentId)) return '{{ __("You have not rated this item yet.") }}'
            else if(hasUnknownImpact(contentId)) return '{{ __("The project's effects on this are unknown.") }}'
            else if(!hasImpact(contentId)) return '{{ __("The project has no effects on this.") }}'
            return getTooltipString('{{ __("Effects") }}', effectsToString(positiveScore, negativeScore) + ' {{ __("and") }} ' + importanceToString(getImportance(contentId)))
        }

        function getAffectedIconTooltip(contentId, positiveScore, negativeScore) {
            if(!hasBeenRated(contentId, true)) return '{{ __("You have not rated this item yet.") }}'
            else if(hasUnknownImpact(contentId)) return '{{ __("It is unknown whether this group will be affected by the impacts.") }}'
            else if(!hasImpact(contentId, true)) return getTooltipString('{{ __("This group is") }}', '{{ __("not affected") }}')
            return getTooltipString('{{ __("This group is") }}', affectedToString(positiveScore, negativeScore))
        }

        function getPositiveIconTooltip(positiveScore) {
            return getTooltipString('{{ __("Positive Effects") }}', positiveScore + ' (' + importanceToString(positiveScore) + ')')
        }

        function getNegativeIconTooltip(negativeScore) {
            return getTooltipString('{{ __("Negative Effects") }}', negativeScore + ' (' + importanceToString(negativeScore) + ')')
        }

        function getPotentialIconTooltip(contentId) {
            if(hasUnknownPotential(contentId)) return '{{ __("It is unclear whether there is potential for improvement.") }}'
            else if(!hasPotential(contentId)) return '{{ __("There is no potential for improvement.") }}'
            else if(hasPotential(contentId)) return getTooltipString('{{ __("Potential for improvement") }}', potentialToString(getNegativeScore(contentId)))
            return '{{ __("undefined") }}'
        }

        function getTooltipString(heading, value) {
            return '<span class="px-2 pt-2 fw-bold">' + heading + (value.length > 0 ? ':</span><br><span class="px-2">' + value : '') + '</span>'
        }

        function effectsToString(positive, negative) {
            if(positive > 0 && negative < 1) return '{{ __('positive') }}'
            if(positive > negative && negative > 0) return '{{ __('mostly positive') }}'
            if(positive === negative) return '{{ __('neutral') }}'
            if(positive < negative  && positive > 0) return '{{ __('mostly negative') }}'
            if(positive < 1 && negative > 0) return '{{ __('negative') }}'
            return '{{ __("undefined") }}'
        }

        function importanceToString(importance) {
            switch(Math.round(importance)) {
                case 0: return '{{ __("not important") . " " . __("or") . " " . __("not existent") }}'
                case 1: return '{{ __("rather unimportant") }}'
                case 2: return '{{ __("less important") }}'
                case 3: return '{{ __("somewhat important") }}'
                case 4: return '{{ __("quite important") }}'
                case 5: return '{{ __("very important") }}'
                default: return '{{ __("undefined") }}'
            }
        }

        function potentialToString(negativeScore) {
            let potential = Math.max(negativeScore, 1)
            switch(Math.round(potential)) {
                case 0: return '0 ({{ __("not existent") }})'
                case 1: return '1 ({{ __("very low") }})'
                case 2: return '2 ({{ __("low") }})'
                case 3: return '3 ({{ __("some") }})'
                case 4: return '4 ({{ __("high") }})'
                case 5: return '5 ({{ __("very high") }})'
                default: return '{{ __("undefined") }}'
            }
        }

        function affectedToString(positive, negative) {
            if(positive > negative) return '{{ __(":type affected", ["type" => __("positively")]) }}'
            if(negative > positive) return '{{ __(":type affected", ["type" => __("negatively")]) }}'
            return '{{ __("undefined") }}'
        }

        function getImpactRadioButton(contentId, type) {
            return $('#screening-' + contentId + '-impact-' + type)
        }

        function getPotentialRadioButton(contentId, type) {
            return $('#screening-' + contentId + '-potential-' + type)
        }

        function getPositiveLabel(contentId) {
            return $('#screening-' + contentId + '-positive')
        }

        function getPositiveScale(contentId) {
            return $('#screening-' + contentId + '-positive-impact')
        }

        function getNegativeScale(contentId) {
            return $('#screening-' + contentId + '-negative-impact')
        }

        function getNegativeLabel(contentId) {
            return $('#screening-' + contentId + '-negative')
        }

        function getPotentialBlock(contentId) {
            return $('#screening-' + contentId + '-potential')
        }

        function getPotentialOverviewLabel(contentId) {
            return $('#potential-label-' + contentId)
        }

        function getComments(contentId) {
            return $('#screening-' + contentId + '-comments')
        }

        function getCommentsOnly(contentId) {
            return $('#screening-' + contentId + '-comments-only')
        }

        function getSummary(contentId) {
            return $('#summary-' + contentId)
        }

        function getIcon(contentId, type) {
            return $('#' + type + '-icon-' + contentId)
        }

        function getFormula(contentId) {
            return $('#formula-' + contentId)
        }
    })

    // when a comment is entered, copy it to the particular hidden textarea
    $('.screening-comments').each(function() {
        let contentId = $(this).data('content-id')
        $(this).on('input paste', function() {
            $('#comments-only-' + contentId).val($(this).val())
        })
    })

    $('.screening-comments-only').each(function() {
        let contentId = $(this).data('content-id')
        $(this).on('input paste', function() {
            $('#comments-' + contentId).val($(this).val())
        })
    })

</script>
