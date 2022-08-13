<?php

namespace App\Http\Controllers;

use App\Events\CreateHeroHack;
use App\Events\CreateHeroCombat;
use App\Events\UpdateHeroCombat;
use App\Events\UpdateHeroHack;
use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\HeroCombat;
use App\Models\Heroes;
use App\Models\HeroHack;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HeroesController extends Controller
{

    public function index()
    {
        $heroes = Heroes::all();

        return Inertia::render('Heroes/Index',[
            'title' => 'Герои',
            'heroes' => $heroes
        ]);

    }


    public function create()
    {
        $hackSkills = HackSkills::all();

        $combatSkills = CombatSkills::all();
       $users = User::all();

        return Inertia::render('Heroes/Create',[
            'hackSkills' => $hackSkills,
            'combatSkills' => $combatSkills,
            'users' => $users,
            'title' => 'Создание героя'
        ]);
    }


    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $photo =  $request->file('photo')->store('img');
        }
       $hero =  Heroes::create([
            'name' => $request->name,
            'faculty' => $request->faculty,
            'course' => $request->course,
            'rank'=> $request->rank,
            'bio'=> $request->bio,
            'quests'=> $request->quests,
            'photo' => $photo ?? '',
        ]);

            $combat = $request->combatSkills;
            $hack = $request->hackSkills;
            $her = $hero->id;

        event(new CreateHeroCombat($combat,$her));

        event(new CreateHeroHack($her,$hack));

        return redirect()->route('heroes.index');
    }


    public function show(Heroes $hero)
    {
        // amount
        $hack = $hero->heroHack()->get();

        // amount
        $combat  =  $hero->heroCombat()->get();
        //название скилла
        $CSkills = $hero->CombatSkills()->get();
        //название скилла
        $HSkills = $hero->HackSkills()->get();


        return Inertia::render('Heroes/Show',[
            'hero' => $hero,
            'title' => 'Детальная страница Героя',
            'combatSkills' => $CSkills,
            'hackSkills' => $HSkills,
            'hackAmount' => $hack,
            'combatAmount' => $combat
        ]);
    }


    public function edit(Heroes $hero)
    {
        $hackSkills = HackSkills::all();

        $combatSkills = CombatSkills::all();
        $users = User::all();
        return Inertia::render('Heroes/Update',[
            'hero' => $hero,
            'hackSkills' => $hackSkills,
            'combatSkills' => $combatSkills ,
            'title' => 'Детальная страница Героя',
            'users'=> $users
        ]);
    }


    public function update(Request $request, Heroes $hero)
    {

        if($request->hasFile('photo')){
            $photo =  $request->file('photo')->store('img');
        }
            $hero->update([
            'name' => $request->name ?? $hero->name,
            'faculty' => $request->faculty ?? $hero->faculty,
            'course' => $request->course ?? $hero->course,
            'rank'=> $request->rank ?? $hero->rank,
            'bio'=> $request->bio ?? $hero->bio,
            'quests'=> $request->quests ?? $hero->quests,
            'photo' => $photo ?? '',
        ]);
        $combat = $request->combatSkills;
        $hack = $request->hackSkills;
        $her = $hero->id;
        event(new UpdateHeroCombat($combat,$her));
        event( new UpdateHeroHack($hack,$her));

        return redirect()->route('heroes.index');
    }

    public function incrementLife(Heroes $hero){
        $life = $hero->life;
        $life++;
        $hero->update([
            'life' => $life,
            'energy' => $life,
            'firewall' => $life
        ]);

    }
    public function incrementEnergy(Heroes $hero){
        $energy = $hero->energy;
        $energy++;
        $hero->update([

            'energy' => $energy,

        ]);

    }

    public function incrementFirewall(Heroes $hero){
        $firewall = $hero->firewall;
        $firewall++;
        $hero->update([

            'firewall' => $firewall,

        ]);

    }




    public function destroy(Heroes $hero)
    {

        $hero->delete();

    }
}
