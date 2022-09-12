<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', function () {
    return view('auth.login');
});
Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => ['auth','role:admin']],function() {

     /*   Route::get('/', 'App\Http\Controllers\AdminLteController@admin')->name('admin');*/
        //Вывод шаблона
        Route::get('/','App\Http\Controllers\AdminLteController@index')->name('admin');
        //Вывод пользователей CRUD
        Route::resource('/users','App\Http\Controllers\UserController');
        //Обычные скиллы CRUD
        Route::resource('/combat_skills','App\Http\Controllers\CombatSkillsController');
        //Хак Скиллы CRUD
        Route::resource('/hack_skills','App\Http\Controllers\HackSkillsController');
        //Герой CRUD
        Route::resource('/heroes','App\Http\Controllers\HeroesController')->except([
            'update'
        ]);
        Route::post('/heroes/{hero}','App\Http\Controllers\HeroesController@update')->name('heroes.update');
        //Повышения кол-во combat
        Route::post('/users/increment-amountCombat/{heroCombat}','App\Http\Controllers\UserController@incrementAmountCombat')->name('increment.amountCombat');
        //Уменьшение кол-во combat
        Route::post('/users/decrement-amountCombat/{heroCombat}','App\Http\Controllers\UserController@decrementAmountCombat')->name('decrement.amountCombat');
        //Повышения кол-во hack
        Route::post('/users/increment-amountHack/{herohack}','App\Http\Controllers\UserController@incrementAmountHack')->name('increment.amountHack');
        //Повышения кол-во hack
        Route::post('/users/decrement-amountHack/{herohack}','App\Http\Controllers\UserController@decrementAmountHack')->name('decrement.amountHack');
        //Повышение жизни.энергии и firewall
        Route::post('/users/increment-life/{hero}','App\Http\Controllers\HeroesController@incrementLife')->name('increment.life');
        Route::post('/users/decrement-life/{hero}','App\Http\Controllers\HeroesController@decrementLife')->name('decrement.life');
        //Повышение энергии
        Route::post('/users/increment-energy/{hero}','App\Http\Controllers\HeroesController@incrementEnergy')->name('increment.energy');
        Route::post('/users/decrement-energy/{hero}','App\Http\Controllers\HeroesController@decrementEnergy')->name('decrement.energy');
        //повышение firewall
        Route::post('/users/increment-firewall/{hero}','App\Http\Controllers\HeroesController@incrementFirewall')->name('increment.firewall');
        Route::post('/users/decrement-firewall/{hero}','App\Http\Controllers\HeroesController@decrementFirewall')->name('decrement.firewall');

        //Добавление  скилла уже созданному герою
        Route::get('/heroes/add-hack-skill/{hero}','App\Http\Controllers\HeroesController@addSkills')->name('add.skills');
        Route::post('/heroes/add-hack-skill/{hero}','App\Http\Controllers\HeroesController@submitAddSkills')->name('submit.add.skills');

        Route::post('users/destroy-hero-hack/{heroHack}','App\Http\Controllers\HeroesController@destroyHeroHack')->name('destroy.hero.hack');
        Route::post('users/destroy-hero-combat/{heroCombat}','App\Http\Controllers\HeroesController@destroyHeroCombat')->name('destroy.hero.combat');
        Route::get('application-users','App\Http\Controllers\RaiseController@index')->name('application');

        Route::get('user','App\Http\Controllers\Api\ApiController@ApiUser')->name('apiUser');
        //Заявка на повышение хак скилла
        Route::get('raise-hack','App\Http\Controllers\RaiseController@raiseHack')->name('raise.hack');
        Route::get('raise-combat','App\Http\Controllers\RaiseController@raiseCombat')->name('raise.combat');
        Route::get('raise-add-hack','App\Http\Controllers\RaiseController@AddHack')->name('raise.add.hack');
        Route::get('raise-add-combat','App\Http\Controllers\RaiseController@AddCombat')->name('raise.add.combat');
        //принять
        Route::post('accept-raise-hack/{raise}','App\Http\Controllers\RaiseController@accept')->name('accept.hack');
        Route::post('accept-raise-combat/{combat}','App\Http\Controllers\RaiseController@acceptCombat')->name('accept.combat');
        Route::post('destroy-raise-hack/{raise}','App\Http\Controllers\RaiseController@destroy')->name('destroy.hack');
        Route::post('destroy-raise-hack/{raise}','App\Http\Controllers\RaiseController@destroyCombat')->name('destroy.combat');
        Route::post('destroy-raise-hack/{raise}','App\Http\Controllers\RaiseController@destroyCombat')->name('destroy.add.combat');
        Route::post('accept-add-hack/{skill}','App\Http\Controllers\RaiseController@acceptAddHack')->name('accept.add.hack');
        Route::post('accept-add-combat/{skill}','App\Http\Controllers\RaiseController@acceptAddCombat')->name('accept.add.combat');

    });
});


Auth::routes();
Route::group(['middleware' => 'auth'],function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/' , 'App\Http\Controllers\HomeController@welcome')->name('welcome');

});



