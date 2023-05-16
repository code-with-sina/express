<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ExpressPayEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private string $message;
    private User $user;
    private $sessionId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message, User $user, $sessionId)
    {
        //
        $this->message = $message;
        $this->user = $user;
        $this->sessionId = $sessionId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('gateway.pay.'.$this->sessionId);
    }

    public function broadcastAs()
    {
        return 'pay';
    }

    public function broadcastWith()
    {
        return [
            'message'   => $this->message,
            'user'      => $this->user->only(['username', 'email']),
            'id'        => auth()->user()->id
        ];
    }
}
