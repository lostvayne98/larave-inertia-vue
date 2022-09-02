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
use Illuminate\Support\Facades\DB;
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

            $combats = $request->combatSkills;

            $hack = $request->hackSkills;

            $her = $hero->id;

        foreach ($combats as $k => $v) {

            event(new CreateHeroCombat($v,$her));

        }

        foreach ($hack as $k => $v) {

            event(new CreateHeroHack($her,$v));
        }


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

        $combats = $request->combatSkills;

        $hack = $request->hackSkills;

        $her = $hero->id;

        foreach ($combats as $k => $v) {

            event(new UpdateHeroCombat($v,$her));

        }

        foreach ($hack as $k => $v) {

            event(new UpdateHeroHack($her,$v));
        }

        return redirect()->route('heroes.index');
    }

    public function incrementLife(Heroes $hero){
        $life = $hero->life;
        $energy = $hero->energy;
        $firewall = $hero->firewall;

        $energy++;
        $firewall++;
        $life++;
        $hero->update([
            'life' => $life,
            'energy' => $energy,
            'firewall' => $firewall
        ]);

    }
    public function decrementLife(Heroes $hero){
        $life = $hero->life;
        $energy = $hero->energy;
        $firewall = $hero->firewall;

        $energy--;
        $firewall--;
        $life--;
        $hero->update([
            'life' => $life,
            'energy' => $energy,
            'firewall' => $firewall
        ]);

    }
    public function incrementEnergy(Heroes $hero){
        $energy = $hero->energy;
        $energy++;
        $hero->update([

            'energy' => $energy,

        ]);

    }
    public function decrementEnergy(Heroes $hero){
        $energy = $hero->energy;
        $energy--;
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
    public function decrementFirewall(Heroes $hero){
        $firewall = $hero->firewall;
        $firewall--;
        $hero->update([

            'firewall' => $firewall,

        ]);

    }

    public function addSkills (Heroes $hero) {

        $hacks = HackSkills::all();

        $combats = CombatSkills::all();



        return Inertia::render('Heroes/AddHackSkill',[
            'title' => 'Добавление скилла герою:'. $hero->name,
            'hackSkills' => $hacks,
            'combatSkills' =>$combats,
            'hero' => $hero->id
        ]);

    }

    public function submitAddSkills (Request $request,Heroes $hero) {
        $id = $request->id;

        $combats = $request->CombatSkills;

        $hacks = $request->HackSkills;
        if (!empty($combats)){
            foreach ($combats as $k => $v)
            DB::table('hero_combats')->insert([
               'combat_skills_id' => $v,
                'hero_id' => $id
            ]);

        }
        if (!empty($hacks)) {
            foreach ($hacks as $k => $v)

            DB::table('hero_hacks')->insert([
               'hack_skills_id' => $v,
                'hero_id' => $hero->id
            ]);
        }
            return redirect()->route('heroes.index');

    }




    public function destroy(Heroes $hero)
    {

        $hero->delete();

    }

    public function destroyHeroHack (HeroHack $heroHack) {

        $heroHack->delete();
    }
    public function destroyHeroCombat (HeroCombat $heroCombat) {

        $heroCombat->delete();
    }
}
