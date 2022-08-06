<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class adminSeed extends Seeder
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
        $user->assignRole('admin');
    }
}
