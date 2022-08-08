<?php

namespace App\Http\Controllers;

use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\Heroes;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Heroes::all();

        return Inertia::render('Heroes/Index',[
            'title' => 'Герои',
            'heroes' => $heroes
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $photo =  $request->file('photo')->store('img');
        }
        Heroes::create([
            'name' => $request->name,
            'faculty' => $request->faculty,
            'course' => $request->course,
            'rank'=> $request->rank,
            'bio'=> $request->bio,
            'quests'=> $request->quests,
            'hack_skills'=> $request->hackSkills,
            'combat_skills'=> $request->combatSkills,
            'photo' => $photo ?? '',
        ]);
        /*return redirect()->route('heroes.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Heroes $hero)
    {

        return Inertia::render('Heroes/Show',[
            'hero' => $hero,
            'title' => 'Детальная страница Героя'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heroes $hero)
    {
        $hero->update([
            'name' => $request->name,
            'faculty' => $request->faculty,
            'course' => $request->course,
            'rank'=> $request->rank,
            'bio'=> $request->bio,
            'quests'=> $request->quests,
            'hack_skills'=> $request->hackSkills,
            'combat_skills'=> $request->combatSkills,
            'photo' => $photo ?? '',
        ]);
        return redirect()->route('heroes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heroes $hero)
    {
        $hero->delete();
    }
}
