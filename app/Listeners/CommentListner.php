<?php

namespace App\Listeners;

use App\Events\CommentEvent;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CommentEvent $event
     * @return void
     */
    public function handle(CommentEvent $event): void
    {
        $admin = User::where('email', $event->owneremail)->first();
        $admin->notify(new CommentNotification($event->owneremail, $event->title));
    }
}
