<div class="row g-2 mb-2 hide-when-printing">
    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <select id="chart-type-{{ $uniqueId }}" class="form-control">
                <option value="bar" {{ $chartType === 'bar' ? 'selected' : '' }}>{{ __('Bar Chart') }}</option>
                <option value="line" {{ $chartType === 'line' ? 'selected' : '' }}>{{ __('Line Chart') }}</option>
                <option value="radar" {{ $chartType === 'radar' ? 'selected' : '' }}>{{ __('Radar Chart') }}</option>
            </select>
            <label for="chart-type-{{ $uniqueId }}">{{ __('Chart Type') }}</label>
        </div>
    </div>

    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <select id="value-type-{{ $uniqueId }}" class="form-control">
                <option value="mean" {{ $valueType === 'mean' ? 'selected' : '' }}>{{ __('Mean Values') }}</option>
                <option value="max" {{ $valueType === 'max' ? 'selected' : '' }}>{{ __('Highest Values') }}</option>
            </select>
            <label for="value-type-{{ $uniqueId }}">{{ __('Displayed Values') }}</label>
        </div>
    </div>

    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <select id="chart-size-{{ $uniqueId }}" class="form-control">
                <option value="default" {{ $chartSize === 'default' ? 'selected' : '' }}>{{ __('Default') }}</option>
                <option value="large" {{ $chartSize === 'large' ? 'selected' : '' }}>{{ __('Large') }}</option>
            </select>
            <label for="chart-size-{{ $uniqueId }}">{{ __('Chart Size') }}</label>
        </div>
    </div>

    <div class="col-3">
        <div class="form-floating input-group has-validation">
            <select id="interpolation-mode-{{ $uniqueId }}" class="form-control" {{ $chartType !== 'line' ? 'disabled' : '' }}>
                <option value="default" {{ $interpolationMode === 'default' ? 'selected' : '' }}>{{ __('No Interpolation') }}</option>
                <option value="monotone" {{ $interpolationMode === 'monotone' ? 'selected' : '' }}>{{ __('Monotone') }}</option>
            </select>
            <label for="interpolation-mode-{{ $uniqueId }}">{{ __('Interpolation Mode') }}</label>
        </div>
    </div>

</div>

<div class="chart">
    <canvas class="chart-canvas" id="screening-single-{{ $uniqueId }}" style="height: 35vh;"></canvas>
</div>

