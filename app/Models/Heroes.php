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
        'photo',
        'life',
        'energy',
        'firewall'
    ];

  public function heroHack(){

      return $this->hasMany(HeroHack::class,'hero_id','id');
  }

  public function heroCombat(){

      return $this->hasMany(HeroCombat::class,'hero_id','id');
  }

  public function CombatSkills(){

      return $this->hasManyThrough(CombatSkills::class,HeroCombat::class,'hero_id','id','id','combat_skills_id');
  }
    public function HackSkills(){

        return $this->hasManyThrough(HackSkills::class,HeroHack::class,'hero_id','id','id','hack_skills_id');
    }


}
