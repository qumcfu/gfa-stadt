@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('scripts.edit', $script) }}
@endsection

@section('content')

    <div class="col-md-7 col-lg-12 mt-2">
        <h4 class="mb-3">{{ __('Edit Script :name', ['name' => $script->name ?? '?']) }}</h4>

        <div class="row g-3">
            <div class="col-12">

                <form action="/scripts/update/{{ $script->id ?? null }}" method="post" class="needs-validation" id="script-form" novalidate>
                    @csrf
                    @method('PUT')

                    @include('scripts.form')

                    <div class="row g-3 d-none">
                        <div class="col-3">
                            <h5>{{ __('Input Parameters') }}</h5>
                            <p>
                                {{ __('Population Size') }}: <code>population</code><br>
                                {{ __('Male Residents') . ' (' . __('absolute') . ')' }}: <code>male</code><br>
                                {{ __('Female Residents') . ' (' . __('absolute') . ')' }}: <code>female</code>
                            </p>
                        </div>

                        <div class="col-3">
                            <h5>&nbsp;</h5>
                            <p>
                                {{ __('Number of Age Groups') }}: <code>ageGroups</code><br>
                                {{ __('Age Ranges') }}: <code>ageRanges</code><br>
                                {{ __('Lower and Upper Limit of :thing', ['thing' => __('Age Group') . ' 1']) }}: <code>ageRanges[1,1] / ageRanges[1,2]</code><br>
                            </p>
                        </div>

                        <div class="col-3">
                            <h5>{{ __('Output Parameters') }}</h5>
                            <p>
                                {{ __('Mortalities') }}: <code>mortality</code><br>
                                {{ __('Cases of Cardiovascular Disease') }}: <code>cardio</code><br>
                                {{ __('Cases of Diabetes') }}: <code>diabetes</code><br>
                                {{ __('Cases of Dementia') }}: <code>dementia</code>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <a href="/scripts" class="btn btn-secondary mt-2">{{ __('Back') }}</a>
                        <button class="btn btn-primary mt-2">{{ __('Save Changes') }}</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
