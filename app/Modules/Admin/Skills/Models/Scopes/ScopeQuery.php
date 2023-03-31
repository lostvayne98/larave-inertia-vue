<?php

namespace App\Modules\Admin\Skills\Models\Scopes;

trait ScopeQuery
{

    public function scopeHacks($query)
    {
        return $query->whereType('hack');
    }

    public function scopeCombats($query)
    {
        return $query->whereType('hack');
    }
}
