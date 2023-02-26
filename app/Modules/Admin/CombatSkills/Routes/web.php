<?php

Route::group(['prefix' => 'combat-skills', 'middleware' => []], function () {
    Route::get('/', 'CombatSkillsController@index')->name('combat-skills.index');
    Route::get('/create', 'CombatSkillsController@create')->name('combat-skills.create');
    Route::post('/', 'CombatSkillsController@store')->name('combat-skills.store');
    Route::get('/{combatSkill}', 'CombatSkillsController@show')->name('combat-skills.read');
    Route::get('/edit/{combatSkill}', 'CombatSkillsController@edit')->name('combat-skills.edit');
    Route::put('/{combatSkill}', 'CombatSkillsController@update')->name('combat-skills.update');
    Route::delete('/{combatSkill}', 'CombatSkillsController@destroy')->name('combat-skills.delete');
});
