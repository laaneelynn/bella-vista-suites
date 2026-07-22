<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterOtpNotification extends Notification
{
    use Queueable;

    public string $otpCode;

    public function __construct(string $otpCode)
    {
        $this->otpCode = $otpCode;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bella Vista Suites OTP Verification')
            ->view('emails.otp-verification', [
                'name' => $notifiable->name ?? 'Guest',
                'otpCode' => $this->otpCode,
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'otp_code' => $this->otpCode,
        ];
    }
}