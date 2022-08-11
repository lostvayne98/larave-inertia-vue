<?php

namespace App\Listeners;

use App\Events\UpdateHeroHack;
use App\Models\HeroHack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateHeroHackListener
{

    public function handle(UpdateHeroHack $event)
    {
        HeroHack::update([
            'hero_id' => $event->her,
            'combat_skills_id' => $event->combat
        ]);
    }
}
