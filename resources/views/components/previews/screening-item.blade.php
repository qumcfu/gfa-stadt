<x-views.screening-item :content='$content'></x-views.screening-item>

<script>

    $( document ).ready(function() {
        let question = $('#form-screening #screening-question')
        updateQuestionPreview()

        question.on('input paste', function() {
            updateQuestionPreview()
        })

        function updateQuestionPreview() {
            $('.screening-question-text').text(question.val());
        }
    })

</script>
