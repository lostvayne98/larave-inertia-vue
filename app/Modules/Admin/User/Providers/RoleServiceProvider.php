<?php

namespace App\Modules\Admin\User\Providers;

use App\Modules\Admin\User\Controllers\Actions\SetRole\SetRoleAction;
use App\Modules\Admin\User\Controllers\Actions\SetRole\SetRoleInterface;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SetRoleInterface::class,SetRoleAction::class);
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
