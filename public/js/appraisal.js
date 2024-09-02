let arrows = []

function connectTopics(startId, endId, hexColor, size = 5) {
    let info = document.getElementById('appraisal-info')
    let line = getLine(startId, endId, hexColor, size)

    info.addEventListener('shown.bs.collapse', function (event) {

        line = getLine(startId, endId, hexColor, size)
        line.show(1000)

        info.addEventListener('hide.bs.collapse', function() {
            line.hide()
        })
    })

    // display arrows when the info panel is shown initially
    if(info.classList.contains('show')) {
        setTimeout(function() {
            line = getLine(startId, endId, hexColor, size)
            line.show(1000)
            info.addEventListener('hide.bs.collapse', function() {
                line.hide()
            })
        }, 250)
    }
}

document.addEventListener('livewire:init', () => {
    Livewire.on('updateArrows', (event) => {
        let arrowData = event.arrowData

        disposeArrows()

        for(let key in arrowData) {
            drawArrow(arrowData[key]['start'], arrowData[key]['end'], arrowData[key]['color'], arrowData[key]['width'])

        }
    })
})

function drawArrow(startId, endId, hexColor, size) {
    let arrow = getLine(startId, endId, hexColor, size)
    arrow.path = 'grid'
    arrow.show(1000)
    arrows.push(arrow)
}

function disposeArrows() {
    for(let key in arrows) {
        arrows[key].remove()
    }
    arrows = []
}

function getLine(startId, endId, hexColor, size) {
    return new LeaderLine(
        document.getElementById(startId),
        document.getElementById(endId),
        { color: hexColor, size: size, hide: true }
    )
}

// handle charts

document.addEventListener('livewire:init', () => {
    Livewire.on('initChart', (event) => {
        let chartData = event.chartData
        if(!healthImpactChart) initChart(chartData['labels'], chartData['positiveMax'], chartData['positiveLabel'], chartData['positiveColor'], chartData['negativeMin'], chartData['negativeLabel'], chartData['negativeColor'], chartData['yAxisLabel'])
    })
})

document.addEventListener('livewire:init', () => {
    Livewire.on('updateChart', (event) => {
        let chartData = event.chartData
        addChartData(chartData['labels'], chartData['positiveData'], chartData['negativeData'], chartData['positiveLabel'], chartData['positiveColor'], chartData['negativeLabel'], chartData['negativeColor'])
    })
})

let healthImpactChart = null
let chartData = []
let chartConfig = []

function initChart(labels, positiveMax, positiveLabel, positiveColor, negativeMin, negativeLabel, negativeColor, yAxisLabel) {
    chartData = {
        labels: labels,
        datasets: [
            {
                label: positiveLabel,
                backgroundColor: positiveColor,
                borderColor: 'rgb(31, 31, 31)'
            },
            {
                label: negativeLabel,
                backgroundColor: negativeColor,
                borderColor: 'rgb(31, 31, 31)'
            }
        ]
    }

    chartConfig = {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: ''
                    },
                    stacked: true
                },
                y: {
                    suggestedMin: negativeMin,
                    suggestedMax: positiveMax,
                    title: {
                        display: true,
                        text: yAxisLabel
                    },
                    stacked: true,
                        ticks: {
                        stepSize: 1
                    },
                    beginAtZero: true,
                    grid: {
                        color: (context) => {
                            if(context.tick.value === 0) return 'black'
                        }
                    }
                }
            }
        }
    }

    healthImpactChart = new Chart(
        document.getElementById('appraisal-health-impacts'),
        chartConfig
    )
}

function addChartData(labels, positiveScores, negativeScores, positiveLabel, positiveColor, negativeLabel, negativeColor) {
    if(!healthImpactChart){
        healthImpactChart.data = {
            labels: labels,
            datasets: [
                {
                    label: positiveLabel,
                    backgroundColor: positiveColor,
                    borderColor: 'rgb(31, 31, 31)',
                    cubicInterpolationMode: 'default',
                    tension: 0,
                    pointStyle: 'circle',
                    pointRadius: 6,
                    pointHoverRadius: 10,
                    data: positiveScores
                },
                {
                    label: negativeLabel,
                    backgroundColor: negativeColor,
                    borderColor: 'rgb(31, 31, 31)',
                    cubicInterpolationMode: 'default',
                    tension: 0,
                    pointStyle: 'circle',
                    pointRadius: 6,
                    pointHoverRadius: 10,
                    data: negativeScores
                }
            ]
        }
    } else {
        healthImpactChart.data.labels = labels

        healthImpactChart.data.datasets[0].label = positiveLabel
        healthImpactChart.data.datasets[0].backgroundColor = positiveColor
        healthImpactChart.data.datasets[0].data = positiveScores

        healthImpactChart.data.datasets[1].label = negativeLabel
        healthImpactChart.data.datasets[1].backgroundColor = negativeColor
        healthImpactChart.data.datasets[1].data = negativeScores
    }

    healthImpactChart.update()
}

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
