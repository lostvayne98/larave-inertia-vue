<?php

namespace App\Modules\Admin\Heroes\Providers;

use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementEnergy;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementFirewall;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementInterface;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementLife;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementSkill;
use Illuminate\Support\ServiceProvider;
class DecrementServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(DecrementInterface::class,DecrementLife::class);
        $this->app->bind(DecrementInterface::class,DecrementEnergy::class);
        $this->app->bind(DecrementInterface::class,DecrementFirewall::class);
        $this->app->bind(DecrementInterface::class,function ($app,$params) {
            if (isset($params['skill_id'])) {
                return new DecrementSkill($params);
            }
                return  new DecrementSkill();

        });
    }
}
