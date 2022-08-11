<?php

namespace App\Listeners;

use App\Events\CreateHeroHack;
use App\Models\HeroHack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewHeroHack
{


    public function handle(CreateHeroHack $event)
    {

        HeroHack::create([
           'hack_skills_id'  => $event->hack,
            'hero_id'  =>   $event->her
        ]);
    }
}
