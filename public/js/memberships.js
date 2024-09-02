// custom functions for membership management

function activateStage(type, membershipId, stageId) {
    $('.stage-membership-' + membershipId + ' .' + type + '-switch').each(function() {
        $(this).prop('checked', $(this).prop('checked') && $(this).val() == stageId)
    })
}
