<?php

namespace Database\Seeders;

use App\Models\Heroes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HeroSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Heroes::create([
            'id' => 3,
            'name' => Str::random(10),
            'faculty' => Str::random(10),
            'course' => Str::random(10),
            'rank' => Str::random(10),
            'bio' => Str::random(10),
        ]);
    }
}
