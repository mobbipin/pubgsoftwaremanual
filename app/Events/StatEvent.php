<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $type;
    public $id;
    public $display;
    public $activestatus;
    public $divActive;
    public $page;
    public function __construct($id, $type, $display = true, $activestatus = false, $divActive, $page)
    {
        $this->id = $id;
        $this->type = $type;
        $this->display = $display;
        $this->activestatus = $activestatus;
        $this->divActive = $divActive;
        $this->page = $page;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('stat-channel');
    }

    public function broadcastAs()
    {
        return 'liveStats-' . $this->id;
    }
}
