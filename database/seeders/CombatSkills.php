<?php

namespace Database\Seeders;

use App\Models\HeroCombat;
use Illuminate\Database\Seeder;
use App\Models\CombatSkills as combat;
use Illuminate\Support\Str;

class CombatSkills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $combat = combat::create([
            'name' => Str::random(10),
            'rarity' => 'уникальный'
        ]);
       HeroCombat::create([
           'combat_skills_id' => $combat->id,
           'hero_id' => 3,
       ]);

    }
}
