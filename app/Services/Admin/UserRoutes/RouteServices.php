<?php

namespace App\Services\Admin\UserRoutes;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class RouteServices extends ServiceProvider
{


    public function boot()
    {

        $this->UserWebRoutes();
    }

    protected function UserWebRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('app/Modules/Admin/User/Routes/web.php'));
    }


}
