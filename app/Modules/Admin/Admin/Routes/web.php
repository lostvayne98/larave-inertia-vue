<?php
use Illuminate\Support\Facades\Route;

Route::group([ 'middleware' => ['auth']], function () {
    Route::resource('admins','App\Modules\Admin\Admin\Controllers\AdminController');
});
