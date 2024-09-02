<div class="text-end">

    <div class="px-2 py-1 fw-light text-dark-emphasis border rounded-1 {{ $buttonClass }}" style="font-size: 0.7875rem;">{{ __($buttonLabel, ['n' => $project['app_changes']]) }}@if($project['app_changes'] > 0)<span class="ms-2"></span><x-icons.tooltip-icon :icon='"question-circle"' :color='"dark"' :tooltip='__("The next time the report is called up, the results are automatically recalculated.")' />@endif</div>

    @script
    <script>
        $wire.on('hide-appraisal-loading', () => {
            hideLoading()
        });
    </script>
    @endscript
</div>
