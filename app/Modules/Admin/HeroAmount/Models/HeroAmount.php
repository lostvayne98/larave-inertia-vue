<?php

namespace App\Modules\Admin\HeroAmount\Models;

use App\Modules\Admin\HeroAmount\Models\Relations\MorphRelation;
use App\Modules\Admin\Skills\Models\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id',
        'hero_id',
        'amount'
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class,'skill_id','id');
    }
}
