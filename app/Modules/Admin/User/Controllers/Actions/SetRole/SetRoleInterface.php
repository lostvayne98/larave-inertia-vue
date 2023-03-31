<?php

namespace App\Modules\Admin\User\Controllers\Actions\SetRole;

interface SetRoleInterface
{
    public function setRole(object $model,string $role);
}
