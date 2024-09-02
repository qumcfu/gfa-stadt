@php $data = json_decode($content->data ?? '', true) @endphp

@if(($data['mode'] ?? 'auto') !== 'auto')
    <div class="mb-3">
        <button formaction="/{{ $context === 'screening' ? 'screening' : 'scoping' }}/execute/{{ $content->size }}/{{ $context === 'screening' ? $membership->screening->id : $membership->scoping->id }}" class="btn btn-primary">{{ __('Calculate') }}</button>
    </div>
@endif
