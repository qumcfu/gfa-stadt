<div class="btn-group">
    @for($i = 1; $i <= $pageCount; $i++)
        <button formaction="/screening/view/{{ $project->id }}/{{ $i }}" class="btn btn-outline-dark @if($currentPage == $i) bg-primary text-white @endif" @if($currentPage != $i) data-toggle="tooltip" title="{{ __('Save changes and go to page :page', ['page' => $i]) }}" @endif>{{ $i }}</button>
    @endfor
    <button formaction="/screening/results/{{ $project->id }}" class="btn btn-outline-dark @if($currentPage == 'results') bg-primary text-white @endif" @if($currentPage != 'results') data-toggle="tooltip" title="{{ __('Save changes and show results') }}" @endif>{{ __('Results') }}</button>
</div>
