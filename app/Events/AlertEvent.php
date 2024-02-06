<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AlertEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;
    public $type;
    public $kill;
    public $name;
    public $id;
    public $player_image;
    public $team_image;
    public $position;
    public function __construct($round_id, $message, $type, $kill, $name, $player_image, $team_image, $position)
    {
        $this->id = $round_id;
        $this->message = $message;
        $this->type = $type;
        $this->kill = $kill;
        $this->name = $name;
        $this->player_image = $player_image;
        $this->team_image = $team_image;
        $this->position = $position;
    }

    public function broadcastOn()
    {
        return new Channel('alert-channel');
    }
    public function broadcastAs()
    {
        return 'alert-event-' . $this->id;
    }
}
