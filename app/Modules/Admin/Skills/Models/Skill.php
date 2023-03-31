<?php

namespace App\Modules\Admin\Skills\Models;


use App\Modules\Admin\Skills\Models\Getters\Getters;
use App\Modules\Admin\Skills\Models\Relations\HasMany\HasManyRelations;
use App\Modules\Admin\Skills\Models\Scopes\ScopeQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Skill extends Model
{
    use HasFactory,HasManyRelations,Getters,ScopeQuery;

    protected $fillable = [
        'name',
        'rarity',
        'type',
    ];

    protected $casts = [
      'created_at' => 'datetime:Y-m-d h:i:s'
    ];




}
