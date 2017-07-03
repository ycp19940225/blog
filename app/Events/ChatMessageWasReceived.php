<?php

namespace App\Events;

use Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessageWasReceived extends Event implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chatMessage;
    public $user;

    public function __construct($chatMessage, $user)
    {
        $this->chatMessage = $chatMessage;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return [
            "chat-room.1"
        ];
    }

    public function __sleep() {
        return array('user', 'chatMessage');
    }

}
