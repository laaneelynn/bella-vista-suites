@php
    $displayName = $name ?? 'Guest';
    $displayOtp = $otpCode ?? '000000';
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bella Vista Suites OTP Verification</title>
</head>

<body style="margin:0; padding:0; background:#f4eee9; font-family:Arial, sans-serif; color:#2b2221;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4eee9; padding:28px 12px;">
    <tr>
        <td align="center">

            <table width="100%" cellpadding="0" cellspacing="0" style="max-width:620px; background:#ffffff; border-radius:28px; overflow:hidden; box-shadow:0 18px 45px rgba(63,53,52,0.14);">

                <tr>
                    <td style="background:#dec3b3; padding:34px 28px; text-align:center;">
                        <div style="width:62px; height:62px; line-height:62px; border-radius:22px; background:#ffffff; display:inline-block; font-family:Georgia, serif; font-size:30px; font-weight:bold; color:#2b2221; box-shadow:0 10px 24px rgba(63,53,52,0.15);">
                            B
                        </div>

                        <h1 style="margin:16px 0 4px; font-family:Georgia, serif; font-size:32px; color:#2b2221;">
                            Bella Vista Suites
                        </h1>

                        <p style="margin:0; font-size:12px; letter-spacing:2px; font-weight:bold; color:#6f5648; text-transform:uppercase;">
                            Luxury Hotel Booking
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding:34px 34px 20px;">
                        <h2 style="margin:0 0 12px; font-size:25px; color:#2b2221;">
                            Hello {{ $displayName }}!
                        </h2>

                        <p style="margin:0 0 22px; color:#514543; font-size:16px; line-height:1.7;">
                            Thank you for registering at Bella Vista Suites. Use the verification code below to complete your email verification.
                        </p>

                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8f2ef; border-radius:22px; border:1px solid #eadbd3;">
                            <tr>
                                <td style="padding:28px 22px; text-align:center;">
                                    <p style="margin:0 0 12px; color:#7c614f; font-size:13px; font-weight:bold; letter-spacing:1.5px; text-transform:uppercase;">
                                        Your OTP Code
                                    </p>

                                    <div style="display:inline-block; padding:18px 30px; border-radius:22px; background:#ffffff; border:1px solid #eadbd3; color:#557589; font-size:36px; font-weight:bold; letter-spacing:8px; box-shadow:0 10px 24px rgba(63,53,52,0.08);">
                                        {{ $displayOtp }}
                                    </div>

                                    <p style="margin:18px 0 0; color:#514543; font-size:14px; line-height:1.6;">
                                        This OTP will expire in 10 minutes.
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <div style="margin:24px 0 0; padding:16px 18px; border-radius:20px; background:#dcfce7; color:#166534; font-size:14px; font-weight:bold; line-height:1.6; text-align:center;">
                            Please do not share this code with anyone.
                        </div>

                        <p style="margin:24px 0 0; color:#514543; font-size:15px; line-height:1.7;">
                            Once verified, you can log in and start booking your Bella Vista Suites reservation.
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

                        <p style="margin:22px 0 0; color:#9f7d6a; font-size:12px; text-align:center;">
                            © {{ date('Y') }} Bella Vista Suites. All rights reserved.
                        </p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>
</body>
</html>