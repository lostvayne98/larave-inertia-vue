<?php

namespace Database\Seeders;

use App\Models\HeroHack;
use Illuminate\Database\Seeder;
use App\Models\HackSkills as Hack;
use Illuminate\Support\Str;

class hackSkills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $hack =  Hack::create([
            'name' => Str::random(10),
            'rarity' => 'уникальный'
        ]);
       HeroHack::create([
           'hack_skills_id' => $hack->id,
           'hero_id' => 3,
       ]);
    }
}
