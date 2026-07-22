<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Reservations | Bella Vista Suites</title>
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
        select {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 16px 0 50px;
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

        .brand-icon {
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
            flex-shrink: 0;
        }

        .brand h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .brand span {
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
            text-decoration: none;
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
            min-height: 270px;
            border-radius: 42px;
            padding: 48px 52px;
            overflow: hidden;
            position: relative;
            background:
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.84),
                    rgba(255, 255, 255, 0.56),
                    rgba(255, 255, 255, 0.18)
                ),
                url("https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            margin-bottom: 22px;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(210, 220, 228, 0.38);
            right: 10%;
            top: -100px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 850px;
        }

        .hero small {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.84);
            color: #7c614f;
            font-size: 12px;
            font-weight: 950;
            margin-bottom: 14px;
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
        }

        .hero h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(42px, 5vw, 64px);
            line-height: 1;
            letter-spacing: -1.7px;
            color: var(--dark);
            font-weight: 800;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .hero h2 strong {
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
            font-size: 15px;
            font-weight: 850;
            line-height: 1.7;
            max-width: 780px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .summary-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            min-height: 116px;
            padding: 20px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            display: flex;
            align-items: center;
            gap: 14px;
            transition: 0.22s ease;
        }

        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .summary-icon {
            width: 56px;
            height: 56px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 25px;
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .summary-card span {
            display: block;
            color: var(--text);
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 5px;
        }

        .summary-card h3 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            line-height: 1;
            font-weight: 900;
        }

        .panel {
            padding: 26px;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            overflow: visible;
        }

        .panel-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
        }

        .panel-header h3 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            color: var(--dark);
            font-weight: 800;
            line-height: 1.1;
        }

        .panel-header p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
            line-height: 1.5;
        }

        .table-note {
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--dark);
            font-size: 13px;
            font-weight: 950;
            white-space: nowrap;
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: var(--soft-shadow);
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: separate;
            border-spacing: 0 12px;
            min-width: 0;
        }

        thead th {
            padding: 14px 10px;
            text-align: left;
            color: var(--dark);
            font-size: 11px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: 0.35px;
            background: rgba(248, 242, 239, 0.92);
            border-top: 1px solid rgba(255, 255, 255, 0.86);
            border-bottom: 1px solid rgba(255, 255, 255, 0.86);
        }

        thead th:nth-child(1) {
            width: 11%;
        }

        thead th:nth-child(2) {
            width: 15%;
        }

        thead th:nth-child(3) {
            width: 14%;
        }

        thead th:nth-child(4) {
            width: 10%;
        }

        thead th:nth-child(5) {
            width: 10%;
        }

        thead th:nth-child(6) {
            width: 7%;
        }

        thead th:nth-child(7) {
            width: 12%;
        }

        thead th:nth-child(8) {
            width: 21%;
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
            padding: 15px 10px;
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
            vertical-align: middle;
            border-top: 1px solid rgba(210, 220, 228, 0.60);
            border-bottom: 1px solid rgba(210, 220, 228, 0.60);
            word-break: break-word;
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
            line-height: 1.35;
            word-break: break-word;
        }

        .guest {
            display: block;
            font-weight: 950;
            color: var(--dark);
            line-height: 1.35;
            word-break: break-word;
        }

        .email {
            display: block;
            margin-top: 4px;
            color: #6f625f;
            font-size: 11px;
            font-weight: 750;
            line-height: 1.35;
            word-break: break-word;
        }

        .room-name {
            font-weight: 950;
            color: var(--dark);
            line-height: 1.35;
            word-break: break-word;
        }

        .date-text {
            font-weight: 900;
            color: var(--text);
            line-height: 1.35;
            word-break: break-word;
        }

        .guest-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            padding: 8px 10px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            color: #315d78;
            font-weight: 950;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .notes {
            line-height: 1.4;
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
            word-break: break-word;
        }

        .status-form {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
            white-space: nowrap;
        }

        .status-select {
            width: 112px;
            min-width: 112px;
            max-width: 112px;
            padding: 10px 10px;
            border-radius: 999px;
            border: 1px solid rgba(210, 220, 228, 0.80);
            font-size: 11px;
            font-weight: 950;
            outline: none;
            cursor: pointer;
            flex-shrink: 0;
        }

        .status-select.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-select.confirmed {
            background: #dcfce7;
            color: #166534;
        }

        .status-select.completed {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-select.cancelled {
            background: #ffe4e6;
            color: #be123c;
        }

        .update-btn {
            border: none;
            cursor: pointer;
            padding: 10px 12px;
            border-radius: 999px;
            color: white;
            font-size: 11px;
            font-weight: 950;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            box-shadow: 0 12px 26px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
            flex-shrink: 0;
            white-space: nowrap;
        }

        .update-btn:hover {
            transform: translateY(-2px);
        }

        .locked-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 13px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: 950;
            border: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .locked-status.completed {
            background: #dbeafe;
            color: #1d4ed8;
            border-color: #bfdbfe;
        }

        .locked-status.cancelled {
            background: #ffe4e6;
            color: #be123c;
            border-color: #fecdd3;
        }

        .locked-status span {
            padding: 4px 8px;
            border-radius: 999px;
            background: white;
            color: var(--blue);
            font-size: 10px;
            font-weight: 950;
        }

        .total-box {
            margin-top: 18px;
            padding: 16px;
            border-radius: 20px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--text);
            font-weight: 950;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .empty {
            padding: 48px;
            text-align: center;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.90);
            color: var(--text);
            font-weight: 850;
            border: 1px dashed rgba(85, 117, 137, 0.30);
            box-shadow: var(--soft-shadow);
        }

        @media (max-width: 1180px) {
            .summary-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            table {
                border-spacing: 0;
            }

            tbody {
                display: grid;
                gap: 16px;
            }

            tbody tr {
                border-radius: 26px;
                padding: 18px;
                background: rgba(255, 255, 255, 0.94);
            }

            td {
                display: grid;
                grid-template-columns: 145px 1fr;
                gap: 12px;
                padding: 11px 0;
                border: none;
                font-size: 13px;
            }

            td:first-child,
            td:last-child {
                border: none;
                border-radius: 0;
            }

            td::before {
                content: attr(data-label);
                color: var(--dark);
                font-weight: 950;
                font-size: 12px;
                text-transform: uppercase;
            }

            td[data-label="Status Control"] .status-form {
                display: flex;
                flex-direction: row;
                align-items: center;
                flex-wrap: nowrap;
                white-space: nowrap;
            }

            td[data-label="Status Control"] .status-select {
                width: 120px;
                min-width: 120px;
                max-width: 120px;
            }

            td[data-label="Status Control"] .update-btn {
                flex-shrink: 0;
                white-space: nowrap;
            }
        }

        @media (max-width: 900px) {
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

            .brand h1 {
                font-size: 23px;
            }

            .summary-row {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 30px 24px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .top-nav a,
            .top-nav button {
                font-size: 12px;
                padding: 9px 13px;
            }

            .panel {
                padding: 18px;
            }

            td {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            td[data-label="Status Control"] .status-form {
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>
@php
    $bookings = collect($bookings ?? []);

    $totalReservations = $bookings->count();

    $pendingCount = $bookings->filter(function ($booking) {
        return strtolower($booking->status ?? 'pending') === 'pending';
    })->count();

    $confirmedCount = $bookings->filter(function ($booking) {
        return strtolower($booking->status ?? '') === 'confirmed';
    })->count();

    $completedCount = $bookings->filter(function ($booking) {
        return strtolower($booking->status ?? '') === 'completed';
    })->count();

    $cancelledCount = $bookings->filter(function ($booking) {
        return strtolower($booking->status ?? '') === 'cancelled';
    })->count();

    $unreadCount = auth()->user()->unreadNotifications()->count();
@endphp

<div class="page">
    <header>
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-icon">B</div>

            <div>
                <h1>Bella Vista Suites</h1>
                <span>Admin Management Panel</span>
            </div>
        </a>

        <nav class="top-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.calendar') }}" class="{{ request()->routeIs('admin.calendar') ? 'active' : '' }}">
                Calendar
            </a>

            <a href="{{ route('admin.reservations') }}" class="{{ request()->routeIs('admin.reservations') ? 'active' : '' }}">
                Reservations
            </a>

            <a href="{{ route('admin.menu.index') }}" class="{{ request()->routeIs('admin.menu.index') ? 'active' : '' }}">
                Menu Management
            </a>

            <a href="{{ route('admin.notifications') }}" class="{{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                Notifications
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

        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <section class="hero">
            <div class="hero-content">
               

                <h2>
                    Manage hotel bookings with a
                    <strong>seaside admin panel.</strong>
                </h2>

                <p>
                    Review guest reservations, update booking status, monitor pending requests, and keep hotel operations organized in one professional admin page.
                </p>
            </div>
        </section>

        

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h3>All Reservations</h3>

                    <p>
                        Completed and cancelled reservations are locked and cannot be changed again.
                    </p>
                </div>

                <div class="table-note">
                    {{ $bookings->count() }} reservation record/s
                </div>
            </div>

            @if($bookings->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Guest</th>
                            <th>Room Type</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Guests</th>
                            <th>Notes</th>
                            <th>Status Control</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($bookings as $booking)
                            @php
                                $currentStatus = strtolower($booking->status ?? 'pending');
                                $isFinalStatus = in_array($currentStatus, ['completed', 'cancelled']);
                            @endphp

                            <tr>
                                <td class="booking-code" data-label="Booking ID">
                                    {{ $booking->booking_code }}
                                </td>

                                <td data-label="Guest">
                                    <span class="guest">{{ $booking->user->name ?? 'Guest' }}</span>
                                    <span class="email">{{ $booking->user->email ?? 'No email' }}</span>
                                </td>

                                <td data-label="Room Type">
                                    <span class="room-name">{{ $booking->service_name }}</span>
                                </td>

                                <td class="date-text" data-label="Check-in">
                                    {{ $booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') : 'N/A' }}
                                </td>

                                <td class="date-text" data-label="Check-out">
                                    {{ $booking->checkout_date ? \Carbon\Carbon::parse($booking->checkout_date)->format('M d, Y') : 'N/A' }}
                                </td>

                                <td data-label="Guests">
                                    <span class="guest-count">{{ $booking->guests }}</span>
                                </td>

                                <td class="notes" data-label="Notes">
                                    {{ $booking->notes ?: 'No notes' }}
                                </td>

                                <td data-label="Status Control">
                                    @if($isFinalStatus)
                                        <div class="locked-status {{ $currentStatus }}">
                                            {{ ucfirst($currentStatus) }}
                                        </div>
                                    @else
                                        <form method="POST" action="{{ route('admin.reservations.status', $booking) }}" class="status-form">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" class="status-select {{ $currentStatus }}">
                                                <option value="pending" {{ $currentStatus === 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>

                                                <option value="confirmed" {{ $currentStatus === 'confirmed' ? 'selected' : '' }}>
                                                    Confirmed
                                                </option>

                                                <option value="completed">
                                                    Completed
                                                </option>

                                                <option value="cancelled">
                                                    Cancelled
                                                </option>
                                            </select>

                                            <button type="submit" class="update-btn">
                                                Update
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total-box">
                    Total Reservations: {{ $bookings->count() }}
                </div>
            @else
                <div class="empty">
                    No reservations yet.
                </div>
            @endif
        </section>
    </main>
</div>

<script>
    const statusSelects = document.querySelectorAll('.status-select');

    statusSelects.forEach(function (select) {
        select.addEventListener('change', function () {
            select.classList.remove('pending', 'confirmed', 'completed', 'cancelled');
            select.classList.add(select.value);
        });
    });
</script>
</body>
</html>