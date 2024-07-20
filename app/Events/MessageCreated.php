<?php

namespace App\Events;

use App\Models\Room;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessageCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Room $room, public Message $message)
    {
        //
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('chat.room.' . $this->room->id),
        ];
    }
}
