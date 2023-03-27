<?php

namespace App\Modules\Admin\HackSkills\Models;

use App\Modules\Admin\HackSkills\Models\Relations\MorphRelation;
use App\Modules\Admin\HackSkills\Models\Setters\HackSkillSetters;
use App\Modules\Admin\HeroAmount\Models\HeroAmount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class HackSkill extends Model
{
    use HasFactory,MorphRelation,HackSkillSetters;

    protected $fillable = [
        'name',
        'rarity'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function skills():MorphOne
    {
        return $this->morphOne(HeroAmount::class, 'skill');
    }
}
