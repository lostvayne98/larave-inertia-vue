<?php

Route::group(['prefix' => 'applications', 'middleware' => []], function () {
    Route::get('/', 'ApplicationsController@index')->name('applications.index');
    Route::get('/create', 'ApplicationsController@create')->name('applications.create');
    Route::post('/', 'ApplicationsController@store')->name('applications.store');
    Route::get('/{application}', 'ApplicationsController@show')->name('applications.read');
    Route::get('/edit/{application}', 'ApplicationsController@edit')->name('applications.edit');
    Route::put('/{application}', 'ApplicationsController@update')->name('applications.update');
    Route::delete('/{application}', 'ApplicationsController@destroy')->name('applications.delete');
});
