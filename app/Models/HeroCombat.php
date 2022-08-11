<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroCombat extends Model
{
    use HasFactory;
    protected $fillable = [
      'combat_skills_id',
      'hero_id',
      'amount'
    ];

    public function CombatSkills(){


        return $this->HasMany(CombatSkills::class,'id','combat_skills_id');

    }

    public function Heroes(){

        return $this->belongsTo(Heroes::class,'hero_id','id');
    }
}
