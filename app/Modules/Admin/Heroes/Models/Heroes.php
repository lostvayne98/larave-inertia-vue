<?php

namespace App\Modules\Admin\Heroes\Models;


use App\Filter\Filterable;
use App\Modules\Admin\Heroes\Models\Relations\HasManyRelations;
use App\Modules\Admin\Heroes\Models\Relations\HasOneRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroes extends Model
{
    use HasFactory,HasOneRelation,HasManyRelations,Filterable;

}
