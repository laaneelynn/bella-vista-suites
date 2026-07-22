<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Bella Vista Suites</title>
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

        body {
            position: relative;
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    rgba(222, 195, 179, 0.20),
                    rgba(210, 220, 228, 0.18)
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
                    rgba(248, 242, 239, 0.48),
                    rgba(248, 242, 239, 0.18)
                );
            pointer-events: none;
            z-index: 0;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            width: min(1180px, 94%);
            margin: 0 auto;
            padding: 18px 0;
            display: flex;
            flex-direction: column;
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

        .top-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .top-link {
            padding: 11px 17px;
            border-radius: 999px;
            color: var(--dark);
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.84);
            box-shadow: 0 10px 24px rgba(63, 53, 52, 0.08);
            font-size: 12px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .top-link:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.96);
        }

        .top-link.primary {
            color: white;
            background: linear-gradient(135deg, var(--brown), var(--blue));
        }

        .auth-wrap {
            flex: 1;
            display: grid;
            place-items: center;
            padding: 38px 0;
        }

        .auth-card {
            width: min(500px, 100%);
            padding: 34px;
            border-radius: 36px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.82);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(210, 220, 228, 0.48);
            right: -80px;
            top: -90px;
        }

        .auth-card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(222, 195, 179, 0.38);
            left: -80px;
            bottom: -90px;
        }

        .card-content {
            position: relative;
            z-index: 2;
        }

        .auth-icon {
            width: 70px;
            height: 70px;
            border-radius: 26px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--sand), var(--sky));
            color: var(--dark);
            font-size: 30px;
            font-weight: 950;
            box-shadow: 0 16px 34px rgba(63, 53, 52, 0.16);
            margin-bottom: 18px;
        }

        .auth-card small {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border-radius: 999px;
            background: rgba(248, 242, 239, 0.92);
            color: #7c614f;
            font-size: 11px;
            font-weight: 950;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 14px;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .auth-card h2 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 40px;
            line-height: 1;
            color: var(--dark);
            font-weight: 800;
            margin-bottom: 12px;
        }

        .auth-card p {
            color: var(--text);
            font-size: 14px;
            font-weight: 800;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 18px;
            margin-bottom: 16px;
            font-size: 13px;
            font-weight: 850;
            line-height: 1.5;
        }

        .alert-success {
            background: rgba(224, 245, 232, 0.96);
            color: #166534;
            border: 1px solid rgba(22, 101, 52, 0.16);
        }

        .alert-error {
            background: rgba(255, 228, 230, 0.96);
            color: #be123c;
            border: 1px solid rgba(190, 18, 60, 0.16);
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 13px;
            font-weight: 950;
        }

        .input-field {
            width: 100%;
            height: 58px;
            border-radius: 22px;
            border: 1px solid rgba(210, 220, 228, 0.95);
            background: rgba(255, 255, 255, 0.92);
            padding: 0 18px;
            color: var(--dark);
            outline: none;
            font-size: 15px;
            font-weight: 850;
            box-shadow: inset 0 3px 12px rgba(63, 53, 52, 0.05);
            transition: 0.22s ease;
        }

        .input-field:focus {
            border-color: rgba(85, 117, 137, 0.70);
            box-shadow:
                inset 0 3px 12px rgba(63, 53, 52, 0.05),
                0 0 0 5px rgba(85, 117, 137, 0.12);
            background: white;
        }

        .error-text {
            margin-top: 8px;
            color: #be123c;
            font-size: 12px;
            font-weight: 850;
        }

        .submit-btn {
            width: 100%;
            border: none;
            cursor: pointer;
            padding: 15px 22px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--brown), var(--blue));
            color: white;
            font-size: 14px;
            font-weight: 950;
            box-shadow: 0 18px 34px rgba(63, 53, 52, 0.20);
            transition: 0.22s ease;
            margin-top: 4px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 42px rgba(63, 53, 52, 0.26);
        }

        .helper {
            margin-top: 18px;
            padding: 14px 16px;
            border-radius: 20px;
            background: rgba(248, 242, 239, 0.88);
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
            line-height: 1.6;
            border: 1px solid rgba(255, 255, 255, 0.84);
        }

        .bottom-links {
            margin-top: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .bottom-links a {
            color: var(--blue);
            font-size: 13px;
            font-weight: 950;
        }

        .bottom-links a:last-child {
            color: #7c614f;
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 28px, 100%);
            }

            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .brand h1 {
                font-size: 23px;
            }

            .top-actions {
                justify-content: flex-start;
            }

            .auth-wrap {
                padding: 28px 0;
            }

            .auth-card {
                padding: 26px;
                border-radius: 30px;
            }

            .auth-card h2 {
                font-size: 34px;
            }

            .bottom-links {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
<div class="page">
    <header>
        <a href="{{ route('welcome') }}" class="brand">
            <div class="brand-icon">B</div>

            <div>
                <h1>Bella Vista Suites</h1>
                <span>Luxury Hotel Booking</span>
            </div>
        </a>

        <div class="top-actions">
            <a href="{{ route('login') }}" class="top-link">
                Login
            </a>

            @if(\Illuminate\Support\Facades\Route::has('register'))
                <a href="{{ route('register') }}" class="top-link primary">
                    Create Account
                </a>
            @endif
        </div>
    </header>

    <main class="auth-wrap">
        <section class="auth-card">
            <div class="card-content">
                
                <small>Password Recovery</small>

                <h2>
                    Forgot Password?
                </h2>

                <p>
                    No worries. Enter your email address and we will send you a secure password reset link.
                </p>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        Please enter a valid email address.
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">
                            Email Address
                        </label>

                        <input
                            id="email"
                            class="input-field"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email address"
                            required
                            autofocus
                        >

                        @error('email')
                            <div class="error-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">
                        Email Password Reset Link
                    </button>
                </form>

                <div class="helper">
                    Please check your email inbox or spam folder after submitting your email address.
                </div>

                <div class="bottom-links">
                    <a href="{{ route('login') }}">
                        Back to Login
                    </a>

                    @if(\Illuminate\Support\Facades\Route::has('register'))
                        <a href="{{ route('register') }}">
                            Create New Account
                        </a>
                    @endif
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>