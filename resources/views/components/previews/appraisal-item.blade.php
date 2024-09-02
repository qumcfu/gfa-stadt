<x-views.appraisal-item :content='$content'></x-views.appraisal-item>

<script>

    $( document ).ready(function() {
        let question = $('#form-appraisal #appraisal-question')
        updateQuestionPreview()

        question.on('input paste', function() {
            updateQuestionPreview()
        })

        function updateQuestionPreview() {
            $('.appraisal-question-text').text(question.val());
        }
    })

</script>
