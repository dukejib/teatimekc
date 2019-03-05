<?php

namespace App\Events;

use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\RegisterToken;

class InviteNewMemberNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $regToken;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RegisterToken $regToken)
    {
        $this->regToken = $regToken;
        Log::info('01 : In INMN Event Construct() ' . $regToken->email);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Log::info('01a : In INMN Event broadcastOn()');
        return new PrivateChannel('channel-name');
    }
}
