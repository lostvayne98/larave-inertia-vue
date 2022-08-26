<?php

namespace App\Listeners;

use App\Events\UpdateHeroCombat;
use App\Models\HeroCombat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

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
        DB::table('hero_combats')->update([
            'hero_id' => $event->her,
            'combat_skills_id' => $event->v
        ]);
    }
}
