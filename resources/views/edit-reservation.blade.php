<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Reservation | Bella Vista Suites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(236, 72, 153, 0.12), transparent 33%),
                radial-gradient(circle at bottom right, rgba(168, 85, 247, 0.15), transparent 35%),
                linear-gradient(135deg, #fff8fc, #fff1f8, #faf5ff);
            color: #241627;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(255,255,255,0.82), rgba(255,255,255,0.38)),
                url("https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1800&q=80");
            background-size: cover;
            background-position: center;
            opacity: 0.14;
            z-index: -2;
        }

        a {
            text-decoration: none;
        }

        .page {
            width: min(900px, 94%);
            margin: 0 auto;
            padding: 24px 0 50px;
        }

        .card {
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(236, 72, 153, 0.13);
            box-shadow: 0 22px 60px rgba(154, 88, 128, 0.13);
            overflow: hidden;
        }

        .hero {
            padding: 38px 42px;
            background:
                linear-gradient(90deg, rgba(255, 248, 252, 0.98), rgba(255, 241, 248, 0.78), rgba(255, 241, 248, 0.20)),
                url("https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1900&q=85");
            background-size: cover;
            background-position: center right;
            border-bottom: 1px solid rgba(236, 72, 153, 0.12);
        }

        .back-link {
            display: inline-flex;
            margin-bottom: 14px;
            color: #be185d;
            font-size: 13px;
            font-weight: 950;
        }

        .eyebrow {
            color: #b7791f;
            font-size: 12px;
            font-weight: 950;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        h1 {
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(36px, 5vw, 52px);
            line-height: 1;
            color: #241627;
            font-weight: 800;
        }

        h1 strong {
            background: linear-gradient(135deg, #ec4899, #a855f7);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p {
            margin-top: 12px;
            color: #59445c;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 700;
            max-width: 650px;
        }

        .form-area {
            padding: 28px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 18px;
            background: #fff1f7;
            color: #be185d;
            font-weight: 850;
            border: 1px solid rgba(236, 72, 153, 0.18);
            margin-bottom: 16px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .form-group {
            display: grid;
            gap: 6px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            color: #4c2538;
            font-size: 12px;
            font-weight: 950;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid rgba(236, 72, 153, 0.20);
            outline: none;
            border-radius: 18px;
            padding: 13px 15px;
            background: #fffafd;
            color: #4c2538;
            font-size: 14px;
            font-weight: 850;
        }

        input[readonly] {
            background: #fff1f7;
            color: #be185d;
        }

        textarea {
            min-height: 95px;
            resize: vertical;
        }

        .actions {
            grid-column: 1 / -1;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .save-btn,
        .cancel-edit-btn {
            border: none;
            cursor: pointer;
            padding: 13px 20px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 950;
            transition: 0.22s ease;
        }

        .save-btn {
            color: white;
            background: linear-gradient(135deg, #ec4899, #a855f7);
            box-shadow: 0 14px 28px rgba(236, 72, 153, 0.24);
        }

        .cancel-edit-btn {
            color: #be185d;
            background: white;
            border: 1px solid rgba(236, 72, 153, 0.18);
        }

        .save-btn:hover,
        .cancel-edit-btn:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 760px) {
            .hero {
                padding: 30px 24px;
            }

            .form-area {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full,
            .actions {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
<div class="page">
    <div class="card">
        <section class="hero">
            <a href="{{ route('my-reservations') }}" class="back-link">
                ← Back to My Reservations
            </a>

            <div class="eyebrow">Edit Pending Reservation</div>

            <h1>
                Update <strong>Reservation</strong>
            </h1>

            <p>
                You can edit your room type, booking dates, guest count, and notes while your reservation is still pending.
            </p>
        </section>

        <section class="form-area">
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

            <form method="POST" action="{{ route('user.reservations.update', $booking) }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-group">
                        <label>Booking ID</label>
                        <input type="text" value="{{ $booking->booking_code }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Current Status</label>
                        <input type="text" value="{{ ucfirst($booking->status ?? 'pending') }}" readonly>
                    </div>

                    <div class="form-group full">
                        <label>Room Type</label>
                        <select name="service_name" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room['name'] }}" {{ old('service_name', $booking->service_name) === $room['name'] ? 'selected' : '' }}>
                                    {{ $room['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Check-in Date</label>
                        <input type="date" name="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Check-out Date</label>
                        <input type="date" name="checkout_date" value="{{ old('checkout_date', $booking->checkout_date) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Number of Guests</label>
                        <input type="number" name="guests" min="1" max="10" value="{{ old('guests', $booking->guests) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Notes</label>
                        <textarea name="notes" placeholder="Special request or notes...">{{ old('notes', $booking->notes) }}</textarea>
                    </div>

                    <div class="actions">
                        <button type="submit" class="save-btn">
                            Save Changes
                        </button>

                        <a href="{{ route('my-reservations') }}" class="cancel-edit-btn">
                            Cancel Edit
                        </a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
</body>
</html>