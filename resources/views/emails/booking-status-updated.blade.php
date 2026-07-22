@php
    $statusKey = strtolower($booking->status ?? 'pending');
    $status = ucfirst($statusKey);
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bella Vista Suites Reservation Update</title>
</head>

<body style="margin:0; padding:0; background:#f4eee9; font-family:Arial, sans-serif; color:#2b2221;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4eee9; padding:28px 12px;">
    <tr>
        <td align="center">
            <table width="100%" cellpadding="0" cellspacing="0" style="max-width:620px; background:#ffffff; border-radius:28px; overflow:hidden; box-shadow:0 18px 45px rgba(63,53,52,0.14);">

                <tr>
                    <td style="background:#d2dce4; padding:34px 28px; text-align:center;">
                        <div style="width:62px; height:62px; line-height:62px; border-radius:22px; background:#ffffff; display:inline-block; font-family:Georgia, serif; font-size:30px; font-weight:bold; color:#2b2221; box-shadow:0 10px 24px rgba(63,53,52,0.15);">
                            B
                        </div>

                        <h1 style="margin:16px 0 4px; font-family:Georgia, serif; font-size:32px; color:#2b2221;">
                            Bella Vista Suites
                        </h1>

                        <p style="margin:0; font-size:12px; letter-spacing:2px; font-weight:bold; color:#6f5648; text-transform:uppercase;">
                            Reservation Status Update
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:34px 34px 20px;">
                        <h2 style="margin:0 0 12px; font-size:25px; color:#2b2221;">
                            Hello {{ $user->name }}!
                        </h2>

                        <p style="margin:0 0 22px; color:#514543; font-size:16px; line-height:1.7;">
                            Your reservation status has been updated. Please review the latest details below.
                        </p>

                        @if($statusKey === 'confirmed')
                            <div style="margin-bottom:22px; padding:18px 20px; border-radius:20px; background:#dcfce7; color:#166534; font-size:16px; font-weight:bold; text-align:center;">
                                Current Status: {{ $status }}
                            </div>
                        @elseif($statusKey === 'completed')
                            <div style="margin-bottom:22px; padding:18px 20px; border-radius:20px; background:#dbeafe; color:#1d4ed8; font-size:16px; font-weight:bold; text-align:center;">
                                Current Status: {{ $status }}
                            </div>
                        @elseif($statusKey === 'cancelled')
                            <div style="margin-bottom:22px; padding:18px 20px; border-radius:20px; background:#ffe4e6; color:#be123c; font-size:16px; font-weight:bold; text-align:center;">
                                Current Status: {{ $status }}
                            </div>
                        @else
                            <div style="margin-bottom:22px; padding:18px 20px; border-radius:20px; background:#fef3c7; color:#92400e; font-size:16px; font-weight:bold; text-align:center;">
                                Current Status: {{ $status }}
                            </div>
                        @endif

                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8f2ef; border-radius:22px; border:1px solid #eadbd3;">
                            <tr>
                                <td style="padding:20px;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Booking ID
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->booking_code }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Room
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->service_name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Check-in Date
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->booking_date }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Check-out Date
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->checkout_date ?? 'N/A' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Booking Time
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->booking_time ?? 'N/A' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px 0; color:#7c614f; font-weight:bold; font-size:13px;">
                                                Guests
                                            </td>

                                            <td align="right" style="padding:10px 0; color:#2b2221; font-weight:bold; font-size:14px;">
                                                {{ $booking->guests }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <div style="text-align:center; margin:30px 0;">
                            <a href="{{ $reservationUrl }}" style="display:inline-block; padding:14px 28px; border-radius:999px; background:#557589; color:#ffffff; font-size:14px; font-weight:bold; text-decoration:none;">
                                View My Reservation
                            </a>
                        </div>

                        <p style="margin:0; color:#514543; font-size:15px; line-height:1.7;">
                            Thank you for choosing Bella Vista Suites.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:22px 34px 34px;">
                        <div style="height:1px; background:#eadbd3; margin-bottom:20px;"></div>

                        <p style="margin:0; color:#7c614f; font-size:13px; line-height:1.6;">
                            Regards,<br>
                            <strong style="color:#2b2221;">Bella Vista Suites</strong>
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>