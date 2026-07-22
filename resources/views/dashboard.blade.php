<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rooms | Bella Vista Suites</title>
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
            background: rgba(255, 238, 238, 0.92);
            color: #8e3232;
            font-weight: 850;
            border: 1px solid rgba(142, 50, 50, 0.18);
            margin-bottom: 14px;
            line-height: 1.5;
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
                    rgba(255, 255, 255, 0.82),
                    rgba(255, 255, 255, 0.52),
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
            max-width: 720px;
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

        .rooms-section {
            padding-top: 4px;
        }

        .section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
        }

        .section-heading h2 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 40px;
            font-weight: 800;
            letter-spacing: -0.8px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .section-heading p {
            margin-top: 6px;
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .room-count {
            padding: 12px 18px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.84);
            font-size: 13px;
            font-weight: 950;
            white-space: nowrap;
            box-shadow: var(--soft-shadow);
        }

        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .room-card {
            position: relative;
            border-radius: 32px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.84);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: var(--soft-shadow);
            transition: 0.25s ease;
        }

        .room-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        .room-image {
            height: 200px;
            position: relative;
            overflow: hidden;
            background: var(--cream);
        }

        .room-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            transition: 0.35s ease;
        }

        .room-card:hover .room-image img {
            transform: scale(1.06);
        }

        .room-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.02), rgba(47,31,43,0.24));
        }

        .room-badge {
            position: absolute;
            top: 13px;
            left: 13px;
            z-index: 2;
            padding: 8px 12px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 11px;
            font-weight: 950;
            box-shadow: 0 12px 26px rgba(63, 53, 52, 0.22);
        }

        .rating {
            position: absolute;
            top: 13px;
            right: 13px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 11px;
            border-radius: 999px;
            background: rgba(255,255,255,0.95);
            color: #7c5b17;
            font-size: 12px;
            font-weight: 950;
            box-shadow: 0 10px 25px rgba(80, 38, 63, 0.12);
        }

        .room-body {
            padding: 20px 22px 22px;
        }

        .room-title-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 6px;
        }

        .room-mini-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(248, 242, 239, 0.92);
            color: #7c614f;
            font-size: 17px;
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .room-body h3 {
            font-family: Georgia, "Times New Roman", serif;
            color: var(--dark);
            font-size: 24px;
            font-weight: 800;
            line-height: 1.1;
        }

        .room-desc {
            color: var(--text);
            font-size: 12px;
            line-height: 1.55;
            font-weight: 800;
            margin-bottom: 13px;
            min-height: 36px;
        }

        .room-features {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 16px;
        }

        .room-features span {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.90);
            color: var(--dark);
            border: 1px solid rgba(255, 255, 255, 0.84);
            font-size: 11px;
            font-weight: 850;
            white-space: nowrap;
        }

        .room-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .price {
            color: #315d78;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 27px;
            font-weight: 800;
            line-height: 1;
            white-space: nowrap;
        }

        .price small {
            color: var(--text);
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
            font-size: 11px;
            font-weight: 850;
        }

        .book-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            border-radius: 999px;
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            font-size: 12px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.22);
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .book-btn:hover {
            transform: translateY(-2px);
        }

        .empty {
            padding: 46px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.86);
            color: var(--text);
            text-align: center;
            font-weight: 850;
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: var(--soft-shadow);
        }

        @media (max-width: 1100px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav {
                justify-content: flex-start;
            }

            .rooms-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .section-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .rooms-grid {
                grid-template-columns: 1fr;
            }

            .room-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .book-btn {
                width: 100%;
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
    $roomList = collect($rooms ?? []);
    $unreadCount = auth()->user()->unreadNotifications()->count();

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

    $featureSets = [
        'Blush Suite' => ['👥 2 Guests', '🛏️ Queen Bed', '📶 Free Wi-Fi'],
        'Vista Deluxe' => ['🌅 Peaceful View', '🛋️ Deluxe Space', '📶 Free Wi-Fi'],
        'Pearl Family Room' => ['👨‍👩‍👧 Family Friendly', '🧳 Large Room', '💗 Comfort Stay'],
        'Rose Executive' => ['💼 Executive Stay', '👑 Premium Space', '📶 Free Wi-Fi'],
        'Garden Cozy Room' => ['🌿 Garden Feel', '☕ Cozy Corner', '📶 Free Wi-Fi'],
        'Bella Presidential' => ['💎 Luxury Suite', '🛏️ King Bed', '✨ Premium Room'],
        'Sunset Premier Room' => ['🌇 Sunset Style', '🛏️ Queen Bed', '📶 Free Wi-Fi'],
        'Ocean View Suite' => ['🌊 View Suite', '🛋️ Spacious Room', '☕ Coffee Corner'],
        'Royal Comfort Room' => ['👑 Royal Interior', '🛏️ King Bed', '🧺 Long Stay'],
        'Couple Serenity Suite' => ['💗 Couple Stay', '🕯️ Romantic Room', '🛏️ Queen Bed'],
        'Modern Studio Room' => ['🧳 Solo Friendly', '💻 Work Desk', '📶 Free Wi-Fi'],
        'Grand Family Suite' => ['👨‍👩‍👧‍👦 Family Suite', '🛏️ Multiple Beds', '🧳 Large Space'],
    ];
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
            <div class="eyebrow">Welcome to Bella Vista Suites</div>

            <h2>
                Available <strong>Rooms</strong>
            </h2>

            <p>
                Discover comfort, elegance, and relaxation in every stay. Choose from our professionally curated hotel rooms with transparent rates and instant booking.
            </p>

            <div class="hero-actions">
                <a href="#rooms" class="hero-btn primary">Explore Rooms</a>
                <a href="{{ route('book-now') }}" class="hero-btn secondary">Book Now</a>
            </div>
        </section>

        <section id="rooms" class="rooms-section">
            <div class="section-heading">
                <div>
                    <h2>Explore Our Rooms</h2>
                    <p>Select a room below and proceed to booking.</p>
                </div>

                <div class="room-count">
                    {{ $roomList->count() }} Available Room Choices
                </div>
            </div>

            @if($roomList->count() > 0)
                <div class="rooms-grid">
                    @foreach($roomList as $index => $room)
                        @php
                            $roomName = $room['name'] ?? 'Room';
                            $roomDesc = $room['desc'] ?? 'Comfortable room for your stay.';
                            $roomImage = $room['image'] ?? 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80';
                            $roomPrice = $prices[$roomName] ?? '₱4,999';
                            $roomRating = $ratings[$roomName] ?? '4.8';
                            $roomFeatures = $featureSets[$roomName] ?? ['🛏️ Comfortable Bed', '📶 Free Wi-Fi', '✨ Cozy Stay'];
                        @endphp

                        <article class="room-card">
                            <div class="room-image">
                                <img src="{{ $roomImage }}" alt="{{ $roomName }}">

                                <div class="room-badge">
                                    {{ $index === 0 ? 'Featured' : 'Available' }}
                                </div>

                                <div class="rating">
                                    ⭐ {{ $roomRating }}
                                </div>
                            </div>

                            <div class="room-body">
                                <div class="room-title-row">
                                    <div class="room-mini-icon">✾</div>

                                    <div>
                                        <h3>{{ $roomName }}</h3>
                                    </div>
                                </div>

                                <p class="room-desc">
                                    {{ $roomDesc }}
                                </p>

                                <div class="room-features">
                                    @foreach($roomFeatures as $feature)
                                        <span>{{ $feature }}</span>
                                    @endforeach
                                </div>

                                <div class="room-footer">
                                    <div class="price">
                                        {{ $roomPrice }}
                                        <small>/ night</small>
                                    </div>

                                    <a href="{{ route('book-now', ['room' => $roomName]) }}" class="book-btn">
                                        Book This Room →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    No rooms available yet.
                </div>
            @endif
        </section>
    </main>
</div>
</body>
</html>