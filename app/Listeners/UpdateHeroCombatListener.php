<?php

namespace App\Listeners;

use App\Events\UpdateHeroCombat;
use App\Models\HeroCombat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateHeroCombatListener
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\UpdateHeroCombat  $event
     * @return void
     */
    public function handle(UpdateHeroCombat $event)
    {
        HeroCombat::update([
            'hero_id' => $event->her,
            'combat_skills_id' => $event->combat
        ]);
    }
}
