<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateHeroCombat
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $v,$her;


    public function __construct($combat,$her)
    {
        $this->her = $her;
        $this->v = $combat;
    }


}
