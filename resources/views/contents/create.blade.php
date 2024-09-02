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
    {{ Breadcrumbs::render('contents.create', $questionnaire, $index) }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2 mb-3">
        <h4 class="mb-3">{{ __('Add New Content') }}</h4>

        <form action="/questionnaires/{{ $questionnaire->id }}/contents" method="post" class="needs-validation" novalidate>

            @csrf

            <div id="type-form" class="mb-4">
                @include('contents.form_type')
            </div>

            <x-forms.content-types :content='$content ?? null' :scores='$scores ?? null' :multipliers='$multipliers ?? null' :colors='$colors ?? null' :scripts='$scripts ?? null'></x-forms.content-types>

            <input name="content[order_id]" type="hidden" value="{{ $index }}">

            <div class="my-4">
                <a href="/questionnaires/edit/{{ $questionnaire->id }}" class="btn btn-secondary">{{ __('Back') }}</a>
                <button class="btn btn-primary">{{ __('Add Content') }}</button>
            </div>

            <hr>

            <div class="mt-4">
                <h4>{{ __('Preview') }}</h4>
            </div>

            <x-previews.content-types :content='$content ?? null' :scripts='$scripts ?? null'></x-previews.content-types>

        </form>

        <x-scripts.content-form></x-scripts.content-form>

        <!-- needs alert for unsaved changes -->

    </div>

@endsection
