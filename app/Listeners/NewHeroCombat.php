<?php

namespace App\Listeners;

use App\Events\CreateHeroCombat;
use App\Models\HeroCombat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewHeroCombat
{


    public function handle(CreateHeroCombat $event)
    {
        HeroCombat::create([
            'combat_skills_id' => $event->combat,
            'hero_id' => $event->her,

        ]);
    }
}
