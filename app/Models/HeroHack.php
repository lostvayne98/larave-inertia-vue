<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroHack extends Model
{
    use HasFactory;

    protected $fillable = [
        'hack_skills_id',
        'hero_id',
        'amount'
    ];

    public function HackSkills(){

        return  $this->HasMany(HackSkills::class,'id','hack_skills_id');
    }

    public function Heroes(){

        return $this->belongsTo(Heroes::class,'hero_id','id');
    }
}
