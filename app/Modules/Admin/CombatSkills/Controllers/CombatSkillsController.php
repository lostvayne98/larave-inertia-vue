<?php

namespace App\Modules\Admin\CombatSkills\Controllers;


use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\CombatSkills\Requests\CombatSkillStoreRequest;
use App\Modules\Admin\CombatSkills\Requests\CombatSkillUpdateRequest;
use App\Http\Controllers\Controller;
use App\Modules\Admin\CrudService\CrudInterface;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class CombatSkillsController extends Controller
{
    private $crud;

    public function __construct(CrudInterface $crud)
    {
        $this->crud = $crud;
    }

    public function index(): \Inertia\Response
    {
      $skills =  CombatSkills::query()->paginate(5);

      return Inertia::render('Admin/CombatSkills/Index',[
          'skills' => $skills
      ]);
    }


    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/CombatSkills/Create');
    }


    public function store(CombatSkillStoreRequest $request,CombatSkills $combatSkills):RedirectResponse
    {

        $this->crud->create($combatSkills,$request->validated());

        return redirect()->route('combat-skills.index')->with(['message' => 'Успешно!']);
    }


    public function show(CombatSkills $combatSkill): \Inertia\Response
    {
        return Inertia::render('Admin/HackSkills/Show',[
            'skill' => $combatSkill
        ]);
    }


    public function edit(CombatSkills $combatSkill)
    {
        //
    }


    public function update(CombatSkillUpdateRequest $request, CombatSkills $combatSkill):RedirectResponse
    {
        $this->crud->update($combatSkill,$request->validated());
        return redirect()->route('combat-skills.index')->with(['message' => 'Успешно!']);
    }


    public function destroy(CombatSkills $combatSkill):RedirectResponse
    {
        $this->crud->delete($combatSkill);

        return  redirect()->route('combat-skills.index')->with([
           'message' => 'Успешно!'
        ]);
    }
}
