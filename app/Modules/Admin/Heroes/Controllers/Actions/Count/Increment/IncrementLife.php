<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment;

class IncrementLife implements IncrementInterface
{

    public function increment(object $hero):void
    {
        $hero->life++;
        $hero->save();
    }
}
