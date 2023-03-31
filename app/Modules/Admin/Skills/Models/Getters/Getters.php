<?php

namespace App\Modules\Admin\Skills\Models\Getters;

trait Getters
{
    public function getTypeAttribute($value)
    {
        if ($value == 'hack')
            return $this->type = 'Хак';
        else
            return  $this->type = 'Обычный';
    }
}
