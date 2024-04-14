<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReachOut
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  mixed $senderMail;
    public mixed $receiverMail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($senderMail, $receiverMail)
    {
        $this->senderMail  = $senderMail;
        $this->receiverMail  = $receiverMail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('channel-name');
    }
}
