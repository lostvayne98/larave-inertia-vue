<?php

namespace App\Listeners;

use App\Events\CreateHeroHack;
use App\Models\HeroHack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
class NewHeroHack
{


    public function handle(CreateHeroHack $event)
    {

        DB::table('hero_hacks')->insert([
            'hack_skills_id' => $event->v,
            'hero_id' => $event->her,

        ]);

    }
}
