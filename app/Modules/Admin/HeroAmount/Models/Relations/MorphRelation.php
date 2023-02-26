<?php

namespace App\Modules\Admin\HeroAmount\Models\Relations;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait MorphRelation
{

    public function amount():MorphTo
    {
        return $this->morphTo();
    }
}
