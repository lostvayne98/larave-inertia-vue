<?php

namespace App\Modules\Admin\HackSkills\Models;

use App\Modules\Admin\HackSkills\Models\Relations\MorphRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HackSkill extends Model
{
    use HasFactory,MorphRelation;
}
