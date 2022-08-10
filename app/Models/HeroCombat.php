<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroCombat extends Model
{
    use HasFactory;
    protected $fillable = [
      'combat_skill_id',
      'hero_id',
      'amount'
    ];
}
