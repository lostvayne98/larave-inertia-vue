<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      /*  DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);*/
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'guest@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
