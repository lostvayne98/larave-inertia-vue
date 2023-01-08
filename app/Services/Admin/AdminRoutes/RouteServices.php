<?php

namespace App\Services\Admin\AdminRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class RouteServices extends  ServiceProvider
{
    public function boot()
    {
        $this->AdminWebRoutes();
    }

    protected function AdminWebRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('app/Modules/Admin/Admin/Routes/web.php'));
    }

}
