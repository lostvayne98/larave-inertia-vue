<?php

namespace App\Modules\Admin\User\Controllers\Actions;

use App\Modules\Admin\User\Models\User;

class StoreUsersAction
{
        public function handle($request)
        {
           $user =  User::create($request);
           $user->assignRole('user');
        }
}
