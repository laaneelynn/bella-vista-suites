<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountRegisteredNotification extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Bella Vista Suites')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your Bella Vista Suites account has been registered successfully.')
            ->line('You can now browse rooms, create reservations, and receive booking updates.')
            ->action('Go to Bella Vista Suites', url('/dashboard'))
            ->line('Thank you for creating an account with Bella Vista Suites.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}