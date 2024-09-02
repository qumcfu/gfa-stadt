<span>
    <i class="bi-{{ $icon }} @if((strlen($color) > 0)) text-{{ $color }} @endif" style="font-size: {{ $size }}rem; opacity: {{ $opacity / 100.0 }} @if($htmlColor != null)color: {{ $htmlColor }}!important; @endif"></i>
</span>
