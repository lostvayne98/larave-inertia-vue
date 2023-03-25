<?php

namespace App\Modules\Admin\HackSkills\Models\Setters;

use Illuminate\Support\Str;

trait HackSkillSetters
{
    public function SetNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
    }

    public function SetRarityAttribute($value)
    {
        $this->attributes['rarity'] = Str::title($value);
    }
}
