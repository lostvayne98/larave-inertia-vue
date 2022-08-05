<?php

namespace App\Http\Controllers;

use App\Models\CombatSkills;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CombatSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combatSkills = CombatSkills::all();

        return Inertia::render('CombatSkills/Index',[
            'combatSkills' => $combatSkills,
            'title' => 'Обычные скиллы'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CombatSkills/Create',[
            'title' => 'Создание Скилла'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CombatSkills $combatSkills)
    {
        $combatSkills->create([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);
        return redirect()->route('combat_skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CombatSkills $combat_skill)
    {
        return Inertia::render('CombatSkills/Update',[
            'title' => 'Редактирование Скилла',
            'Combat' => $combat_skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request,CombatSkills $combat_skill)
    {
        $combat_skill->update([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);
        return redirect()->route('combat_skills.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CombatSkills $combat_skill)
    {
        $combat_skill->delete();
    }
}
