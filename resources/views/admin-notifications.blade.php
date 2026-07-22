<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Notifications | Bella Vista Suites</title>
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
            max-width: 850px;
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
            max-width: 760px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .summary-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            min-height: 110px;
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
        }

        .panel-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(210, 220, 228, 0.75);
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

        .activity-count {
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

        .notification-list {
            display: grid;
            gap: 14px;
        }

        .notification-card {
            padding: 20px;
            border-radius: 26px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.08);
            display: grid;
            grid-template-columns: 60px 1fr auto;
            gap: 16px;
            align-items: center;
            transition: 0.22s ease;
        }

        .notification-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(63, 53, 52, 0.12);
        }

        .notification-card.unread {
            background:
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.98),
                    rgba(210, 220, 228, 0.38)
                );
            border: 1px solid rgba(85, 117, 137, 0.35);
        }

        .notif-icon {
            width: 60px;
            height: 60px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 28px;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .notification-card h4 {
            color: var(--dark);
            font-size: 17px;
            font-weight: 950;
            margin-bottom: 6px;
        }

        .notification-card p {
            color: var(--text);
            font-size: 14px;
            font-weight: 800;
            line-height: 1.5;
        }

        .chip-row {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .chip {
            display: inline-flex;
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.90);
            border: 1px solid rgba(255, 255, 255, 0.84);
            color: var(--dark);
            font-size: 12px;
            font-weight: 850;
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

        .right-actions {
            display: grid;
            gap: 9px;
            justify-items: end;
        }

        .read-badge {
            padding: 9px 13px;
            border-radius: 999px;
            background: #e5e7eb;
            color: #475569;
            font-size: 12px;
            font-weight: 950;
            white-space: nowrap;
        }

        .mark-read-btn {
            border: none;
            cursor: pointer;
            padding: 10px 14px;
            border-radius: 999px;
            color: white;
            font-size: 12px;
            font-weight: 950;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            box-shadow: 0 12px 26px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .mark-read-btn:hover {
            transform: translateY(-2px);
        }

        .empty {
            padding: 58px 24px;
            text-align: center;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.90);
            color: var(--text);
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
        }

        @media (max-width: 1100px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .summary-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .notification-card {
                grid-template-columns: 60px 1fr;
            }

            .right-actions {
                grid-column: 2;
                justify-items: start;
            }
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .brand h1 {
                font-size: 23px;
            }

            .hero {
                padding: 30px 24px;
                min-height: 250px;
            }

            .hero h2 {
                font-size: 39px;
            }

            .summary-row {
                grid-template-columns: 1fr;
            }

            .notification-card {
                grid-template-columns: 1fr;
            }

            .right-actions {
                grid-column: auto;
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
    $notifications = collect($notifications ?? auth()->user()->notifications()->latest()->get());

    $unreadCount = auth()->user()->unreadNotifications()->count();
    $readCount = $notifications->filter(fn ($notification) => ! is_null($notification->read_at))->count();
    $totalCount = $notifications->count();

    $pendingCount = $notifications->filter(function ($notification) {
        return strtolower(data_get($notification->data, 'status', 'pending')) === 'pending';
    })->count();

    $confirmedCount = $notifications->filter(function ($notification) {
        return strtolower(data_get($notification->data, 'status', '')) === 'confirmed';
    })->count();

    $completedCount = $notifications->filter(function ($notification) {
        return strtolower(data_get($notification->data, 'status', '')) === 'completed';
    })->count();
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

        <section class="hero">
            <div class="hero-content">

                <h2>
                    Monitor booking activity with
                    <strong>read status controls.</strong>
                </h2>

                <p>
                    View admin notifications, check booking details, and mark unread notifications as read.
                </p>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h3>System Notifications</h3>

                    <p>
                        Unread notifications have a Mark as Read button.
                    </p>
                </div>

                <div class="activity-count">
                    {{ $notifications->count() }} notification record/s
                </div>
            </div>

            @if($notifications->count() > 0)
                <div class="notification-list">
                    @foreach($notifications as $notification)
                        @php
                            $data = $notification->data ?? [];

                            $title = data_get($data, 'title', 'Reservation Notification');
                            $message = data_get($data, 'message', 'A booking activity has been recorded.');
                            $bookingCode = data_get($data, 'booking_code', 'N/A');
                            $serviceName = data_get($data, 'service_name', 'Room Reservation');
                            $status = strtolower(data_get($data, 'status', 'pending'));

                            $statusClass = in_array($status, ['pending', 'confirmed', 'completed', 'cancelled'])
                                ? $status
                                : 'pending';

                            $isUnread = is_null($notification->read_at);
                        @endphp

                        <div class="notification-card {{ $isUnread ? 'unread' : '' }}">
                            <div class="notif-icon">
                                {{ $isUnread ? '📩' : '🏨' }}
                            </div>

                            <div>
                                <h4>
                                    {{ $title }}
                                </h4>

                                <p>
                                    {{ $message }}
                                </p>

                                <div class="chip-row">
                                    <span class="chip">
                                        Booking ID: {{ $bookingCode }}
                                    </span>

                                    <span class="chip">
                                        Room: {{ $serviceName }}
                                    </span>

                                    <span class="chip">
                                        Status: {{ ucfirst($status) }}
                                    </span>

                                    <span class="chip">
                                        {{ $notification->created_at ? $notification->created_at->format('M d, Y h:i A') : 'No date' }}
                                    </span>
                                </div>
                            </div>

                            <div class="right-actions">
                                <span class="status {{ $statusClass }}">
                                    {{ ucfirst($status) }}
                                </span>

                                @if($isUnread)
                                    <form method="POST" action="{{ route('admin.notifications.read', $notification->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="mark-read-btn">
                                            Mark as Read
                                        </button>
                                    </form>
                                @else
                                    <span class="read-badge">
                                        Read
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon">🔔</div>

                    <h3>No notifications yet.</h3>

                    <p>
                        Admin notifications will appear here once booking activity is recorded.
                    </p>
                </div>
            @endif
        </section>
    </main>
</div>
</body>
</html>