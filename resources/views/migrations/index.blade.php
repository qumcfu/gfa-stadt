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
    {{ Breadcrumbs::render('migrations') }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ __('Available Migrations') }}</h4>

        <div class="row g-3">
            <div class="col-12">
                <form method="post">
                    @csrf

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Versions') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>v0.1.4 > v0.2.0</td>
                                <td>{{ __('Removes comments from entries and copies them to their own table') }}</td>
                                <td><button formaction="/migrate/1" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                            </tr>
                            <tr>
                                <td>v0.3.0 > v0.3.1</td>
                                <td>{{ __('Merges entries due to a removed content item and reassigns entries made on vulnerable groups') }}</td>
                                <td><button formaction="/migrate/2" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
