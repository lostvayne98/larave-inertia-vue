<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment;

class IncrementEnergy implements IncrementInterface
{

    public function increment(object $hero):void
    {
        $hero->energy++;
        $hero->save();
    }
}
