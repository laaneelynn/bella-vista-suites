<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Now | Bella Vista Suites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --sand: #dec3b3;
            --sky: #d2dce4;
            --cream: #f8f2ef;
            --dark: #2b2221;
            --text: #3f3534;
            --blue: #557589;
            --brown: #9f7d6a;
            --white: #ffffff;
            --shadow: 0 24px 70px rgba(63, 53, 52, 0.20);
            --soft-shadow: 0 16px 45px rgba(63, 53, 52, 0.14);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            position: relative;
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    rgba(222, 195, 179, 0.18),
                    rgba(210, 220, 228, 0.16)
                ),
                url("{{ asset('images/coastal-resort-bg.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--dark);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(248, 242, 239, 0.34),
                    rgba(248, 242, 239, 0.14)
                );
            pointer-events: none;
            z-index: 0;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 16px 0 40px;
        }

        header {
            width: 100%;
            padding: 14px 20px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.84);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.75);
            box-shadow: var(--soft-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            position: sticky;
            top: 12px;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--dark);
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.82);
            color: var(--dark);
            font-family: Georgia, serif;
            font-size: 24px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.12);
        }

        .brand-text h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .brand-text span {
            display: block;
            margin-top: 4px;
            color: #7c614f;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .top-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            flex-wrap: wrap;
        }

        .top-nav a,
        .top-nav button {
            border: none;
            cursor: pointer;
            padding: 11px 16px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.80);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .top-nav a:hover,
        .top-nav button:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.92);
        }

        .top-nav a.active {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
        }

        .logout-btn {
            color: var(--dark);
        }

        main {
            margin-top: 16px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 18px;
            background: rgba(255, 238, 238, 0.94);
            color: #8e3232;
            font-weight: 850;
            border: 1px solid rgba(142, 50, 50, 0.18);
            margin-bottom: 14px;
            line-height: 1.5;
            box-shadow: var(--soft-shadow);
        }

        .hero {
            min-height: 230px;
            border-radius: 42px;
            overflow: hidden;
            padding: 44px 52px;
            background:
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.84),
                    rgba(255, 255, 255, 0.56),
                    rgba(255, 255, 255, 0.18)
                ),
                url("https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1900&q=85");
            background-size: cover;
            background-position: center right;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            margin-bottom: 18px;
        }

        .eyebrow {
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 8px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.90);
        }

        .hero h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(40px, 5vw, 60px);
            line-height: 1;
            letter-spacing: -1.6px;
            color: var(--dark);
            font-weight: 800;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .hero h2 strong {
            display: inline;
            color: var(--blue);
            font-style: italic;
            font-weight: 500;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .hero p {
            margin-top: 12px;
            color: var(--text);
            font-size: 14px;
            line-height: 1.65;
            font-weight: 850;
            max-width: 720px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .booking-layout {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 18px;
            align-items: start;
        }

        .panel,
        .calendar-wrap {
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            overflow: hidden;
        }

        .panel {
            padding: 22px;
        }

        .panel-title {
            margin-bottom: 14px;
        }

        .panel-title span {
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
        }

        .panel-title h3 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            color: var(--dark);
            font-weight: 800;
        }

        .room-preview {
            display: grid;
            grid-template-columns: 125px 1fr;
            gap: 13px;
            padding: 12px;
            border-radius: 24px;
            background: rgba(248, 242, 239, 0.90);
            border: 1px solid rgba(255, 255, 255, 0.86);
            margin-bottom: 14px;
        }

        .room-preview-image {
            height: 110px;
            border-radius: 18px;
            overflow: hidden;
            background: var(--cream);
        }

        .room-preview-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .room-preview-body {
            min-width: 0;
        }

        .room-preview-top {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            align-items: flex-start;
            margin-bottom: 4px;
        }

        .room-preview-top h4 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 21px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1.05;
        }

        .room-rating {
            padding: 5px 8px;
            border-radius: 999px;
            background: white;
            color: #7c5b17;
            font-size: 10px;
            font-weight: 950;
            border: 1px solid rgba(255, 255, 255, 0.86);
            white-space: nowrap;
        }

        .room-preview-desc {
            color: var(--text);
            font-size: 11px;
            line-height: 1.35;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .price {
            color: #315d78;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 23px;
            font-weight: 800;
        }

        .price small {
            color: var(--text);
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
            font-size: 10px;
            font-weight: 850;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .form-group {
            display: grid;
            gap: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .date-row {
            display: contents;
        }

        label {
            color: var(--dark);
            font-size: 11px;
            font-weight: 950;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid rgba(210, 220, 228, 0.95);
            outline: none;
            border-radius: 16px;
            padding: 11px 13px;
            background: rgba(248, 242, 239, 0.90);
            color: var(--dark);
            font-size: 13px;
            font-weight: 850;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--blue);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(210, 220, 228, 0.46);
        }

        input[readonly] {
            background: rgba(248, 242, 239, 0.92);
            color: #315d78;
            cursor: default;
        }

        textarea {
            resize: vertical;
            min-height: 70px;
        }

        .booking-summary {
            grid-column: 1 / -1;
            padding: 13px;
            border-radius: 20px;
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.86);
            display: grid;
            gap: 7px;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: var(--text);
            font-size: 11px;
            font-weight: 850;
        }

        .summary-line strong {
            color: var(--dark);
        }

        .summary-total {
            margin-top: 4px;
            padding-top: 8px;
            border-top: 1px solid rgba(210, 220, 228, 0.86);
            color: #315d78;
            font-size: 14px;
            font-weight: 950;
        }

        .submit-btn {
            grid-column: 1 / -1;
            width: 100%;
            border: none;
            cursor: pointer;
            padding: 13px 16px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 13px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        .calendar-header {
            padding: 16px 18px;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .calendar-header h3 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 23px;
            font-weight: 800;
        }

        .calendar-btn {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.22);
            color: white;
            font-size: 18px;
            font-weight: 950;
            transition: 0.2s ease;
        }

        .calendar-btn:hover {
            background: rgba(255, 255, 255, 0.32);
            transform: translateY(-1px);
        }

        .calendar-inner {
            padding: 16px;
        }

        .calendar-weekdays,
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .calendar-weekdays div {
            padding: 10px 5px;
            text-align: center;
            color: var(--dark);
            background: rgba(248, 242, 239, 0.92);
            font-size: 11px;
            font-weight: 950;
            border: 1px solid rgba(210, 220, 228, 0.65);
        }

        .day {
            min-height: 68px;
            padding: 8px;
            border: 1px solid rgba(210, 220, 228, 0.65);
            background: rgba(255, 255, 255, 0.90);
            color: var(--dark);
            text-align: left;
            font-size: 13px;
            font-weight: 950;
            position: relative;
            cursor: pointer;
            transition: 0.18s ease;
        }

        .day:hover {
            background: rgba(248, 242, 239, 0.95);
            transform: scale(1.02);
            z-index: 2;
        }

        .day.empty {
            background: rgba(248, 242, 239, 0.60);
            cursor: default;
            opacity: 0.50;
        }

        .day.empty:hover {
            transform: none;
        }

        .day.past {
            background: rgba(235, 230, 228, 0.80);
            color: #9a8b88;
            cursor: not-allowed;
        }

        .day.booked {
            background: rgba(239, 226, 220, 0.90);
            color: #80675c;
            cursor: not-allowed;
        }

        .day.booked::after {
            content: "Booked";
            position: absolute;
            left: 7px;
            bottom: 7px;
            padding: 4px 7px;
            border-radius: 999px;
            background: #8e3232;
            color: white;
            font-size: 9px;
            font-weight: 950;
        }

        .day.selected-start,
        .day.selected-end {
            background: linear-gradient(135deg, var(--brown), var(--blue));
            color: white;
            border-color: var(--blue);
        }

        .day.in-range {
            background: rgba(210, 220, 228, 0.88);
            color: var(--dark);
        }

        .day.today {
            outline: 2px solid var(--blue);
            outline-offset: -3px;
        }

        .calendar-note {
            margin-top: 12px;
            padding: 12px 14px;
            border-radius: 18px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--text);
            font-size: 11px;
            font-weight: 850;
            line-height: 1.4;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        @media (max-width: 1100px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .booking-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full,
            .booking-summary,
            .submit-btn {
                grid-column: auto;
            }
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .brand-text h1 {
                font-size: 23px;
            }

            .hero {
                padding: 30px 24px;
                min-height: 260px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .room-preview {
                grid-template-columns: 1fr;
            }

            .room-preview-image {
                height: 150px;
            }

            .day {
                min-height: 58px;
                font-size: 12px;
            }

            .top-nav a,
            .top-nav button {
                font-size: 12px;
                padding: 9px 13px;
            }
        }
    </style>
</head>

<body>
@php
    $rooms = $rooms ?? [];
    $unreadCount = auth()->user()->unreadNotifications()->count();

    if (count($rooms) === 0) {
        $rooms = [
            [
                'name' => 'Blush Suite',
                'desc' => 'Elegant room for a cozy and relaxing stay.',
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80',
            ],
        ];
    }

    $prices = [
        'Blush Suite' => '₱4,299',
        'Vista Deluxe' => '₱5,499',
        'Pearl Family Room' => '₱6,299',
        'Rose Executive' => '₱6,999',
        'Garden Cozy Room' => '₱4,799',
        'Bella Presidential' => '₱9,999',
        'Sunset Premier Room' => '₱5,899',
        'Ocean View Suite' => '₱7,499',
        'Royal Comfort Room' => '₱6,799',
        'Couple Serenity Suite' => '₱5,999',
        'Modern Studio Room' => '₱3,899',
        'Grand Family Suite' => '₱8,499',
    ];

    $ratings = [
        'Blush Suite' => '4.8',
        'Vista Deluxe' => '4.7',
        'Pearl Family Room' => '4.6',
        'Rose Executive' => '4.7',
        'Garden Cozy Room' => '4.6',
        'Bella Presidential' => '4.9',
        'Sunset Premier Room' => '4.8',
        'Ocean View Suite' => '4.9',
        'Royal Comfort Room' => '4.7',
        'Couple Serenity Suite' => '4.8',
        'Modern Studio Room' => '4.5',
        'Grand Family Suite' => '4.9',
    ];

    $roomMeta = [];

    foreach ($rooms as $room) {
        $name = $room['name'];

        $roomMeta[$name] = [
            'name' => $name,
            'desc' => $room['desc'] ?? 'Comfortable room for your stay.',
            'image' => $room['image'] ?? 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80',
            'price' => $prices[$name] ?? '₱4,999',
            'rating' => $ratings[$name] ?? '4.8',
        ];
    }

    $selectedRoom = old('service_name', $selectedRoom ?? request('room') ?? array_key_first($roomMeta));
    $selectedMeta = $roomMeta[$selectedRoom] ?? reset($roomMeta);
    $bookedDatesByRoom = $bookedDatesByRoom ?? [];
    $bookingCode = $bookingCode ?? old('booking_code', 'BV' . strtoupper(substr(md5(auth()->id() . now()), 0, 6)));
@endphp

<script type="application/json" id="bookedDatesData">@json($bookedDatesByRoom)</script>
<script type="application/json" id="roomMetaData">@json($roomMeta)</script>

<div class="page">
    <header>
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-logo">B</div>

            <div class="brand-text">
                <h1>Bella Vista Suites</h1>
                <span>Luxury Hotel Booking</span>
            </div>
        </a>

        <nav class="top-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Rooms
            </a>

            <a href="{{ route('book-now') }}" class="{{ request()->routeIs('book-now') ? 'active' : '' }}">
                Book Now
            </a>

            <a href="{{ route('my-reservations') }}" class="{{ request()->routeIs('my-reservations') ? 'active' : '' }}">
                My Reservation
            </a>

            <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'active' : '' }}">
                Menu
            </a>

            <a href="{{ route('notifications') }}" class="{{ request()->routeIs('notifications') ? 'active' : '' }}">
                Notification
                @if($unreadCount > 0)
                    ({{ $unreadCount }})
                @endif
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main>
        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <section class="hero">
            <div class="eyebrow">Secure your Bella Vista stay</div>

            <h2>
                Book Your <strong>Perfect Room</strong>
            </h2>

            <p>
                Choose your room, view the nightly rate, select available dates using the calendar, and submit your reservation.
            </p>
        </section>

        <section class="booking-layout">
            <div class="panel">
                <div class="panel-title">
                    <span>Reservation Form</span>
                    <h3>Complete Booking</h3>
                </div>

                <div class="room-preview">
                    <div class="room-preview-image">
                        <img id="roomPreviewImage" src="{{ $selectedMeta['image'] }}" alt="{{ $selectedMeta['name'] }}">
                    </div>

                    <div class="room-preview-body">
                        <div class="room-preview-top">
                            <h4 id="roomPreviewName">{{ $selectedMeta['name'] }}</h4>
                            <div class="room-rating" id="roomPreviewRating">⭐ {{ $selectedMeta['rating'] }}</div>
                        </div>

                        <p class="room-preview-desc" id="roomPreviewDesc">
                            {{ $selectedMeta['desc'] }}
                        </p>

                        <div class="price" id="roomPreviewPrice">
                            {{ $selectedMeta['price'] }}
                            <small>/ night</small>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('book-now.store') }}" id="bookingForm">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Guest Name</label>
                            <input type="text" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Booking ID</label>
                            <input type="text" name="booking_code" value="{{ old('booking_code', $bookingCode) }}" readonly>
                        </div>

                        <div class="form-group full">
                            <label>Room Type</label>
                            <select name="service_name" id="roomSelect" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room['name'] }}" {{ old('service_name', $selectedRoom) === $room['name'] ? 'selected' : '' }}>
                                        {{ $room['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="booking_date" id="bookingDate" value="{{ old('booking_date') }}">
                        <input type="hidden" name="checkout_date" id="checkoutDate" value="{{ old('checkout_date') }}">

                        <div class="date-row">
                            <div class="form-group">
                                <label>Check-in</label>
                                <input type="text" id="checkInDisplay" value="{{ old('booking_date') ?: 'Select date' }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Check-out</label>
                                <input type="text" id="checkOutDisplay" value="{{ old('checkout_date') ?: 'Select date' }}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Number of Guests</label>
                            <input type="number" name="guests" min="1" max="10" value="{{ old('guests', 1) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Notes</label>
                            <textarea name="notes" placeholder="Special request or notes...">{{ old('notes') }}</textarea>
                        </div>

                        <div class="booking-summary">
                            <div class="summary-line">
                                <span>Selected Room</span>
                                <strong id="summaryRoom">{{ $selectedMeta['name'] }}</strong>
                            </div>

                            <div class="summary-line">
                                <span>Rate</span>
                                <strong id="summaryRate">{{ $selectedMeta['price'] }} / night</strong>
                            </div>

                            <div class="summary-line">
                                <span>Length of Stay</span>
                                <strong id="summaryNights">Select dates</strong>
                            </div>

                            <div class="summary-line summary-total">
                                <span>Estimated Total</span>
                                <strong id="summaryTotal">₱0</strong>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">
                            Submit Reservation
                        </button>
                    </div>
                </form>
            </div>

            <div class="calendar-wrap">
                <div class="calendar-header">
                    <button type="button" class="calendar-btn" id="prevMonth">‹</button>
                    <h3 id="calendarTitle">Calendar</h3>
                    <button type="button" class="calendar-btn" id="nextMonth">›</button>
                </div>

                <div class="calendar-inner">
                    <div class="calendar-weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>

                    <div class="calendar-days" id="calendarDays"></div>

                    <div class="calendar-note" id="calendarNote">
                        Click an available date for check-in, then click another available date for check-out.
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    const bookedDatesByRoom = window.JSON.parse(
        document.getElementById('bookedDatesData').textContent
    );

    const roomMeta = window.JSON.parse(
        document.getElementById('roomMetaData').textContent
    );

    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const calendarDays = document.getElementById('calendarDays');
    const calendarTitle = document.getElementById('calendarTitle');
    const calendarNote = document.getElementById('calendarNote');

    const roomSelect = document.getElementById('roomSelect');
    const bookingDateInput = document.getElementById('bookingDate');
    const checkoutDateInput = document.getElementById('checkoutDate');
    const checkInDisplay = document.getElementById('checkInDisplay');
    const checkOutDisplay = document.getElementById('checkOutDisplay');
    const bookingForm = document.getElementById('bookingForm');

    const roomPreviewImage = document.getElementById('roomPreviewImage');
    const roomPreviewName = document.getElementById('roomPreviewName');
    const roomPreviewRating = document.getElementById('roomPreviewRating');
    const roomPreviewDesc = document.getElementById('roomPreviewDesc');
    const roomPreviewPrice = document.getElementById('roomPreviewPrice');

    const summaryRoom = document.getElementById('summaryRoom');
    const summaryRate = document.getElementById('summaryRate');
    const summaryNights = document.getElementById('summaryNights');
    const summaryTotal = document.getElementById('summaryTotal');

    const now = new window.Date();
    let currentMonth = now.getMonth();
    let currentYear = now.getFullYear();

    let selectedCheckIn = bookingDateInput.value || '';
    let selectedCheckOut = checkoutDateInput.value || '';

    function padNumber(value) {
        return String(value).padStart(2, '0');
    }

    function makeDateKey(year, monthIndex, day) {
        return year + '-' + padNumber(monthIndex + 1) + '-' + padNumber(day);
    }

    function todayKey() {
        const today = new window.Date();

        return today.getFullYear() + '-' +
            padNumber(today.getMonth() + 1) + '-' +
            padNumber(today.getDate());
    }

    function readableDate(dateKey) {
        if (!dateKey) {
            return 'Select date';
        }

        const parts = dateKey.split('-');
        const year = Number(parts[0]);
        const month = Number(parts[1]) - 1;
        const day = Number(parts[2]);

        const date = new window.Date(year, month, day);

        return monthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
    }

    function getSelectedRoom() {
        return roomSelect.value;
    }

    function getBookedDates() {
        return bookedDatesByRoom[getSelectedRoom()] || [];
    }

    function dateRange(startKey, endKey) {
        const range = [];

        const startParts = startKey.split('-');
        const endParts = endKey.split('-');

        let currentDate = new window.Date(
            Number(startParts[0]),
            Number(startParts[1]) - 1,
            Number(startParts[2])
        );

        const endDate = new window.Date(
            Number(endParts[0]),
            Number(endParts[1]) - 1,
            Number(endParts[2])
        );

        while (currentDate <= endDate) {
            range.push(
                currentDate.getFullYear() + '-' +
                padNumber(currentDate.getMonth() + 1) + '-' +
                padNumber(currentDate.getDate())
            );

            currentDate.setDate(currentDate.getDate() + 1);
        }

        return range;
    }

    function rangeHasBookedDate(startKey, endKey) {
        const bookedDates = getBookedDates();
        const selectedRange = dateRange(startKey, endKey);

        return selectedRange.some(function (dateKey) {
            return bookedDates.includes(dateKey);
        });
    }

    function priceToNumber(priceText) {
        return Number(String(priceText).replace(/[₱, ]/g, '')) || 0;
    }

    function calculateNights() {
        if (!selectedCheckIn || !selectedCheckOut) {
            return 0;
        }

        const startParts = selectedCheckIn.split('-');
        const endParts = selectedCheckOut.split('-');

        const start = new window.Date(
            Number(startParts[0]),
            Number(startParts[1]) - 1,
            Number(startParts[2])
        );

        const end = new window.Date(
            Number(endParts[0]),
            Number(endParts[1]) - 1,
            Number(endParts[2])
        );

        const diff = Math.round((end - start) / (1000 * 60 * 60 * 24));

        return Math.max(diff, 1);
    }

    function formatPeso(amount) {
        return '₱' + amount.toLocaleString();
    }

    function updateRoomPreview() {
        const room = getSelectedRoom();
        const meta = roomMeta[room];

        if (!meta) {
            return;
        }

        roomPreviewImage.src = meta.image;
        roomPreviewImage.alt = meta.name;
        roomPreviewName.textContent = meta.name;
        roomPreviewRating.textContent = '⭐ ' + meta.rating;
        roomPreviewDesc.textContent = meta.desc;
        roomPreviewPrice.innerHTML = meta.price + ' <small>/ night</small>';

        summaryRoom.textContent = meta.name;
        summaryRate.textContent = meta.price + ' / night';

        updateSummary();
    }

    function updateDisplayFields() {
        bookingDateInput.value = selectedCheckIn;
        checkoutDateInput.value = selectedCheckOut;

        checkInDisplay.value = readableDate(selectedCheckIn);
        checkOutDisplay.value = readableDate(selectedCheckOut);

        updateSummary();
    }

    function updateSummary() {
        const room = getSelectedRoom();
        const meta = roomMeta[room];

        if (!meta) {
            summaryNights.textContent = 'Select dates';
            summaryTotal.textContent = '₱0';
            return;
        }

        const nights = calculateNights();

        if (nights <= 0) {
            summaryNights.textContent = 'Select dates';
            summaryTotal.textContent = '₱0';
            return;
        }

        const rate = priceToNumber(meta.price);
        const total = rate * nights;

        summaryNights.textContent = nights + (nights === 1 ? ' night' : ' nights');
        summaryTotal.textContent = formatPeso(total);
    }

    function showNote(message) {
        calendarNote.textContent = message;
    }

    function renderCalendar() {
        calendarDays.innerHTML = '';
        calendarTitle.textContent = monthNames[currentMonth] + ' ' + currentYear;

        const firstDay = new window.Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new window.Date(currentYear, currentMonth + 1, 0).getDate();

        const bookedDates = getBookedDates();
        const today = todayKey();

        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement('button');
            emptyDay.type = 'button';
            emptyDay.className = 'day empty';
            emptyDay.disabled = true;
            calendarDays.appendChild(emptyDay);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateKey = makeDateKey(currentYear, currentMonth, day);

            const dayButton = document.createElement('button');
            dayButton.type = 'button';
            dayButton.className = 'day';
            dayButton.textContent = day;
            dayButton.dataset.date = dateKey;

            const isPast = dateKey < today;
            const isBooked = bookedDates.includes(dateKey);
            const isToday = dateKey === today;

            if (isToday) {
                dayButton.classList.add('today');
            }

            if (isPast) {
                dayButton.classList.add('past');
                dayButton.disabled = true;
            } else if (isBooked) {
                dayButton.classList.add('booked');
                dayButton.disabled = true;
            } else {
                dayButton.addEventListener('click', function () {
                    selectDate(dateKey);
                });
            }

            if (selectedCheckIn && selectedCheckOut) {
                const selectedRange = dateRange(selectedCheckIn, selectedCheckOut);

                if (selectedRange.includes(dateKey)) {
                    dayButton.classList.add('in-range');
                }
            }

            if (dateKey === selectedCheckIn) {
                dayButton.classList.add('selected-start');
            }

            if (dateKey === selectedCheckOut) {
                dayButton.classList.add('selected-end');
            }

            calendarDays.appendChild(dayButton);
        }

        updateDisplayFields();
    }

    function selectDate(dateKey) {
        if (!selectedCheckIn || (selectedCheckIn && selectedCheckOut)) {
            selectedCheckIn = dateKey;
            selectedCheckOut = '';

            showNote('Check-in selected. Now choose your check-out date.');
            renderCalendar();
            return;
        }

        if (dateKey < selectedCheckIn) {
            selectedCheckIn = dateKey;
            selectedCheckOut = '';

            showNote('Check-in changed. Now choose your check-out date.');
            renderCalendar();
            return;
        }

        if (rangeHasBookedDate(selectedCheckIn, dateKey)) {
            selectedCheckOut = '';

            showNote('This date range includes a booked date. Please choose another available range.');
            renderCalendar();
            return;
        }

        selectedCheckOut = dateKey;

        showNote('Dates selected successfully. You can now submit your reservation.');
        renderCalendar();
    }

    document.getElementById('prevMonth').addEventListener('click', function () {
        currentMonth--;

        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }

        renderCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', function () {
        currentMonth++;

        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }

        renderCalendar();
    });

    roomSelect.addEventListener('change', function () {
        selectedCheckIn = '';
        selectedCheckOut = '';

        updateRoomPreview();
        updateDisplayFields();

        showNote('Room changed. Please select your check-in and check-out dates again.');
        renderCalendar();
    });

    bookingForm.addEventListener('submit', function (event) {
        if (!selectedCheckIn || !selectedCheckOut) {
            event.preventDefault();
            showNote('Please select both check-in and check-out dates using the calendar.');
        }
    });

    updateRoomPreview();
    renderCalendar();
</script>
</body>
</html>