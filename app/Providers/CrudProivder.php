<?php

namespace App\Providers;

use App\Modules\Admin\CrudService\CrudInterface;
use App\Modules\Admin\CrudService\CrudRepository;
use Illuminate\Support\ServiceProvider;

class CrudProivder extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrudInterface::class,CrudRepository::class);
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
