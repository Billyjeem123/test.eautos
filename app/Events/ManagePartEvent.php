<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ManagePartEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $title;
    public mixed $useremail;
    public mixed $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($useremail, $title, $message)
    {
        $this->useremail  = $useremail;
        $this->title  = $title;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
