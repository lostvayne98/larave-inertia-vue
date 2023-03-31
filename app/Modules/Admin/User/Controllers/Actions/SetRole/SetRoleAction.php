<?php

namespace App\Modules\Admin\User\Controllers\Actions\SetRole;

use App\Modules\Admin\User\Models\User;

class SetRoleAction implements SetRoleInterface
{

    public function setRole(object $model, string $role)
    {
        if ($model instanceof User) {
            $model->assignRole($role);
        }
    }
}
