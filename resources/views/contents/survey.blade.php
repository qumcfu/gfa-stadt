@extends('app')

@section('title', 'Umfrage | GFA_Stadt')

@section('content')

    <form action="/content" method="post">
        <input type="text" name="name" autocomplete="off">

        @csrf {{-- set security token for cross-server protection --}}

        <button>{{ __('Add Content') }}</button>
    </form>

    @error('name') <span style="color:red;">{{ $message }}</span> @enderror

    <h2>{{ __('Survey') }}</h2>

    @forelse($contents as $content)

        <p>
            {{ $content->name }}
        </p>
    @empty
        <p>
            {{ __('No contents available.') }}
        </p>
    @endforelse
@endsection
