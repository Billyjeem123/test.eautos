<?php

namespace App\Listeners;

use App\Events\ReportEvent;
use App\Models\User;
use App\Notifications\ReportOffender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportListner
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
    public function handle(ReportEvent $event)
    {
        $admin = User::where('role', 'admin')->first(); // Assuming you have an admin user
        $admin->notify(new ReportOffender($event->mail, $event->title));
    }
}
