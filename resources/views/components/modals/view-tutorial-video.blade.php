<div class="modal fade" id="view-tutorial-video-modal" tabindex="-1" aria-labelledby="view-tutorial-video-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary py-2">
                <h5 class="modal-title" id="view-tutorial-video-modal-label">{{ __('About this page') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video class="w-100" controls>
                    @if($page === 'dashboard')
                        <source src="{{ Storage::url('default/gfa_tutorial_dashboard.mp4') }}" type="video/mp4">
                    @elseif($page === 'screening')
                        <source src="{{ Storage::url('default/gfa_tutorial_screening.mp4') }}" type="video/mp4">
                    @elseif($page === 'screening-summary')
                        <source src="{{ Storage::url('default/gfa_tutorial_screening_summary.mp4') }}" type="video/mp4">
                    @elseif($page === 'screening-report')
                        <source src="{{ Storage::url('default/gfa_tutorial_screening_report.mp4') }}" type="video/mp4">
                    @elseif($page === 'scoping')
                        <source src="{{ Storage::url('default/gfa_tutorial_scoping.mp4') }}" type="video/mp4">
                    @elseif($page === 'appraisal')
                        <source src="{{ Storage::url('default/gfa_tutorial_appraisal.mp4') }}" type="video/mp4">
                    @elseif($page === 'appraisal-summary')
                        <source src="{{ Storage::url('default/gfa_tutorial_appraisal_summary.mp4') }}" type="video/mp4">
                    @elseif($page === 'appraisal-report')
                        <source src="{{ Storage::url('default/gfa_tutorial_appraisal_report.mp4') }}" type="video/mp4">
                    @endif
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="modal-footer bg-body-secondary p-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
