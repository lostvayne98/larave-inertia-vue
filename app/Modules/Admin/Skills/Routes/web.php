<?php

Route::group(['prefix' => 'skills', 'middleware' => []], function () {
    Route::get('/', 'SkillsController@index')->name('skills.index');
    Route::get('/create', 'SkillsController@create')->name('skills.create');
    Route::post('/', 'SkillsController@store')->name('skills.store');
    Route::get('/{skill}', 'SkillsController@show')->name('skills.read');
    Route::get('/edit/{skill}', 'SkillsController@edit')->name('skills.edit');
    Route::put('/{skill}', 'SkillsController@update')->name('skills.update');
    Route::delete('/{skill}', 'SkillsController@destroy')->name('skills.delete');
});
