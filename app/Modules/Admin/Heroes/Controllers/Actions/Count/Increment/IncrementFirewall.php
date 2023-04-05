<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment;

class IncrementFirewall implements IncrementInterface
{

    public function increment(object $hero): void
    {
        $hero->firewall++;
        $hero->save();
    }
}
