<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    public mixed $owneremail;
    private mixed $title;

    /**
     * Create a new notification instance.
     *
     * @return void
     */



    public function __construct($owneremail, $title)
    {
        $this->owneremail  = $owneremail;
        $this->title  = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notification: New Comment on Asset')
            ->greeting('Hello,')
            ->line('A new comment has been posted on Your asset ')
            ->line( $this->title)
            ->line('Thank you for your attention.')
            ->salutation('Best regards,');
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
                 'message' => $this->title
        ];
    }
}
