@props(['tooltip' => ''])

<span data-toggle="tooltip" title="{{ __($tooltip) }}">
    {{ $slot }}
</span>
