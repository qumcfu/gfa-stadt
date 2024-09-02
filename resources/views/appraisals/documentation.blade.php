<!--
    The MIT License (MIT)

    Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
-->
@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('appraisal.documentation') }}
@endsection

@section('content')



        @foreach($questionnaires as $questionnaire)
            @php($color = $questionnaire['color']['hex'] ?? '#606060')

            <h2 class="color-heading br-round-top screening-heading p-3 mb-0 {{ (isset($questionnaire['color']) && $questionnaire['color']->isBright()) ? 'text-dark' : 'text-light' }}" style="background-color: {{ $color }};">
                {{ $questionnaire['name'] }}
            </h2>

            @php($contentIndex = 0)
            @php($totalContents = count($questionnaire['contents']))
            @foreach($questionnaire['contents'] as $content)
                <h4 class="color-heading screening-heading p-3 mb-0" style="background-color: {{ $color }}80; border-style: solid; border-color: {{ $color }}; border-top-width: 1px; border-bottom-width: 1px; border-left-width: 2px; border-right-width: 2px;">
                    {{ $content['text'] }}
                </h4>
                @php($itemIndex = 0)
                @php($totalItems = count($content['appraisalItems']))
                @foreach($content['appraisalItems'] as $item)
                    <div class="color-frame p-3 @if($itemIndex === $totalItems - 1 && $contentIndex === $totalContents - 1) br-round-bottom @endif" style="border-style: solid; border-color: {{ $color }}; @if($itemIndex === $totalItems - 1 && $contentIndex === $totalContents - 1) border-bottom-width: 2px; @else border-bottom-width: 1px; @endif border-top-width: 1px; border-left-width: 2px; border-right-width: 2px;">
                        <p>
                            {{ $item['text'] }}
                        </p>
                        @if(strlen(($item['info'] ?? '')) > 0)
                            <div class="text-muted text-small">
                                <span class="fw-bold">{{ __('What is meant by this?') }}</span><br>
                                {!! $item['info'] !!}
                            </div>
                        @endif
                        <div>
                            <span class="text-small">{{ __('Direct Effects') }}</span><br>
                            {{ __('Yes') . ': ' }}
                            @php($index = 0)
                            @foreach($item['effects'] as $effect)
                                @if($effect['size_y'] !== 0)
                                    @if($index > 0)<span>, </span>@endif
                                    <span><!--x-icons.tooltip-icon :actAsButton='true' :icon='$effect["type"]["icon"]["name"]' :color='"dark"'></x-icons.tooltip-icon!-->{{ __($effect['type']['name']) }}</span>
                                    @if($effect['size_y'] > 0)<span class="fw-bold @if($effect['type']['is_positive']) text-success @else text-danger @endif">+{{ $effect['size_y'] }}</span>@endif
                                    @if($effect['size_y'] < 0)<span class="fw-bold @if($effect['type']['is_positive']) text-danger @else text-success @endif">{{ $effect['size_y'] }}</span>@endif
                                    @php($index++)
                                @endif
                            @endforeach
                            @if($index === 0)<span class="text-muted">{{ __('No effects') }}</span>@endif
                        </div>
                        <div>
                            {{ __('No') . ': ' }}
                            @php($index = 0)
                            @foreach($item['effects'] as $effect)
                                @if($effect['size_n'] !== 0)
                                    @if($index > 0)<span>, </span>@endif
                                    <span><!--x-icons.tooltip-icon :actAsButton='true' :icon='$effect["type"]["icon"]["name"]' :color='"dark"'></x-icons.tooltip-icon!-->{{ __($effect['type']['name']) }}</span>
                                    @if($effect['size_n'] > 0)<span class="fw-bold @if($effect['type']['is_positive']) text-success @else text-danger @endif">+{{ $effect['size_n'] }}</span>@endif
                                    @if($effect['size_n'] < 0)<span class="fw-bold @if($effect['type']['is_positive']) text-danger @else text-success @endif">{{ $effect['size_n'] }}</span>@endif
                                    @php($index++)
                                @endif
                            @endforeach
                            @if($index === 0)<span class="text-muted">{{ __('No effects') }}</span>@endif
                            <span class="float-end">{{ $item->getUniqueNumber() ?? '?' }}, <span class="{{ ($item['priority'] ?? 0) > 2 ? 'fw-bold' : (($item['priority'] ?? 0) <= 1 ? 'text-muted' : '') }}">P-{{ $item['priority'] ?? 'X' }}</span></span>
                        </div>
                    </div>
                    @php($itemIndex++)
                @endforeach
                @php($contentIndex++)
            @endforeach
            <div style="height: 2em;"></div>
        @endforeach


@endsection
