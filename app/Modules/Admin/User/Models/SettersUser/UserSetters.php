<?php

namespace App\Modules\Admin\User\Models\SettersUser;

use Illuminate\Support\Facades\Hash;

trait UserSetters
{

    public function SetPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
