<?php

namespace App\Http\Controllers;

use App\Models\HackSkills;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HackSkillsController extends Controller
{

    public function index()
    {
        $hack = HackSkills::all();

        return Inertia::render('HackSkills/Index',[
            'hack' => $hack,
            'title' => 'Хак Скиллы'
        ]);
    }


    public function create()
    {
        return Inertia::render('HackSkills/Create',[
            'title' => 'Создание Хак Скилла'
        ]);
    }


    public function store(Request $request, HackSkills $hack_skill)
    {

        $hack_skill->create([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);

            return redirect()->route('hack_skills.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(HackSkills $hack_skill)
    {
        return Inertia::render('HackSkills/Update',[
            'title' => 'Редактирование Хак Скилла',
            'Hack' => $hack_skill,
        ]);
    }


    public function update(Request $request, HackSkills $hack_skill)
    {
        $hack_skill->update([
            'name' => $request->name,
            'rarity' => $request->rarity
        ]);
        return redirect()->route('hack_skills.index');
    }


    public function destroy(HackSkills $hack_skill)
    {
        $hack_skill->delete();
    }
}
