<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingStatusUpdatedNotification extends Notification
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
            ->subject('Bella Vista Suites Reservation Status Updated')
            ->view('emails.booking-status-updated', [
                'user' => $notifiable,
                'booking' => $this->booking,
                'reservationUrl' => url('/my-reservations'),
            ]);
    }

    public function toArray(object $notifiable): array
    {
        $status = strtolower($this->booking->status ?? 'pending');

        return [
            'title' => 'Your reservation status has been updated.',
            'message' => 'Your reservation update for '.$this->booking->service_name.' has been recorded.',
            'booking_code' => $this->booking->booking_code,
            'service_name' => $this->booking->service_name,
            'booking_date' => $this->booking->booking_date,
            'checkout_date' => $this->booking->checkout_date,
            'booking_time' => $this->booking->booking_time,
            'guests' => $this->booking->guests,
            'status' => $status,
        ];
    }
}