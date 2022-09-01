<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class playerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'password' => bcrypt('123123123')
        ]);
        $user->assignRole('player');
    }
}
