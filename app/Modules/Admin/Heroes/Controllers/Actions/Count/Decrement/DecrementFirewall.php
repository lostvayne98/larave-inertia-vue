<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement;

class DecrementFirewall implements DecrementInterface
{

    public function decrement(object $hero)
    {
        $hero->firewall--;
        $hero->save();
    }
}
