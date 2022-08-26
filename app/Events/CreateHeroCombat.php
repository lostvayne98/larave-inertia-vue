<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateHeroCombat
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $v,$her;

    public function __construct($combat,$her)
    {
        $this->v = $combat;
        $this->her = $her;

    }


}
