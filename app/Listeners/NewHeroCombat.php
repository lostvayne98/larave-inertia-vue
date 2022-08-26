<?php

namespace App\Listeners;

use App\Events\CreateHeroCombat;
use App\Models\HeroCombat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
class NewHeroCombat
{


    public function handle(CreateHeroCombat $event)
    {

        DB::table('hero_combats')->insert([
            'combat_skills_id' => $event->v,
            'hero_id' => $event->her,

        ]);
    }
}
