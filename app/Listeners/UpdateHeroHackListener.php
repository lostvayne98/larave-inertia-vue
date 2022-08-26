<?php

namespace App\Listeners;

use App\Events\UpdateHeroHack;
use App\Models\HeroHack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
class UpdateHeroHackListener
{

    public function handle(UpdateHeroHack $event)
    {
        DB::table('hero_hacks')->update([
            'hero_id' => $event->her,
            'hack_skills_id' => $event->v
        ]);
    }
}
