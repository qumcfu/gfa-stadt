<script>

    $( document ).ready(function() {
        initLabels(0)
        initData(0)
        if({{ $chartActive }} === 1) {
            showAppraisalChart()
        }
    })

    function showAppraisalChart() {
        showChart(0)
        addData(0)
    }

    let appraisalChart = document.getElementById('appraisal-chart')
    appraisalChart.addEventListener('show.bs.collapse', function (event) {
        $('#left-icon').fadeOut(200, function() {
            $(this).removeClass('bi-caret-down').addClass('bi-caret-up').fadeIn(200)
        })
        $('#right-icon').fadeOut(200, function() {
            $(this).removeClass('bi-caret-down').addClass('bi-caret-up').fadeIn(200)
        })

        $('#chart-bar').fadeOut(200, function() {
            $(this).text('{{ __("Hide summary chart") }}').fadeIn(200)
        })
    })

    appraisalChart.addEventListener('shown.bs.collapse', function (event) {
        showAppraisalChart()
        saveChartActive(1)
    })

    appraisalChart.addEventListener('hide.bs.collapse', function (event) {
        destroyChart(0)
        saveChartActive(0)
        $('#left-icon').fadeOut(200, function() {
            $(this).removeClass('bi-caret-up').addClass('bi-caret-down').fadeIn(200)
        })
        $('#right-icon').fadeOut(200, function() {
            $(this).removeClass('bi-caret-up').addClass('bi-caret-down').fadeIn(200)
        })
        $('#chart-bar').fadeOut(200, function() {
            $(this).text('{{ __("Show summary chart") }}').fadeIn(200)
        })
    })

    function saveChartActive(active) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/configurations/save/screening/chart/" + active,
            data : { },
            type : 'PUT',
            dataType : 'text',
            success : function(){

            }
        })
    }
</script>
