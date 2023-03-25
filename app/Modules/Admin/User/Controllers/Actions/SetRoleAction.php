<?php

namespace App\Modules\Admin\User\Controllers\Actions;

use App\Modules\Admin\User\Models\User;

class SetRoleAction
{
    public function handle( $model,$role)
    {
        if ($model instanceof User) {
            $model->assignRole($role);
        }
    }
}
