<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroes extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'name',
        'faculty',
        'course',
        'rank',
        'bio',
        'quests',
        'hack_skills',
        'combat_skills',
        'photo',
        'life',
        'energy',
        'firewall'
    ];

    public function CombatSkills(){

        return $this->hasOne(CombatSkills::class,'hack_skills','id');

    }

    public function HackSkills(){

        return $this->hasOne(HackSkills::class,'combat_skills','id');

    }
}
