<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaiseCombat extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_id',
        'user_id',
        'description',
        'skill_combat',
    ];

    public function Heroes() {

        return $this->belongsTo(Heroes::class,'hero_id','id');

    }

    public function Users() {

        return $this->belongsTo(User::class,'user_id','id');
    }
    public function CombatSkills(){

        return $this->belongsTo(CombatSkills::class,'skill_combat','id');
    }
}
