<?php

namespace App\Listeners;

use App\Events\ReachOut;
use App\Models\User;
use App\Notifications\ReportOffender;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReachOutListner
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
    public function handle(ReachOut $event)
    {
        $admin = User::where('id', $event->receiverMail)->first();
        $admin->notify(new \App\Notifications\ReachOut($event->senderMail, $event->receiverMail));
    }
}
