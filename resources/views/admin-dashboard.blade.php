<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Bella Vista Suites</title>
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

        .hero {
            min-height: 260px;
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

        .quick-info {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .info-pill {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.84);
            color: var(--dark);
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 22px;
        }

        .stat-card {
            min-height: 118px;
            padding: 23px 26px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
            display: grid;
            grid-template-columns: 74px 1fr auto;
            align-items: center;
            gap: 18px;
            transition: 0.22s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 31px;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .stat-card span {
            display: block;
            color: var(--dark);
            font-size: 13px;
            font-weight: 950;
            margin-bottom: 6px;
        }

        .stat-card p {
            color: var(--text);
            font-size: 12px;
            font-weight: 750;
            margin-top: 4px;
        }

        .stat-number {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 46px;
            line-height: 1;
            font-weight: 900;
            text-align: right;
        }

        .wide-section {
            display: grid;
            gap: 20px;
        }

        .wide-panel {
            padding: 26px;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--soft-shadow);
        }

        .panel-header {
            margin-bottom: 20px;
        }

        .panel-header h3 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            color: var(--dark);
            font-weight: 800;
        }

        .panel-header p {
            margin-top: 6px;
            color: var(--text);
            font-weight: 800;
            line-height: 1.5;
        }

        .overview-wide {
            display: grid;
            grid-template-columns: 190px 1fr;
            gap: 24px;
            align-items: center;
        }

        .donut-wrap {
            display: grid;
            place-items: center;
        }

        .donut {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background:
                conic-gradient(
                    #9f7d6a 0 50%,
                    #557589 50% 76%,
                    #60a5fa 76% 88%,
                    #f59e0b 88% 100%
                );
            display: grid;
            place-items: center;
            position: relative;
            box-shadow: 0 18px 45px rgba(63, 53, 52, 0.12);
        }

        .donut::after {
            content: "";
            position: absolute;
            width: 104px;
            height: 104px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.94);
        }

        .donut span {
            position: relative;
            z-index: 2;
            text-align: center;
            font-family: Georgia, "Times New Roman", serif;
            font-weight: 900;
            color: var(--dark);
            font-size: 34px;
        }

        .donut span small {
            display: block;
            color: var(--text);
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
            font-size: 12px;
            margin-top: 3px;
            font-weight: 850;
        }

        .overview-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .overview-item {
            min-height: 95px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--text);
            font-weight: 850;
            font-size: 14px;
            padding: 16px;
            border-radius: 24px;
            background: rgba(248, 242, 239, 0.90);
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .overview-left {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .overview-item strong {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            font-weight: 900;
        }

        .mini-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            display: inline-block;
        }

        .pink {
            background: #9f7d6a;
        }

        .purple {
            background: #557589;
        }

        .orange {
            background: #f59e0b;
        }

        .blue {
            background: #60a5fa;
        }

        .recent-list {
            display: grid;
            gap: 13px;
        }

        .reservation-item {
            min-height: 88px;
            padding: 16px 18px;
            border-radius: 26px;
            background: rgba(248, 242, 239, 0.90);
            border: 1px solid rgba(255, 255, 255, 0.84);
            display: grid;
            grid-template-columns: 66px 1fr auto;
            gap: 15px;
            align-items: center;
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.07);
        }

        .room-thumb {
            width: 66px;
            height: 58px;
            border-radius: 18px;
            background:
                linear-gradient(135deg, rgba(222, 195, 179, 0.20), rgba(210, 220, 228, 0.20)),
                url("https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=300&q=80");
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.82);
        }

        .reservation-item h4 {
            color: var(--dark);
            font-size: 15px;
            font-weight: 950;
            margin-bottom: 4px;
        }

        .reservation-item p {
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
            line-height: 1.35;
        }

        .status {
            padding: 9px 13px;
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

        .empty-text {
            color: var(--text);
            font-weight: 850;
            padding: 18px;
            border-radius: 22px;
            background: rgba(248, 242, 239, 0.90);
            border: 1px dashed rgba(85, 117, 137, 0.30);
        }

        @media (max-width: 1050px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .overview-wide {
                grid-template-columns: 1fr;
            }

            .overview-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 750px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .brand h1 {
                font-size: 23px;
            }

            .hero {
                padding: 30px 24px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .stats-grid,
            .overview-list {
                grid-template-columns: 1fr;
            }

            .stat-card,
            .reservation-item {
                grid-template-columns: 1fr;
            }

            .stat-number {
                text-align: left;
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
    $items = collect($calendarBookings ?? []);

    $pendingCount = $items->filter(function ($item) {
        return strtolower($item['status'] ?? 'pending') === 'pending';
    })->count();

    $confirmedCount = $items->filter(function ($item) {
        return strtolower($item['status'] ?? '') === 'confirmed';
    })->count();

    $completedCount = $items->filter(function ($item) {
        return strtolower($item['status'] ?? '') === 'completed';
    })->count();

    $cancelledCount = $items->filter(function ($item) {
        return strtolower($item['status'] ?? '') === 'cancelled';
    })->count();

    $recentReservations = $items->take(5);
    $unreadCount = auth()->user()->unreadNotifications()->count();
@endphp

<div class="page">
    <header>
        <div class="brand">
            <div class="brand-icon">B</div>

            <div>
                <h1>Bella Vista Suites</h1>
                <span>Admin Management Panel</span>
            </div>
        </div>

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
        @if(session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <section class="hero">
            <div class="hero-content">
                <small>Hotel Administration</small>

                <h2>
                    Manage hotel operations through a
                    <strong>seaside admin dashboard.</strong>
                </h2>

                <p>
                    Monitor registered users, booked dates, reservation status, and recent hotel activity using a clean and organized admin layout.
                </p>

                <div class="quick-info">
                    <span class="info-pill">
                        Today: {{ now()->format('M d, Y') }}
                    </span>

                    <span class="info-pill">
                        Logged in as: Administrator
                    </span>
                </div>
            </div>
        </section>

        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📅</div>

                <div>
                    <span>Total Booked Dates</span>
                    <p>All reserved calendar dates</p>
                </div>

                <h3 class="stat-number">
                    {{ $totalBookedDates }}
                </h3>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👥</div>

                <div>
                    <span>Total Users</span>
                    <p>Registered user accounts</p>
                </div>

                <h3 class="stat-number">
                    {{ $totalUsers }}
                </h3>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🛏️</div>

                <div>
                    <span>Total Reservations</span>
                    <p>Overall booking records</p>
                </div>

                <h3 class="stat-number">
                    {{ $totalBookings }}
                </h3>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📄</div>

                <div>
                    <span>Pending Reservations</span>
                    <p>Bookings waiting for confirmation</p>
                </div>

                <h3 class="stat-number">
                    {{ $pendingCount }}
                </h3>
            </div>
        </section>

        <section class="wide-section">
            <div class="wide-panel">
                <div class="panel-header">
                    <h3>Reservations Overview</h3>

                    <p>
                        A quick summary of reservation status records inside the hotel booking system.
                    </p>
                </div>

                <div class="overview-wide">
                    <div class="donut-wrap">
                        <div class="donut">
                            <span>
                                {{ $totalBookings }}
                                <small>Total</small>
                            </span>
                        </div>
                    </div>

                    <div class="overview-list">
                        <div class="overview-item">
                            <span class="overview-left">
                                <i class="mini-dot pink"></i>
                                Pending
                            </span>

                            <strong>{{ $pendingCount }}</strong>
                        </div>

                        <div class="overview-item">
                            <span class="overview-left">
                                <i class="mini-dot purple"></i>
                                Confirmed
                            </span>

                            <strong>{{ $confirmedCount }}</strong>
                        </div>

                        <div class="overview-item">
                            <span class="overview-left">
                                <i class="mini-dot blue"></i>
                                Completed
                            </span>

                            <strong>{{ $completedCount }}</strong>
                        </div>

                        <div class="overview-item">
                            <span class="overview-left">
                                <i class="mini-dot orange"></i>
                                Cancelled
                            </span>

                            <strong>{{ $cancelledCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wide-panel">
                <div class="panel-header">
                    <h3>Recent Reservations</h3>

                    <p>
                        Latest booking activity submitted by users.
                    </p>
                </div>

                <div class="recent-list">
                    @forelse($recentReservations as $reservation)
                        @php
                            $currentStatus = strtolower($reservation['status'] ?? 'pending');
                        @endphp

                        <div class="reservation-item">
                            <div class="room-thumb"></div>

                            <div>
                                <h4>{{ $reservation['booking_code'] }}</h4>

                                <p>
                                    {{ $reservation['service_name'] }}<br>
                                    Guest: {{ $reservation['user_name'] }} • {{ $reservation['guests'] }} guest/s
                                </p>
                            </div>

                            <span class="status {{ $currentStatus }}">
                                {{ ucfirst($currentStatus) }}
                            </span>
                        </div>
                    @empty
                        <p class="empty-text">
                            No reservations yet.
                        </p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>