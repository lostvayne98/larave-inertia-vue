<?php

namespace App\Modules\Admin\CombatSkills\Controllers;

use App\Modules\Admin\CombatSkills\Controllers\Actions\CombatSkillStoreAction;
use App\Modules\Admin\CombatSkills\Controllers\Actions\CombatSkillUpdateAction;
use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\CombatSkills\Requests\CombatSkillStoreRequest;
use App\Modules\Admin\CombatSkills\Requests\CombatSkillUpdateRequest;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CombatSkillsController extends Controller
{

    public function index()
    {
      $skills =  CombatSkills::query()->paginate(5);

      return Inertia::render('Admin/CombatSkills/Index',[
          'skills' => $skills
      ]);
    }


    public function create()
    {
        return Inertia::render('Admin/CombatSkills/Create');
    }


    public function store(CombatSkillStoreRequest $request,CombatSkillStoreAction $action)
    {
        $action->handle($request->validated());
        return redirect()->route('combat-skills.index')->with(['message' => 'Успешно!']);
    }


    public function show(CombatSkills $combatSkill)
    {
        return Inertia::render('Admin/HackSkills/Show',[
            'skill' => $combatSkill
        ]);
    }


    public function edit(CombatSkills $combatSkill)
    {
        //
    }


    public function update(CombatSkillUpdateRequest $request, CombatSkills $combatSkill,CombatSkillUpdateAction $action)
    {
        $action->handle($combatSkill,$request->validated());
        return redirect()->route('combat-skills.index')->with(['message' => 'Успешно!']);
    }


    public function destroy(CombatSkills $combatSkill)
    {
        $combatSkill->delete();
    }
}
