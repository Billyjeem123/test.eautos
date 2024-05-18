<?php

namespace App\Listeners;

use App\Events\ManagePartEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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

        if ($admin) {
            $admin->notify(new \App\Notifications\ManagePartNotification($event->useremail, $event->title, $event->message));
            Log::info('Notification sent to user', ['user' => $admin->toArray()]);
        } else {
            Log::warning('User not found for email', ['email' => $event->useremail]);
        }
    }

}
