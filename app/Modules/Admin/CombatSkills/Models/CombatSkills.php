<?php

namespace App\Modules\Admin\CombatSkills\Models;

use App\Modules\Admin\CombatSkills\Models\Relations\MorphRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatSkills extends Model
{
    use HasFactory,MorphRelation;
}
