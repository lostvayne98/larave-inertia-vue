<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => []], function () {

    Route::resource('users', 'App\Modules\Admin\User\Controllers\UserController');

});
