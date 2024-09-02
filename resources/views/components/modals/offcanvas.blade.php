<div class="offcanvas offcanvas-{{ $position }} @if($position === 'top' || $position === 'bottom') h-auto @endif" tabindex="-1" id="offcanvas-{{ $id }}" aria-labelledby="offcanvas-{{ $id }}-label">
    <div class="container" style="overflow: auto;">
        <div class="offcanvas-header px-{{ in_array($position, ['top', 'bottom']) ? '0' : '2' }} pt-3 pb-2">
            <h5 class="offcanvas-title" id="offcanvas-{{ $id }}-label">{{ $heading ?? __('Info') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-{{ in_array($position, ['top', 'bottom']) ? '0' : '2' }} pt-1 pb-2">
            <p>
                {!! $contents !!}
            </p>
        </div>
    </div>
</div>
