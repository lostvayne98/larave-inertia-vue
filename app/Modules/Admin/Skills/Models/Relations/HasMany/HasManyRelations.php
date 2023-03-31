<?php

namespace App\Modules\Admin\Skills\Models\Relations\HasMany;

use App\Modules\Admin\HeroAmount\Models\HeroAmount;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyRelations
{

    public function amount_skills():HasMany
    {
        return $this->hasMany(HeroAmount::class,'skill_id','id');
    }
}
