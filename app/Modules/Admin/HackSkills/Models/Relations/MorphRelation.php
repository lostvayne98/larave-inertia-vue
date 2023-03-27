<?php

namespace App\Modules\Admin\HackSkills\Models\Relations;

use App\Modules\Admin\HeroAmount\Models\HeroAmount;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait MorphRelation
{
    public function amount_skill():MorphOne
    {
        return $this->morphOne(HeroAmount::class, 'skill');
    }
}
