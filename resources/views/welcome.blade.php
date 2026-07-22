<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | Bella Vista Suites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --sand: #dec3b3;
            --sky: #d2dce4;
            --mist: #e7ebee;
            --shell: #e5d6ce;
            --cream: #f8f2ef;
            --dark: #3f3534;
            --text: #5f5554;
            --white: #ffffff;
            --shadow: 0 24px 70px rgba(63, 53, 52, 0.12);
            --soft-shadow: 0 16px 45px rgba(63, 53, 52, 0.08);
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
                    rgba(248, 242, 239, 0.18),
                    rgba(248, 242, 239, 0.05)
                );
            pointer-events: none;
            z-index: -1;
        }

        a {
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .page {
            width: min(1280px, 94%);
            margin: 0 auto;
            padding: 18px 0 38px;
        }

        .navbar {
            min-height: 82px;
            padding: 14px 20px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.55);
            box-shadow: var(--soft-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            position: sticky;
            top: 14px;
            z-index: 50;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--dark);
        }

        .brand-logo {
            width: 56px;
            height: 56px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.80);
            border: 1px solid rgba(255, 255, 255, 0.65);
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.12);
            font-size: 25px;
        }

        .brand h1 {
            color: #2f2726;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -0.6px;
            line-height: 1;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .brand span {
            display: block;
            margin-top: 5px;
            color: #60493d;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 2.4px;
            text-transform: uppercase;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.85);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 950;
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-light {
            color: #2f2726;
            background: rgba(255, 255, 255, 0.66);
            border: 1px solid rgba(255, 255, 255, 0.66);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
            text-shadow: 0 1px 6px rgba(255, 255, 255, 0.75);
        }

        .btn-main {
            color: var(--white);
            background: linear-gradient(135deg, #9f7d6a, #557589);
            box-shadow: 0 16px 32px rgba(63, 53, 52, 0.22);
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.28);
        }

        main {
            margin-top: 18px;
        }

        .hero-shell {
            min-height: calc(100vh - 145px);
            border-radius: 42px;
            overflow: hidden;
            position: relative;
            display: grid;
            grid-template-columns: 1.06fr 0.94fr;
            align-items: center;
            gap: 44px;
            padding: 56px;
            background: rgba(255, 255, 255, 0.26);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.48);
            box-shadow: var(--shadow);
        }

        .hero-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.30) 0%,
                    rgba(255, 255, 255, 0.16) 45%,
                    rgba(255, 255, 255, 0.08) 100%
                );
            z-index: 0;
            pointer-events: none;
        }

        .hero-content,
        .showcase-card {
            position: relative;
            z-index: 2;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            color: #2f2726;
            background: rgba(255, 255, 255, 0.70);
            border: 1px solid rgba(255, 255, 255, 0.70);
            font-size: 12px;
            font-weight: 950;
            margin-bottom: 22px;
            backdrop-filter: blur(12px);
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .hero-content h2 {
            max-width: 720px;
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(48px, 6vw, 78px);
            line-height: 0.98;
            letter-spacing: -2.5px;
            font-weight: 800;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95),
                0 10px 30px rgba(255, 255, 255, 0.82);
        }

        .hero-content h2 strong {
            display: block;
            color: #315d78;
            font-style: italic;
            font-weight: 500;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95),
                0 10px 30px rgba(255, 255, 255, 0.82);
        }

        .subtitle {
            max-width: 620px;
            margin-top: 20px;
            color: #2f2726;
            font-size: 16px;
            line-height: 1.8;
            font-weight: 900;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .hero-actions {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .mini-row {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 760px;
        }

        .mini-card {
            padding: 20px;
            border-radius: 26px;
            background: rgba(255, 255, 255, 0.54);
            border: 1px solid rgba(255, 255, 255, 0.58);
            box-shadow: 0 18px 44px rgba(63, 53, 52, 0.10);
            backdrop-filter: blur(14px);
        }

        .mini-icon {
            width: 50px;
            height: 50px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            margin-bottom: 13px;
            color: var(--dark);
            font-size: 22px;
            background: rgba(248, 242, 239, 0.76);
            border: 1px solid rgba(255, 255, 255, 0.64);
        }

        .mini-card h3 {
            color: #2b2221;
            font-size: 17px;
            font-weight: 950;
            margin-bottom: 6px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.90);
        }

        .mini-card p {
            color: #2f2726;
            font-size: 12px;
            line-height: 1.6;
            font-weight: 850;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.82);
        }

        .showcase-card {
            width: min(500px, 100%);
            justify-self: end;
            padding: 18px;
            border-radius: 38px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.66);
            box-shadow: 0 35px 90px rgba(63, 53, 52, 0.22);
        }

        .showcase-image {
            height: 300px;
            border-radius: 30px;
            overflow: hidden;
            position: relative;
            background:
                linear-gradient(135deg, rgba(222, 195, 179, 0.14), rgba(210, 220, 228, 0.14)),
                url("https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=85");
            background-size: cover;
            background-position: center;
        }

        .featured-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            padding: 10px 14px;
            border-radius: 999px;
            color: #2f2726;
            background: rgba(248, 242, 239, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.68);
            font-size: 12px;
            font-weight: 950;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.10);
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .showcase-info {
            padding: 22px 10px 8px;
            display: grid;
            grid-template-columns: 1fr 110px;
            gap: 14px;
            align-items: center;
        }

        .showcase-info small {
            color: #4d3931;
            font-weight: 950;
            font-size: 12px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .showcase-info h3 {
            margin-top: 5px;
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            line-height: 1.05;
            font-weight: 800;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.90);
        }

        .showcase-info p {
            margin-top: 8px;
            color: #2f2726;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.55;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.82);
        }

        .rating-box {
            min-height: 98px;
            border-radius: 26px;
            background: rgba(248, 242, 239, 0.76);
            border: 1px solid rgba(255, 255, 255, 0.68);
            display: grid;
            place-items: center;
            text-align: center;
            color: #2f2726;
            font-size: 12px;
            font-weight: 950;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .rating-box strong {
            display: block;
            color: #2b2221;
            font-size: 25px;
            margin-bottom: 4px;
        }

        .room-meta {
            padding: 0 10px 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .room-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.76);
            color: #2f2726;
            border: 1px solid rgba(255, 255, 255, 0.68);
            font-size: 11px;
            font-weight: 900;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .stats-bar {
            margin-top: 22px;
            padding: 22px;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            box-shadow: var(--soft-shadow);
            display: grid;
            grid-template-columns: 90px repeat(4, 1fr);
            gap: 10px;
            align-items: center;
        }

        .stats-icon {
            width: 62px;
            height: 62px;
            border-radius: 23px;
            display: grid;
            place-items: center;
            color: var(--dark);
            font-size: 27px;
            background: rgba(248, 242, 239, 0.76);
            border: 1px solid rgba(255, 255, 255, 0.68);
        }

        .stat {
            text-align: center;
            border-left: 1px solid rgba(255, 255, 255, 0.58);
        }

        .stat strong {
            display: block;
            color: #315d78;
            font-size: 27px;
            font-weight: 950;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .stat span {
            display: block;
            margin-top: 4px;
            color: #2f2726;
            font-size: 13px;
            font-weight: 900;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .section {
            padding: 58px 0 0;
        }

        .section-header {
            max-width: 780px;
            margin: 0 auto 28px;
            text-align: center;
        }

        .section-header small {
            display: inline-flex;
            padding: 9px 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.72);
            color: #2f2726;
            border: 1px solid rgba(255, 255, 255, 0.70);
            font-weight: 950;
            margin-bottom: 14px;
            backdrop-filter: blur(12px);
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        .section-header h2 {
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(34px, 4vw, 50px);
            line-height: 1.1;
            font-weight: 800;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95),
                0 10px 30px rgba(255, 255, 255, 0.82);
        }

        .section-header p {
            margin-top: 12px;
            color: #2f2726;
            font-size: 15px;
            line-height: 1.7;
            font-weight: 900;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 5px 16px rgba(255, 255, 255, 0.95);
        }

        .rooms-grid,
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .room-card,
        .amenity-card {
            overflow: hidden;
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            box-shadow: var(--soft-shadow);
            transition: 0.22s ease;
        }

        .room-card:hover,
        .amenity-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        .room-img {
            height: 220px;
            background-size: cover;
            background-position: center;
        }

        .room-body,
        .amenity-card {
            padding: 22px;
        }

        .room-body h3,
        .amenity-card h3 {
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 8px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.90);
        }

        .room-body p,
        .amenity-card p {
            color: #2f2726;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 850;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.82);
        }

        .amenity-icon {
            width: 54px;
            height: 54px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            color: var(--dark);
            font-size: 24px;
            background: rgba(248, 242, 239, 0.76);
            border: 1px solid rgba(255, 255, 255, 0.68);
            margin-bottom: 14px;
        }

        .about-panel {
            padding: 36px;
            border-radius: 36px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            box-shadow: var(--soft-shadow);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            align-items: center;
        }

        .about-image {
            min-height: 365px;
            border-radius: 30px;
            background:
                linear-gradient(135deg, rgba(222, 195, 179, 0.14), rgba(210, 220, 228, 0.14)),
                url("https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80");
            background-size: cover;
            background-position: center;
        }

        .about-text h2 {
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(34px, 4vw, 48px);
            line-height: 1.08;
            font-weight: 800;
            margin-bottom: 14px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.90);
        }

        .about-text h2 strong {
            color: #315d78;
            font-style: italic;
            font-weight: 500;
        }

        .about-text p {
            color: #2f2726;
            font-size: 15px;
            line-height: 1.8;
            font-weight: 850;
            margin-bottom: 18px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.82);
        }

        .contact-panel {
            padding: 38px;
            border-radius: 36px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            box-shadow: var(--soft-shadow);
            text-align: center;
        }

        .contact-panel h2 {
            color: #2b2221;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 800;
            margin-bottom: 12px;
            text-shadow:
                0 2px 4px rgba(255, 255, 255, 1),
                0 6px 18px rgba(255, 255, 255, 0.95);
        }

        .contact-panel p {
            max-width: 720px;
            margin: 0 auto 24px;
            color: #2f2726;
            font-size: 15px;
            line-height: 1.7;
            font-weight: 850;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.82);
        }

        footer {
            margin-top: 60px;
            padding: 24px;
            border-radius: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.64);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.62);
            color: #2f2726;
            font-weight: 900;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.88);
        }

        @media (max-width: 1120px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .navbar {
                height: auto;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-actions {
                justify-content: flex-start;
            }

            .hero-shell {
                min-height: auto;
                grid-template-columns: 1fr;
                padding: 44px 28px;
            }

            .showcase-card {
                justify-self: start;
                max-width: 100%;
            }

            .mini-row {
                grid-template-columns: repeat(3, 1fr);
            }

            .stats-bar {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-icon {
                display: none;
            }

            .stat {
                border-left: none;
            }

            .rooms-grid,
            .amenities-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-panel {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .page {
                padding-top: 14px;
            }

            .navbar {
                border-radius: 24px;
            }

            .brand h1 {
                font-size: 23px;
            }

            .hero-shell {
                border-radius: 30px;
                padding: 34px 24px;
            }

            .hero-content h2 {
                letter-spacing: -1.3px;
                font-size: 43px;
            }

            .mini-row,
            .rooms-grid,
            .amenities-grid,
            .stats-bar {
                grid-template-columns: 1fr;
            }

            .showcase-info {
                grid-template-columns: 1fr;
            }

            .showcase-image {
                height: 260px;
            }

            .section {
                padding-top: 42px;
            }

            .about-panel,
            .contact-panel {
                padding: 24px;
            }
        }
    </style>
</head>

<body>
<div class="page">
    <header class="navbar">
        <a href="{{ route('welcome') }}" class="brand">
            <div class="brand-logo">🌊</div>

            <div>
                <h1>Bella Vista Suites</h1>
                <span>Boutique Hotel</span>
            </div>
        </a>

        <div class="nav-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-light">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-main">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                <a href="{{ route('register') }}" class="btn btn-main">Register</a>
            @endauth
        </div>
    </header>

    <main id="home">
        <section class="hero-shell">
            <div class="hero-content">
                <div class="tag">Seaside escape at Bella Vista Suites</div>

                <h2>
                    Discover your perfect stay
                    <strong>by the coast.</strong>
                </h2>

                <p class="subtitle">
                    Book your ideal room with ease, manage your reservations, receive updates, and enjoy a calm hotel experience from start to finish.
                </p>

                <div class="hero-actions">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-main">Go to Dashboard</a>
                        <a href="{{ route('book-now') }}" class="btn btn-light">Book Now</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-main">Create Account</a>
                        <a href="{{ route('login') }}" class="btn btn-light">Login Account</a>
                    @endauth
                </div>

                <div class="mini-row">
                    <div class="mini-card">
                        <div class="mini-icon">🕒</div>
                        <h3>24/7 Booking</h3>
                        <p>Reserve your room anytime through a smooth online process.</p>
                    </div>

                    <div class="mini-card">
                        <div class="mini-icon">🛏️</div>
                        <h3>Comfort Rooms</h3>
                        <p>Relax in clean and elegant rooms designed for restful stays.</p>
                    </div>

                    <div class="mini-card">
                        <div class="mini-icon">🔔</div>
                        <h3>Status Updates</h3>
                        <p>Receive reservation updates and booking notifications easily.</p>
                    </div>
                </div>
            </div>

            <div class="showcase-card">
                <div class="showcase-image">
                    <div class="featured-badge">Featured Stay</div>
                </div>

                <div class="showcase-info">
                    <div>
                        <small>Featured Suite</small>
                        <h3>Blush Suite</h3>
                        <p>
                            A relaxing suite with warm comfort, soft interiors, and a peaceful hotel atmosphere.
                        </p>
                    </div>

                    <div class="rating-box">
                        <div>
                            <strong>★ 4.9</strong>
                            Excellent
                        </div>
                    </div>
                </div>

                <div class="room-meta">
                    <span>👥 2 Guests</span>
                    <span>🛏️ 1 King Bed</span>
                    <span>📶 Free Wi-Fi</span>
                    <span>☕ Cozy Room</span>
                </div>
            </div>
        </section>

        <section class="stats-bar">
            <div class="stats-icon">🏩</div>

            <div class="stat">
                <strong>500+</strong>
                <span>Happy Guests</span>
            </div>

            <div class="stat">
                <strong>50+</strong>
                <span>Luxury Rooms</span>
            </div>

            <div class="stat">
                <strong>4.9/5</strong>
                <span>Guest Rating</span>
            </div>

            <div class="stat">
                <strong>24/7</strong>
                <span>Support</span>
            </div>
        </section>

        <section class="section" id="rooms">
            <div class="section-header">
                <small>Room Choices</small>
                <h2>Choose a room that fits your stay.</h2>

                <p>
                    Bella Vista Suites offers simple and comfortable room choices for solo guests, couples, families, and premium hotel stays.
                </p>
            </div>

            <div class="rooms-grid">
                <div class="room-card">
                    <div class="room-img" style="background-image:url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=900&q=80');"></div>

                    <div class="room-body">
                        <h3>Blush Suite</h3>
                        <p>Elegant room for a cozy and relaxing stay with a warm luxury feel.</p>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-img" style="background-image:url('https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=900&q=80');"></div>

                    <div class="room-body">
                        <h3>Vista Deluxe</h3>
                        <p>Spacious deluxe room with a peaceful hotel view and premium comfort.</p>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-img" style="background-image:url('https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=900&q=80');"></div>

                    <div class="room-body">
                        <h3>Pearl Family Room</h3>
                        <p>Perfect room for family reservations and longer comfortable stays.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="about">
            <div class="about-panel">
                <div class="about-image"></div>

                <div class="about-text">
                    <h2>
                        A smoother way to manage your <strong>hotel reservations.</strong>
                    </h2>

                    <p>
                        Bella Vista Suites provides a clean and simple reservation experience where users can register, log in, book rooms, view reservations, and receive notifications.
                    </p>

                    <p>
                        Administrators can monitor bookings, booked dates, users, and reservation status through a dedicated admin dashboard.
                    </p>

                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-main">Go to Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-main">Start Booking</a>
                    @endauth
                </div>
            </div>
        </section>

        <section class="section" id="amenities">
            <div class="section-header">
                <small>Hotel Features</small>
                <h2>Designed for comfort and convenience.</h2>

                <p>
                    Enjoy a hotel experience supported by practical booking features and comfortable services.
                </p>
            </div>

            <div class="amenities-grid">
                <div class="amenity-card">
                    <div class="amenity-icon">📶</div>
                    <h3>Free Wi-Fi</h3>
                    <p>Stay connected during your hotel stay with reliable internet access.</p>
                </div>

                <div class="amenity-card">
                    <div class="amenity-icon">🛎️</div>
                    <h3>Easy Booking</h3>
                    <p>Create reservations quickly using a clean and simple booking process.</p>
                </div>

                <div class="amenity-card">
                    <div class="amenity-icon">🔔</div>
                    <h3>Notifications</h3>
                    <p>Receive booking updates and reservation status information.</p>
                </div>
            </div>
        </section>

        <section class="section" id="contact">
            <div class="contact-panel">
                <h2>Ready to book your stay?</h2>

                <p>
                    Create an account now and start reserving your preferred room at Bella Vista Suites.
                </p>

                <div class="hero-actions" style="justify-content:center; margin-top:0;">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-main">Go to Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-main">Create Account</a>
                        <a href="{{ route('login') }}" class="btn btn-light">Login Account</a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <footer>
        © {{ date('Y') }} Bella Vista Suites. Hotel Reservation System.
    </footer>
</div>
</body>
</html>