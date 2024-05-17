<?php

namespace App\Listeners;

use App\Events\ManagePartEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ManageEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(ManagePartEvent $event)
    {
        $admin = User::where('email', $event->useremail)->first();
        $admin->notify(new \App\Notifications\ManagePartNotification($event->useremail, $event->title, $event->message));
    }
}
