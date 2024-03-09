<?php

namespace App\Notifications;

use App\Models\Start;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewStart extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Start $start)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Start from {$this->start->user->name}")
            ->greeting("New Start from {$this->start->user->name}")
            ->line("This is to inform you that a new start has been submitted by a user on our platform. Kindly review it at your earliest convenience.")
            ->action('Go to iStart', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
