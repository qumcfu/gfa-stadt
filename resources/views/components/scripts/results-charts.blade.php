<script>

    let valueTypes = ['positive', 'negative', 'potential']
    let tdClasses = ['table-success', 'table-danger', 'table-primary']
    let defaultLabels = [
        '{{ " " . __("no effects") }}',
        '{{ " " . __("rather unimportant") }}',
        '{{ " " . __("less important") }}',
        '{{ " " . __("somewhat important") }}',
        '{{ " " . __("quite important") }}',
        '{{ " " . __("very important") }}',
        '{{ " " . __("unknown") }}',
        '{{ " " . __("not rated") }}'
    ]
    let vgPositiveLabels = [
        '{{ " " . __("not :type affected", ["type" => __("positively")]) }}',
        '{{ " " . __(":type affected", ["type" => __("positively")]) }}',
        ' –', ' –', ' –', ' –',
        '{{ " " . __("unknown") }}',
        '{{ " " . __("no answer") }}'
    ]
    let vgNegativeLabels = [
        '{{ " " . __("not :type affected", ["type" => __("negatively")]) }}',
        '{{ " " . __(":type affected", ["type" => __("negatively")]) }}',
        ' –', ' –', ' –', ' –',
        '{{ " " . __("unknown") }}',
        '{{ " " . __("not rated") }}'
    ]
    let defaultPotentialLabels = [
        '{{ " " . __("no potential for improvement") }}',
        '{{ " " . __("low potential for improvement") }}',
        '{{ " " . __("some potential for improvement") }}',
        '{{ " " . __("average potential for improvement") }}',
        '{{ " " . __("high potential for improvement") }}',
        '{{ " " . __("great potential for improvement") }}',
        '{{ " " . __("unknown") }}',
        '{{ " " . __("not rated") }}'
    ]
    let vgPotentialLabels = [
        ' –', ' –', ' –', ' –', ' –', ' –', ' –',
        '{{ " " . __("not available") }}'
    ]
    let resultsData = []
    resultsData['item'] = [[]]
    resultsData['questionnaire'] = [[]]
    let resultsCharts = []
    resultsCharts['item'] = [[]]
    resultsCharts['questionnaire'] = [[]]

    function initCharts(id, chartType) {
        resultsCharts[chartType][id] = []
    }

    function setChartData(id, chartType, positiveData, negativeData, potentialData) {
        resultsData[chartType][id] = []
        resultsData[chartType][id]['positive'] = positiveData
        resultsData[chartType][id]['negative'] = negativeData
        resultsData[chartType][id]['potential'] = potentialData
    }

    window.onload = function onLoad() {

        let results = document.getElementsByClassName('show-results-modal');

        for (let i = 0; i < results.length; i++) {
            results[i].addEventListener('show.bs.modal', function (event) {

                let chartId = results[i].getAttribute('data-chart-id')
                let chartType = results[i].getAttribute('data-chart-type')
                let contentType = results[i].getAttribute('data-content-type')
                if(chartType === 'item') {
                    // set back button if necessary
                    let button = event.relatedTarget
                    let questionnaireId = button.getAttribute('data-modal-id')
                    let backButton = $('#results-back-button-' + chartId)
                    backButton.prop('hidden', questionnaireId == 0)
                    if(questionnaireId != 0) backButton.attr('data-bs-target', '#show-questionnaire-results-modal-' + questionnaireId)
                }

                resultsCharts[chartType][chartId].forEach(function(item) {
                    item.destroy()
                })

                let chartData = {
                    positive: {
                        labels: (contentType === 'vulnerable-group-item' ? vgPositiveLabels : defaultLabels),
                        datasets: [{
                            data: resultsData[chartType][chartId]['positive'],
                            backgroundColor: ['#80808080', (contentType === 'vulnerable-group-item' ? '#198754ff' : '#19875433'), '#19875466', '#19875499', '#198754d2', '#198754ff', '#808080c0', '#808080ff'],
                            hoverOffset: 4
                        }]
                    },
                    negative: {
                        labels: (contentType === 'vulnerable-group-item' ? vgNegativeLabels : defaultLabels),
                        datasets: [{
                            data: resultsData[chartType][chartId]['negative'],
                            backgroundColor: ['#80808080', (contentType === 'vulnerable-group-item' ? '#dc3545ff' : '#dc354533'), '#dc354566', '#dc354599', '#dc3545d2', '#dc3545ff', '#808080c0', '#808080ff'],
                            hoverOffset: 4
                        }]
                    },
                    potential: {
                        labels: contentType === 'vulnerable-group-items' ? vgPotentialLabels : defaultPotentialLabels,
                        datasets: [{
                            data: resultsData[chartType][chartId]['potential'],
                            backgroundColor: ['#80808080', '#0d6efd33', '#0d6efd66', '#0d6efd99', '#0d6efdd2', '#0d6efdff', '#808080c0', '#808080ff'],
                            hoverOffset: 4
                        }]
                    }
                }

                valueTypes.forEach(function(item, index){

                    let max = 0
                    let score = $('#' + chartType + '-results-row-' + chartId +  ' .' + item + '-score')
                    score.each(function () {
                        let value = $(this).attr('data-value')
                        if (value > 0 && value > max) max = value
                    })
                    if(max > 0){
                        score.each(function () {
                            let value = $(this).attr('data-value')
                            if (value === max) $(this).closest('td').addClass(tdClasses[index])
                        })
                    }

                    setTimeout(()=> {
                            resultsCharts[chartType][chartId][index] = new Chart(
                            document.getElementById('show-' + chartType + '-results-' + item + '-chart-' + chartId),
                            {
                                type: 'doughnut',
                                data: chartData[item],
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        )
                    }
                    , 200)
                })
            })
        }
    }

</script>
