<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReachOut extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public  mixed $senderMail;
    public mixed $receiverMail;

    public function __construct($senderMail, $receiverMail)
    {
        $this->senderMail  = $senderMail;
        $this->receiverMail  = $receiverMail;
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
            ->subject('New Interest on Your Asset')
            ->greeting('Dear Esteemed User,')
            ->line( 'Congratulations! You have received a new notification regarding your asset. Please log in to your dashboard to view the details.')
            ->line('You can view all the necessary details and records in your dashboard.');
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
            'title' => 'New Notification on Asset',
            'message' => 'Congratulations! You have received a new notification regarding your asset'
        ];
    }

}
