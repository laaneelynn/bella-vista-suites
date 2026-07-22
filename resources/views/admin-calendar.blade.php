<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Calendar | Bella Vista Suites</title>
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
                url("https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600&q=80");
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            margin-bottom: 22px;
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
            max-width: 820px;
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
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
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

        .month-actions {
            display: flex;
            gap: 8px;
        }

        .month-actions button {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.84);
            background: rgba(248, 242, 239, 0.92);
            cursor: pointer;
            color: var(--blue);
            font-weight: 950;
            font-size: 20px;
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
            transition: 0.22s ease;
        }

        .month-actions button:hover {
            transform: translateY(-2px);
            background: white;
        }

        .calendar-title {
            text-align: center;
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .calendar {
            overflow: hidden;
            border-radius: 26px;
            border: 1px solid rgba(255, 255, 255, 0.86);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 14px 35px rgba(63, 53, 52, 0.08);
        }

        .weekdays,
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .weekdays div {
            padding: 13px 8px;
            text-align: center;
            color: var(--dark);
            background: rgba(248, 242, 239, 0.92);
            font-size: 12px;
            font-weight: 950;
            border-right: 1px solid rgba(210, 220, 228, 0.70);
        }

        .day {
            min-height: 105px;
            padding: 10px;
            border-top: 1px solid rgba(210, 220, 228, 0.70);
            border-right: 1px solid rgba(210, 220, 228, 0.70);
            background: rgba(255, 255, 255, 0.94);
            position: relative;
            transition: 0.22s ease;
        }

        .day.empty {
            background: rgba(248, 242, 239, 0.72);
        }

        .day-number {
            font-weight: 950;
            color: var(--dark);
        }

        .day.booked {
            background:
                linear-gradient(
                    135deg,
                    rgba(222, 195, 179, 0.34),
                    rgba(210, 220, 228, 0.40)
                );
            cursor: pointer;
        }

        .day.booked:hover {
            background:
                linear-gradient(
                    135deg,
                    rgba(222, 195, 179, 0.50),
                    rgba(210, 220, 228, 0.58)
                );
            box-shadow: inset 0 0 0 2px rgba(85, 117, 137, 0.48);
            transform: scale(1.01);
            z-index: 2;
        }

        .day.today {
            outline: 2px solid var(--blue);
            outline-offset: -5px;
        }

        .booking-badge {
            display: inline-flex;
            margin-top: 8px;
            padding: 5px 8px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 10px;
            font-weight: 950;
            box-shadow: 0 10px 22px rgba(63, 53, 52, 0.16);
        }

        .booking-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--blue);
            position: absolute;
            bottom: 11px;
            left: 50%;
            transform: translateX(-50%);
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 17px;
            color: var(--text);
            font-weight: 850;
            font-size: 13px;
        }

        .legend span {
            display: inline-flex;
            align-items: center;
        }

        .legend-dot {
            width: 15px;
            height: 15px;
            border-radius: 5px;
            display: inline-block;
            margin-right: 7px;
        }

        .booked-dot {
            background: linear-gradient(135deg, var(--brown), var(--blue));
        }

        .available-dot {
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(210, 220, 228, 0.80);
        }

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(43, 34, 33, 0.45);
            backdrop-filter: blur(8px);
            z-index: 200;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            width: min(640px, 95%);
            max-height: 86vh;
            overflow-y: auto;
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 30px 90px rgba(43, 34, 33, 0.30);
            padding: 26px;
            animation: popModal 0.2s ease;
        }

        @keyframes popModal {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(210, 220, 228, 0.75);
        }

        .modal-header h3 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 28px;
            font-weight: 800;
        }

        .modal-header p {
            margin-top: 5px;
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
        }

        .close-btn {
            border: none;
            cursor: pointer;
            min-width: 42px;
            width: 42px;
            height: 42px;
            border-radius: 15px;
            background: rgba(248, 242, 239, 0.92);
            color: var(--blue);
            font-size: 22px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .close-btn:hover {
            transform: translateY(-2px);
            background: white;
        }

        .modal-list {
            display: grid;
            gap: 13px;
        }

        .booking-card {
            padding: 18px;
            border-radius: 24px;
            background: rgba(248, 242, 239, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 12px 28px rgba(63, 53, 52, 0.08);
        }

        .booking-card-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 13px;
        }

        .booking-card h4 {
            color: var(--dark);
            font-size: 17px;
            font-weight: 950;
        }

        .booking-card .code {
            display: block;
            margin-top: 5px;
            color: #315d78;
            font-size: 12px;
            font-weight: 900;
        }

        .status {
            padding: 8px 11px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 950;
            white-space: nowrap;
            align-self: flex-start;
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

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .detail-item {
            padding: 12px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(210, 220, 228, 0.70);
        }

        .detail-item span {
            display: block;
            color: var(--text);
            font-size: 11px;
            font-weight: 850;
            margin-bottom: 5px;
        }

        .detail-item strong {
            color: var(--dark);
            font-size: 13px;
            font-weight: 950;
        }

        .empty-modal {
            padding: 26px;
            text-align: center;
            color: var(--text);
            font-weight: 850;
            border-radius: 22px;
            background: rgba(248, 242, 239, 0.92);
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

            .panel-header {
                flex-direction: column;
            }
        }

        @media (max-width: 850px) {
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

            .day {
                min-height: 72px;
                padding: 7px;
            }

            .booking-badge {
                font-size: 9px;
                padding: 4px 6px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .top-nav a,
            .top-nav button {
                font-size: 12px;
                padding: 9px 13px;
            }
        }

        @media (max-width: 620px) {
            .calendar {
                overflow-x: auto;
            }

            .weekdays,
            .days {
                min-width: 620px;
            }
        }
    </style>
</head>

<body>
@php
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
        <section class="hero">

            <h2>
                View booked dates through a
                <strong>central event calendar.</strong>
            </h2>

            <p>
                Monitor all reserved hotel dates, view booking details, and check which rooms are occupied on each calendar day.
            </p>
        </section>

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h3>Booking Event Calendar</h3>

                    <p>
                        Click any booked date to view reservation details for that day.
                    </p>
                </div>

                <div class="month-actions">
                    <button type="button" id="prevMonth">‹</button>
                    <button type="button" id="nextMonth">›</button>
                </div>
            </div>

            <div class="calendar-title" id="monthYear"></div>

            <div class="calendar">
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>

                <div class="days" id="calendarDays"></div>
            </div>

            <div class="legend">
                <span>
                    <i class="legend-dot booked-dot"></i>
                    Booked Date
                </span>

                <span>
                    <i class="legend-dot available-dot"></i>
                    Available Date
                </span>
            </div>
        </section>
    </main>
</div>

<div class="modal-overlay" id="bookingModal">
    <div class="modal-box">
        <div class="modal-header">
            <div>
                <h3 id="modalDateTitle">Booking Details</h3>
                <p id="modalSubtitle">Reservation details for the selected date.</p>
            </div>

            <button type="button" class="close-btn" id="closeModal">
                ×
            </button>
        </div>

        <div id="modalBody"></div>
    </div>
</div>

<script type="application/json" id="adminBookedDatesData">@json($allBookedDates)</script>
<script type="application/json" id="adminBookingDetailsData">@json($calendarBookings)</script>

<script>
    const bookedDates = window.JSON.parse(
        document.getElementById('adminBookedDatesData').textContent
    );

    const bookingDetails = window.JSON.parse(
        document.getElementById('adminBookingDetailsData').textContent
    );

    const calendarDays = document.getElementById('calendarDays');
    const monthYear = document.getElementById('monthYear');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');

    const bookingModal = document.getElementById('bookingModal');
    const closeModal = document.getElementById('closeModal');
    const modalDateTitle = document.getElementById('modalDateTitle');
    const modalSubtitle = document.getElementById('modalSubtitle');
    const modalBody = document.getElementById('modalBody');

    let currentDate = new window.Date();

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');

        return year + '-' + month + '-' + day;
    }

    function formatReadableDate(dateString) {
        const date = new window.Date(dateString + 'T00:00:00');

        return date.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
    }

    function getEventsForDate(dateString) {
        return bookingDetails.filter(function (item) {
            const start = item.booking_date;
            const end = item.checkout_date || item.booking_date;

            return dateString >= start && dateString <= end;
        });
    }

    function getStatus(status) {
        return String(status || 'pending').toLowerCase();
    }

    function openBookingModal(dateString, events) {
        modalDateTitle.textContent = formatReadableDate(dateString);
        modalSubtitle.textContent = events.length + ' reservation/s found on this date.';

        if (!events || events.length === 0) {
            modalBody.innerHTML = '<div class="empty-modal">No booking details found for this date.</div>';
            bookingModal.classList.add('show');
            return;
        }

        let html = '<div class="modal-list">';

        events.forEach(function (event) {
            const status = getStatus(event.status);

            html += `
                <div class="booking-card">
                    <div class="booking-card-top">
                        <div>
                            <h4>${event.service_name || 'Room Reservation'}</h4>
                            <span class="code">${event.booking_code || 'No booking code'}</span>
                        </div>

                        <span class="status ${status}">
                            ${status.charAt(0).toUpperCase() + status.slice(1)}
                        </span>
                    </div>

                    <div class="detail-grid">
                        <div class="detail-item">
                            <span>Guest</span>
                            <strong>${event.user_name || 'Guest'}</strong>
                        </div>

                        <div class="detail-item">
                            <span>Guests</span>
                            <strong>${event.guests || 1}</strong>
                        </div>

                        <div class="detail-item">
                            <span>Check-in</span>
                            <strong>${event.booking_date ? formatReadableDate(event.booking_date) : 'N/A'}</strong>
                        </div>

                        <div class="detail-item">
                            <span>Check-out</span>
                            <strong>${event.checkout_date ? formatReadableDate(event.checkout_date) : 'N/A'}</strong>
                        </div>
                    </div>
                </div>
            `;
        });

        html += '</div>';

        modalBody.innerHTML = html;
        bookingModal.classList.add('show');
    }

    function closeBookingModal() {
        bookingModal.classList.remove('show');
    }

    closeModal.addEventListener('click', closeBookingModal);

    bookingModal.addEventListener('click', function (event) {
        if (event.target === bookingModal) {
            closeBookingModal();
        }
    });

    function renderCalendar() {
        calendarDays.innerHTML = '';

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        const firstDay = new window.Date(year, month, 1);
        const lastDay = new window.Date(year, month + 1, 0);
        const startDay = firstDay.getDay();

        monthYear.textContent = currentDate.toLocaleString('default', {
            month: 'long',
            year: 'numeric'
        });

        for (let i = 0; i < startDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('day', 'empty');
            calendarDays.appendChild(emptyCell);
        }

        for (let day = 1; day <= lastDay.getDate(); day++) {
            const date = new window.Date(year, month, day);
            const dateString = formatDate(date);
            const events = getEventsForDate(dateString);

            const cell = document.createElement('div');
            cell.classList.add('day');

            const number = document.createElement('div');
            number.classList.add('day-number');
            number.textContent = day;
            cell.appendChild(number);

            if (dateString === formatDate(new window.Date())) {
                cell.classList.add('today');
            }

            if (bookedDates.includes(dateString) || events.length > 0) {
                cell.classList.add('booked');

                const badge = document.createElement('span');
                badge.classList.add('booking-badge');
                badge.textContent = events.length > 1 ? events.length + ' bookings' : 'Booked';
                cell.appendChild(badge);

                const dot = document.createElement('div');
                dot.classList.add('booking-dot');
                cell.appendChild(dot);

                cell.addEventListener('click', function () {
                    openBookingModal(dateString, events);
                });
            }

            calendarDays.appendChild(cell);
        }
    }

    prevMonth.addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
</script>
</body>
</html>