<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement;

class DecrementEnergy implements DecrementInterface
{

    public function decrement(object $hero)
    {
        $hero->energy--;
        $hero->save();
    }
}