<script>

    let chartType = '{{ $chartType }}'
    let chartSize = '{{ $chartSize }}'
    let valueType = '{{ $valueType }}'
    let interpolationMode = '{{ $interpolationMode }}'
    let uniqueId = '{{ $uniqueId }}'
    let tensionValue = 0

    let charts = []
    let labels = []
    let config = []
    let data = []

    function sizeStringToInt(sizeString)
    {
        switch(sizeString) {
            case 'default': return 35;
            case 'large': return 70;
        }
    }

    $('#chart-type-' + uniqueId).on('change', function(){
        chartType = $(this).val()
        saveChartInfo(chartType, chartSize, valueType, interpolationMode)
        updateChart(uniqueId)
    })

    $('#chart-size-' + uniqueId).on('change', function(){
        chartSize = $(this).val()
        saveChartInfo(chartType, chartSize, valueType, interpolationMode)
        updateChart(uniqueId)
    })

    $('#value-type-' + uniqueId).on('change', function(){
        valueType = $(this).val()
        saveChartInfo(chartType, chartSize, valueType, interpolationMode)
        updateChart(uniqueId)
    })

    $('#interpolation-mode-' + uniqueId).on('change', function(){
        interpolationMode = $(this).val()
        saveChartInfo(chartType, chartSize, valueType, interpolationMode)
        updateData(uniqueId)
    })

    function saveChartInfo(type, size, value, mode) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/configurations/save/chart/" + type + "/" + size + "/" + value + "/" + mode,
            data : {'chartType' : type, 'chartSize' : size, 'valueType' : value, 'interpolationMode' : mode},
            type : 'PUT',
            dataType : 'text',
            success : function(){

            }
        })
    }

    function initLabels(id) {
        labels[id] = [
            @foreach($questionnaires as $key => $questionnaire)"{{ $questionnaire->name }}"{{ ($key + 1 < $questionnaires->count() ? ',' : '') }} @endforeach
        ]
    }

    function initData(id) {
        data[id] = {
            labels: labels[id],
            datasets: [
                {
                    label: '{{ __("Positive Impact") }}',
                    backgroundColor: 'rgb(0, 255, 0)',
                    borderColor: 'rgb(31, 31, 31)'
                },
                {
                    label: '{{ __("Negative Impact") }}',
                    backgroundColor: 'rgb(255, 0, 0)',
                    borderColor: 'rgb(31, 31, 31)'
                },
                {
                    label: '{{ __("Potential for Improvement") }}',
                    backgroundColor: 'rgb(0, 0, 255)',
                    borderColor: 'rgb(31, 31, 31)'
                }]
        }
    }

    function updateChart(id) {
        $('#interpolation-mode-' + id).prop('disabled', chartType !== 'line')
        removeData(id)
        destroyChart(id)
        showChart(id)
        addData(id)
    }

    function updateData(id) {
        removeData(id)
        addData(id)
    }

    function showChart(id) {
        $('.chart-canvas').css('height', sizeStringToInt(chartSize) + (chartType !== 'radar' ? 0 : 20) + 'vh')
        updateConfig(id)
        charts[id] = new Chart(
            document.getElementById('screening-single-' + id),
            config[id]
        );
    }

    function destroyChart(id) {
        removeData(id)
        charts[id].destroy()
    }

    function updateConfig(id) {
        config[id] = {
            type: chartType,
            data: data[id],
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: chartType !== 'radar' ? {
                    x: {
                        title: {
                            display: chartType !== 'radar',
                            text: ''
                        }
                    },
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 5,
                        title: {
                            display: chartType !== 'radar',
                            text: '{{ __("Impact") . " / " . __("Potential") }}'
                        },
                        ticks: {
                            stepSize: 1
                        },
                        beginAtZero: true
                    }
                } : { r: { min: 0, max: 5 } },
                animation: {
                    delay: 0
                }
            }
        }
    }

    function addData(id) {
        charts[id].data = {
            labels: labels[id],
            datasets: [
                {
                    label: '{{ __("Positive Impact") }}',
                    backgroundColor: '#157347' + (chartType !== 'bar' ? '40' : 'e0'),
                    borderColor: '#157347',
                    cubicInterpolationMode: chartType !== 'radar' ? interpolationMode : 'default',
                    tension: tensionValue,
                    pointStyle: 'circle',
                    pointRadius: (chartType === 'line' ? 7 : 6),
                    pointHoverRadius: (chartType === 'line' ? 15 : 10),
                    data: valueType === 'mean' ? [ {{ $positiveMeans }} ] : [ {{ $positiveMax }} ]
                },
                {
                    label: '{{ __("Negative Impact") }}',
                    backgroundColor: '#bb2d3b' + (chartType !== 'bar' ? '40' : 'e0'),
                    borderColor: '#bb2d3b',
                    cubicInterpolationMode: chartType !== 'radar' ? interpolationMode : 'default',
                    tension: tensionValue,
                    pointStyle: 'triangle',
                    pointRadius: (chartType === 'line' ? 7 : 6),
                    pointHoverRadius: (chartType === 'line' ? 15 : 10),
                    data: valueType === 'mean' ? [ {{ $negativeMeans }} ] : [ {{ $negativeMax }} ]
                },
                {
                    label: '{{ __("Potential for Improvement") }}',
                    backgroundColor: '#0b5ed7' + (chartType !== 'bar' ? '40' : 'e0'),
                    borderColor: '#0b5ed7',
                    cubicInterpolationMode: chartType !== 'radar' ? interpolationMode : 'default',
                    tension: tensionValue,
                    pointStyle: 'rect',
                    pointRadius: (chartType === 'line' ? 7 : 6),
                    pointHoverRadius: (chartType === 'line' ? 15 : 10),
                    data: valueType === 'mean' ? [ {{ $potentialMeans }} ] : [ {{ $potentialMax }} ]
                }]
        }
        charts[id].update();
    }

    function removeData(id) {
        charts[id].data = {
            labels: labels[id],
            datasets: [
                {
                    label: '{{ __("Positive Impact") }}',
                    backgroundColor: 'rgb(0, 255, 0)',
                    borderColor: 'rgb(31, 31, 31)',
                    data: []
                },
                {
                    label: '{{ __("Negative Impact") }}',
                    backgroundColor: 'rgb(255, 0, 0)',
                    borderColor: 'rgb(31, 31, 31)',
                    data: []
                },
                {
                    label: '{{ __("Potential for Improvement") }}',
                    backgroundColor: 'rgb(0, 0, 255)',
                    borderColor: 'rgb(31, 31, 31)',
                    data: []
                }]
        }
        charts[id].update();
    }

</script>
