<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement;

class DecrementLife implements DecrementInterface
{

    public function decrement(object $hero)
    {
        $hero->life--;
        $hero->save();
    }
}