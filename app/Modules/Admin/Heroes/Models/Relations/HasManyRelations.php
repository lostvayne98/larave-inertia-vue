<?php

namespace App\Modules\Admin\Heroes\Models\Relations;

use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use App\Modules\Admin\HeroAmount\Models\HeroAmount;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyRelations
{


    public function skills():HasMany
    {
        return $this->hasMany(HeroAmount::class,'heroes_id','id');
    }
}
