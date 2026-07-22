<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reservations | Bella Vista Suites</title>
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

        button {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 16px 0 45px;
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

        .success-alert {
            background: rgba(224, 245, 232, 0.94);
            color: #315d4d;
            border-color: rgba(49, 93, 77, 0.18);
        }

        .hero {
            min-height: 260px;
            border-radius: 42px;
            overflow: hidden;
            padding: 48px 52px;
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
            margin-bottom: 28px;
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
            font-size: clamp(42px, 5vw, 64px);
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
            margin-top: 14px;
            color: var(--text);
            font-size: 14px;
            line-height: 1.7;
            font-weight: 850;
            max-width: 760px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .hero-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 19px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .hero-btn:hover {
            transform: translateY(-2px);
        }

        .hero-btn.primary {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
        }

        .hero-btn.secondary {
            color: var(--dark);
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .reservation-panel {
            padding: 24px;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            overflow-x: auto;
        }

        .panel-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
        }

        .panel-heading h2 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 40px;
            font-weight: 800;
            letter-spacing: -0.8px;
        }

        .panel-heading p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
        }

        .record-count {
            padding: 12px 18px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.84);
            font-size: 13px;
            font-weight: 950;
            white-space: nowrap;
            box-shadow: var(--soft-shadow);
        }

        table {
            width: 100%;
            min-width: 1120px;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        thead th {
            padding: 13px 15px;
            text-align: left;
            color: var(--dark);
            font-size: 12px;
            font-weight: 950;
            text-transform: uppercase;
            background: rgba(248, 242, 239, 0.92);
            border-top: 1px solid rgba(255, 255, 255, 0.86);
            border-bottom: 1px solid rgba(255, 255, 255, 0.86);
            white-space: nowrap;
        }

        thead th:first-child {
            border-left: 1px solid rgba(255, 255, 255, 0.86);
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
        }

        thead th:last-child {
            border-right: 1px solid rgba(255, 255, 255, 0.86);
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px;
        }

        tbody tr {
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.08);
            transition: 0.22s ease;
        }

        tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(63, 53, 52, 0.12);
        }

        td {
            padding: 15px;
            color: var(--text);
            font-weight: 800;
            vertical-align: middle;
            border-top: 1px solid rgba(210, 220, 228, 0.60);
            border-bottom: 1px solid rgba(210, 220, 228, 0.60);
            white-space: nowrap;
        }

        td:first-child {
            border-left: 1px solid rgba(210, 220, 228, 0.60);
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        td:last-child {
            border-right: 1px solid rgba(210, 220, 228, 0.60);
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .booking-code {
            color: #315d78;
            font-weight: 950;
        }

        .room-name {
            color: var(--dark);
            font-weight: 950;
        }

        .notes {
            max-width: 220px;
            white-space: normal;
            line-height: 1.45;
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
        }

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 950;
            white-space: nowrap;
        }

        .status.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status.confirmed {
            background: #dcfce7;
            color: #166534;
        }

        .status.completed {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status.cancelled {
            background: #ffe4e6;
            color: #be123c;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .cancel-btn,
        .locked-btn {
            border: none;
            cursor: pointer;
            padding: 9px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .cancel-btn {
            color: white;
            background: linear-gradient(135deg, #9b3b3b, #c77272);
            box-shadow: 0 12px 26px rgba(155, 59, 59, 0.18);
        }

        .locked-btn {
            color: var(--dark);
            background: rgba(248, 242, 239, 0.90);
            border: 1px solid rgba(210, 220, 228, 0.80);
            cursor: not-allowed;
        }

        .cancel-btn:hover {
            transform: translateY(-2px);
        }

        .empty {
            padding: 58px 24px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.90);
            color: var(--text);
            text-align: center;
            font-weight: 850;
            border: 1px dashed rgba(85, 117, 137, 0.30);
            box-shadow: var(--soft-shadow);
        }

        .empty-icon {
            width: 66px;
            height: 66px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            margin: 0 auto 16px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 30px;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .empty h3 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .empty p {
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .empty a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 19px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 12px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
        }

        .empty a:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 1100px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
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
                min-height: 250px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .panel-heading {
                flex-direction: column;
                align-items: flex-start;
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
    $items = collect($bookings ?? []);
    $unreadCount = auth()->user()->unreadNotifications()->count();
@endphp

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
        @if(session('success'))
            <div class="alert success-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <section class="hero">
            <div class="eyebrow">Bella Vista Reservation Records</div>

            <h2>
                My <strong>Reservations</strong>
            </h2>

            <p>
                Track your hotel booking details, room type, selected dates, guest count, notes, and reservation status in one clean and organized page.
            </p>

            <div class="hero-actions">
                <a href="{{ route('book-now') }}" class="hero-btn primary">Create Reservation</a>
                <a href="{{ route('dashboard') }}" class="hero-btn secondary">Explore Rooms</a>
            </div>
        </section>

        <section class="reservation-panel">
            <div class="panel-heading">
                <div>
                    <h2>Reservation Records</h2>
                    <p>Your latest hotel booking records.</p>
                </div>

                <div class="record-count">
                    {{ $items->count() }} record/s
                </div>
            </div>

            @if($items->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Room Type</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Guests</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($items as $booking)
                            @php
                                $currentStatus = strtolower($booking->status ?? 'pending');
                                $canCancel = in_array($currentStatus, ['pending', 'confirmed']);
                            @endphp

                            <tr>
                                <td class="booking-code">
                                    {{ $booking->booking_code }}
                                </td>

                                <td>
                                    <span class="room-name">{{ $booking->service_name }}</span>
                                </td>

                                <td>
                                    {{ $booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') : 'N/A' }}
                                </td>

                                <td>
                                    {{ $booking->checkout_date ? \Carbon\Carbon::parse($booking->checkout_date)->format('M d, Y') : 'N/A' }}
                                </td>

                                <td>
                                    {{ $booking->guests }}
                                </td>

                                <td class="notes">
                                    {{ $booking->notes ?: 'No notes' }}
                                </td>

                                <td>
                                    <span class="status {{ $currentStatus }}">
                                        {{ ucfirst($currentStatus) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        @if($canCancel)
                                            <form method="POST" action="{{ route('user.reservations.cancel', $booking) }}" onsubmit="return confirm('Cancel this reservation?');">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="cancel-btn">
                                                    Cancel
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="locked-btn" disabled>
                                                Cancelled
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty">
                    <div class="empty-icon">🛏️</div>

                    <h3>No reservations yet.</h3>

                    <p>
                        You have no booking records at the moment. Create your first reservation to start your Bella Vista stay.
                    </p>

                    <a href="{{ route('book-now') }}">
                        Create Reservation
                    </a>
                </div>
            @endif
        </section>
    </main>
</div>
</body>
</html>