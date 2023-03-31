<?php

namespace App\Modules\Admin\User\Providers;

use App\Modules\Admin\User\Controllers\Actions\UpdateHero\UpdateHeroAction;
use App\Modules\Admin\User\Controllers\Actions\UpdateHero\UpdateHeroInUserInterface;
use Illuminate\Support\ServiceProvider;

class UpdateHeroProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UpdateHeroInUserInterface::class,UpdateHeroAction::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
