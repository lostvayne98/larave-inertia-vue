<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment;

interface  IncrementInterface
{
    public function increment(object $hero):void;
}
