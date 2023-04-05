<?php

namespace App\Modules\Admin\Heroes\Providers;

use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementEnergy;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementFirewall;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementInterface;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementLife;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementSkill;
use Illuminate\Support\ServiceProvider;
class IncrementServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IncrementInterface::class, IncrementLife::class);
        $this->app->bind(IncrementInterface::class, IncrementEnergy::class);
        $this->app->bind(IncrementInterface::class, IncrementFirewall::class);
        $this->app->bind(IncrementInterface::class, function ($app, $params) {
            if (isset($params['skill_id'])) {
                return new IncrementSkill($params['skill_id']);
            }
            return new IncrementSkill();
        });
    }
}
