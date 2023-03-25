<?php

namespace App\Modules\Admin\Heroes\Models\Relations;

use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyRelations
{
    public function hack_skills():HasMany
    {
        return $this->HasMany(HackSkill::class,'hero_id','id');
    }

    public function combat_skills():HasMany
    {
        return  $this->hasMany(CombatSkills::class,'hero_id','id');
    }
}
