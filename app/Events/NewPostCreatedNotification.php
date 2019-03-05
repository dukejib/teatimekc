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

class NewPostCreatedNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    /**
     * Create a new event instance. 
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
        // Log::info('01 : In NPCN Event Construct()');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Log::info('01a : In NPCN Event broadcastOn()');
        return new PrivateChannel('channel-name');
    }
}
