<?php

Route::group(['prefix' => 'hack-skills', 'middleware' => []], function () {
    Route::get('/', 'HackSkillsController@index')->name('hack-skills.index');
    Route::get('/create', 'HackSkillsController@create')->name('hack-skills.create');
    Route::post('/store', 'HackSkillsController@store')->name('hack-skills.store');
    Route::get('/{hackSkill}', 'HackSkillsController@show')->name('hack-skills.read');
    Route::get('/edit/{hackSkill}', 'HackSkillsController@edit')->name('hack-skills.edit');
    Route::put('/{hackSkill}', 'HackSkillsController@update')->name('hack-skills.update');
    Route::delete('/{hackSkill}', 'HackSkillsController@destroy')->name('hack-skills.delete');
});
