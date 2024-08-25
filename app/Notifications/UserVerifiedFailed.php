<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerifiedFailed extends Notification
{
    use Queueable;

    public  $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reason )
    {
        $this->reason = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Account Verification Unsuccessful')
            ->greeting('Dear ' . $notifiable->name . ',')
            ->line('We regret to inform you that your account verification request was not successful.')
            ->line('Reason: ' . $this->reason) // Display the reason here
            ->line('Thank you for using our application.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Account Verification Unsuccessful',
            'message' => 'We regret to inform you that your account verification request was not successful.',
        ];
    }
}
