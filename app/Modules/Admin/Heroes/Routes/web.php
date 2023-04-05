<?php

Route::group(['prefix' => 'heroes', 'middleware' => []], function () {
    Route::get('/', 'HeroesController@index')->name('heroes.index');
    Route::get('/create', 'HeroesController@create')->name('heroes.create');
    Route::post('/', 'HeroesController@store')->name('heroes.store');
    Route::get('/{hero}', 'HeroesController@show')->name('heroes.read');
    Route::get('/edit/{hero}', 'HeroesController@edit')->name('heroes.edit');
    Route::put('/{hero}', 'HeroesController@update')->name('heroes.update');
    Route::delete('/{hero}', 'HeroesController@destroy')->name('heroes.delete');
});

Route::group(['prefix' => 'heroes/increment','middleware' => []],function () {
    Route::post('/{hero}','IncrementController')->name('increment');

});

Route::group(['prefix' => 'heroes/decrement','middleware' => []],function () {
    Route::post('/{hero}', 'DecrementController')->name('decrement');
});
