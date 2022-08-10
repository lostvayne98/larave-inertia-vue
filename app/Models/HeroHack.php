<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroHack extends Model
{
    use HasFactory;

    protected $fillable = [
        'hack_skill_id',
        'hero_id',
        'amount'
    ];
}
