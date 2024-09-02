// initialize colors
// not necessary anymore
$('.color-heading.screening-heading').each(function(){
    let questionnaireId = $(this).data('questionnaire-id')
    updateQuestionnaire(questionnaireId)
})

$('.relevant-item-check').each(function(){
    $(this).on('change', function(){
        let questionnaireId = $(this).data('questionnaire-id')
        let contentId = $(this).data('content-id')
        updateQuestionnaire(questionnaireId)
    })
})

function updateQuestionnaire(id){
    let questionnaireHeading = $('#questionnaire-heading-' + id)

    let checkedCount = 0
    $('.questionnaire-check-' + id).each(function(){
        if($(this).is(':checked')) checkedCount++
    })

    let color = checkedCount > 0 ? questionnaireHeading.data('color') : '#808080'
    questionnaireHeading.css('background-color', `${color}`)
    $('.color-frame-' + id).each(function(){
        $(this).css({'background-color': `${color}20`, 'border-color': `${color}`})
    })
}
