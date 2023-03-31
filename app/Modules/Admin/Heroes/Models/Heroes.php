<?php

namespace App\Modules\Admin\Heroes\Models;


use App\Filter\Filterable;
use App\Modules\Admin\HeroAmount\Models\HeroAmount;
use App\Modules\Admin\Heroes\Models\Relations\HasManyRelations;
use App\Modules\Admin\Heroes\Models\Relations\HasOneRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Heroes extends Model
{
    use HasFactory,HasOneRelation,HasManyRelations,Filterable;

    protected $fillable = [
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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
    ];


}
