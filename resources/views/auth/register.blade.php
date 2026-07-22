<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Bella Vista Suites</title>
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
            --shadow: 0 24px 70px rgba(63, 53, 52, 0.18);
            --soft-shadow: 0 16px 45px rgba(63, 53, 52, 0.12);
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

        button,
        input {
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
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -0.6px;
            line-height: 1;
        }

        .brand span {
            display: block;
            margin-top: 5px;
            color: #7c614f;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 2.4px;
            text-transform: uppercase;
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
            color: var(--dark);
            background: rgba(255, 255, 255, 0.66);
            border: 1px solid rgba(255, 255, 255, 0.66);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
        }

        .btn-main {
            color: var(--white);
            background: linear-gradient(135deg, #9f7d6a, #557589);
            box-shadow: 0 16px 32px rgba(63, 53, 52, 0.22);
        }

        main {
            margin-top: 18px;
        }

        .auth-shell {
            min-height: calc(100vh - 145px);
            border-radius: 42px;
            overflow: hidden;
            position: relative;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 44px;
            padding: 56px;
            background: rgba(255, 255, 255, 0.26);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.48);
            box-shadow: var(--shadow);
        }

        .auth-shell::before {
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

        .auth-content,
        .register-card {
            position: relative;
            z-index: 2;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            color: #5a4237;
            background: rgba(255, 255, 255, 0.60);
            border: 1px solid rgba(255, 255, 255, 0.62);
            font-size: 12px;
            font-weight: 950;
            margin-bottom: 22px;
            backdrop-filter: blur(12px);
        }

        .auth-content h2 {
            max-width: 720px;
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(48px, 6vw, 76px);
            line-height: 0.98;
            letter-spacing: -2.5px;
            font-weight: 800;
            text-shadow: 0 8px 24px rgba(255, 255, 255, 0.46);
        }

        .auth-content h2 strong {
            display: block;
            color: #557589;
            font-style: italic;
            font-weight: 500;
        }

        .subtitle {
            max-width: 620px;
            margin-top: 20px;
            color: #3f3534;
            font-size: 16px;
            line-height: 1.8;
            font-weight: 750;
            text-shadow: 0 6px 18px rgba(255, 255, 255, 0.50);
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
            color: var(--dark);
            font-size: 17px;
            font-weight: 950;
            margin-bottom: 6px;
        }

        .mini-card p {
            color: #4d423f;
            font-size: 12px;
            line-height: 1.6;
            font-weight: 750;
        }

        .register-card {
            width: min(500px, 100%);
            justify-self: end;
            padding: 30px;
            border-radius: 36px;
            background: rgba(255, 255, 255, 0.68);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.66);
            box-shadow: 0 35px 90px rgba(63, 53, 52, 0.22);
        }

        .card-icon {
            width: 64px;
            height: 64px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            color: var(--dark);
            font-size: 28px;
            background: rgba(248, 242, 239, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.68);
            margin-bottom: 18px;
            box-shadow: 0 14px 30px rgba(63, 53, 52, 0.10);
        }

        .register-card h2 {
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 38px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
        }

        .register-card p {
            color: var(--text);
            font-size: 13px;
            line-height: 1.6;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .error-box {
            padding: 13px 15px;
            border-radius: 18px;
            background: rgba(255, 241, 241, 0.88);
            color: #9b3b3b;
            border: 1px solid rgba(155, 59, 59, 0.16);
            font-size: 13px;
            font-weight: 800;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .error-box ul {
            margin-left: 18px;
        }

        .form-group {
            display: grid;
            gap: 7px;
            margin-bottom: 15px;
        }

        label {
            color: var(--dark);
            font-size: 12px;
            font-weight: 950;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap span {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9b7a68;
            font-size: 16px;
            pointer-events: none;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.74);
            outline: none;
            border-radius: 18px;
            padding: 14px 15px 14px 44px;
            background: rgba(248, 242, 239, 0.74);
            color: var(--dark);
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #557589;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 0 0 4px rgba(210, 220, 228, 0.42);
        }

        input::placeholder {
            color: #9a8b88;
            font-weight: 700;
        }

        .submit-btn {
            width: 100%;
            border: none;
            cursor: pointer;
            padding: 14px 18px;
            border-radius: 999px;
            color: var(--white);
            background: linear-gradient(135deg, #9f7d6a, #557589);
            box-shadow: 0 16px 32px rgba(63, 53, 52, 0.20);
            font-size: 14px;
            font-weight: 950;
            transition: 0.22s ease;
            margin-top: 4px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        .switch-link {
            margin-top: 18px;
            text-align: center;
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
        }

        .switch-link a {
            color: #557589;
            font-weight: 950;
        }

        @media (max-width: 1120px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            .navbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-actions {
                justify-content: flex-start;
            }

            .auth-shell {
                min-height: auto;
                grid-template-columns: 1fr;
                padding: 44px 28px;
            }

            .register-card {
                justify-self: start;
                max-width: 100%;
            }

            .mini-row {
                grid-template-columns: repeat(3, 1fr);
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

            .auth-shell {
                border-radius: 30px;
                padding: 34px 24px;
            }

            .auth-content h2 {
                letter-spacing: -1.3px;
                font-size: 43px;
            }

            .mini-row {
                grid-template-columns: 1fr;
            }

            .register-card {
                padding: 24px;
                border-radius: 30px;
            }

            .register-card h2 {
                font-size: 33px;
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
            <a href="{{ route('welcome') }}" class="btn btn-light">Home</a>
            <a href="{{ route('login') }}" class="btn btn-main">Login</a>
        </div>
    </header>

    <main>
        <section class="auth-shell">
            <div class="auth-content">
                <div class="tag">Start your stay at Bella Vista Suites</div>

                <h2>
                    Create your account and begin your
                    <strong>seaside escape.</strong>
                </h2>

                <p class="subtitle">
                    Register now to reserve your room, manage your booking details, and receive reservation updates in one calm and simple space.
                </p>

                <div class="mini-row">
                    <div class="mini-card">
                        <div class="mini-icon">🕒</div>
                        <h3>24/7 Booking</h3>
                        <p>Create bookings anytime and manage your stay online.</p>
                    </div>

                    <div class="mini-card">
                        <div class="mini-icon">🛏️</div>
                        <h3>Comfort Rooms</h3>
                        <p>Choose comfortable rooms for a relaxing hotel stay.</p>
                    </div>

                    <div class="mini-card">
                        <div class="mini-icon">🔔</div>
                        <h3>Status Updates</h3>
                        <p>Receive booking confirmations and reservation updates.</p>
                    </div>
                </div>
            </div>

            <div class="register-card">

                <h2>Create Account</h2>
                <p>Fill in your details to create your Bella Vista Suites reservation account.</p>

                @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div class="input-wrap">
                            <span>♡</span>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                required
                                autofocus
                                autocomplete="name"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrap">
                            <span>✉</span>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email address"
                                required
                                autocomplete="username"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <span>◆</span>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Create your password"
                                required
                                autocomplete="new-password"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-wrap">
                            <span>◆</span>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                required
                                autocomplete="new-password"
                            >
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        Create Account
                    </button>
                </form>

                <div class="switch-link">
                    Already registered?
                    <a href="{{ route('login') }}">Login here</a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>