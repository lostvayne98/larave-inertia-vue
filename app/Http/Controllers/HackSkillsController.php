<?php

namespace App\Http\Controllers;

use App\Models\HackSkills;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HackSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hack = HackSkills::all();

        return Inertia::render('HackSkills/Index',[
            'hack' => $hack,
            'title' => 'Хак Скиллы'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('HackSkills/Create',[
            'title' => 'Создание Хак Скилла'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HackSkills $hack_skill)
    {

        $hack_skill->create([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);

            return redirect()->route('hack_skills.index');
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
    public function edit(HackSkills $hack_skill)
    {
        return Inertia::render('HackSkills/Update',[
            'title' => 'Редактирование Хак Скилла',
            'Hack' => $hack_skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HackSkills $hack_skill)
    {
        $hack_skill->update([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);
        return redirect()->route('hack_skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HackSkills $hack_skill)
    {
        $hack_skill->delete();
    }
}
