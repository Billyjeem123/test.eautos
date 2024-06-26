<?php

namespace App\Providers;

use App\Events\CommentEvent;
use App\Events\ManagePartEvent;
use App\Events\ReachOut;
use App\Events\ReportEvent;
use App\Listeners\CommentListner;
use App\Listeners\ManageEventListener;
use App\Listeners\ReachOutListner;
use App\Listeners\ReportListner;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ReportEvent::class => [
            ReportListner::class
        ],

        ReachOut::class => [
            ReachOutListner::class
        ],
         CommentEvent::class =>[
           CommentListner::class
         ],
        ManagePartEvent::class=>[
            ManageEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
