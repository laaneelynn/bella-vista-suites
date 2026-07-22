@php
    $logoLink = auth()->check()
        ? route('dashboard')
        : route('welcome');
@endphp

<a href="{{ $logoLink }}" class="brand">
    <div class="brand-icon">
        <img src="{{ asset('favicon.ico') }}" alt="Bella Vista Suites Logo">
    </div>

    <div>
        <h1>
            Bella Vista Suites
        </h1>

        <span>
            Luxury Hotel Booking
        </span>
    </div>
</a>