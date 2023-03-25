<?php

namespace App\Modules\Admin\Heroes\Models\Relations;

use App\Modules\Admin\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasOneRelation
{
    public function user():HasOne
    {
        return $this->HasOne(User::class,'hero_id');
    }
}
