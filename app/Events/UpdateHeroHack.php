<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateHeroHack
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $her,$hack;


    public function __construct($hack,$her)
    {
        $this->her = $her;
        $this->hack = $hack;
    }

}
