<?php

namespace App\Modules\Admin\User\Models\Relations;

use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Modules\Admin\Heroes\Models\Heroes;
trait HasOneRelation
{
    public function hero():HasOne
    {
        return $this->HasOne(Heroes::class,'id','hero_id',);

    }
}
