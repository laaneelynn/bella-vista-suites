<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(public Booking $booking)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bella Vista Suites Reservation Created')
            ->view('emails.booking-created', [
                'user' => $notifiable,
                'booking' => $this->booking,
                'reservationUrl' => url('/my-reservations'),
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Your room reservation has been successfully created.',
            'message' => 'Your booking for '.$this->booking->service_name.' has been recorded.',
            'booking_code' => $this->booking->booking_code,
            'service_name' => $this->booking->service_name,
            'booking_date' => $this->booking->booking_date,
            'checkout_date' => $this->booking->checkout_date,
            'booking_time' => $this->booking->booking_time,
            'guests' => $this->booking->guests,
            'status' => strtolower($this->booking->status ?? 'pending'),
        ];
    }
}