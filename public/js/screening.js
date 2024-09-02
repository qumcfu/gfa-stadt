// custom functions for screening

// show and hide questionnaire buttons
function unfoldButtons() {
    let index = 0
    $('.questionnaire-button').each(function() {
        let left = $(this).data('left')
        $(this).delay(index * 25 + 50 * (index % 2)).animate({'left': left + 'px' }, 125)
        index++
    })
    $('#show-questionnaire-buttons').hide(100)
    $('#hide-questionnaire-buttons').show(100)
}

function collapseButtons() {
    let buttons = $('.questionnaire-button')
    let index = buttons.length - 1
    buttons.each(function() {
        $(this).delay(index * 25 + 50 * (1 - index % 2)).animate({'left': '-60px' }, 125)
        index--
    })
    $('#show-questionnaire-buttons').show(100)
    $('#hide-questionnaire-buttons').hide(100)
}
