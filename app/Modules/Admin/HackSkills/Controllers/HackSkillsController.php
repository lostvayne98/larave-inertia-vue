<?php

namespace App\Modules\Admin\HackSkills\Controllers;

use App\Modules\Admin\ActionsCRUD\DeleteAction;
use App\Modules\Admin\ActionsCRUD\StoreAction;
use App\Modules\Admin\ActionsCRUD\UpdateAction;
use App\Modules\Admin\HackSkills\Controllers\Actions\HackSkillStoreAction;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use App\Modules\Admin\HackSkills\Requests\HackSkillsStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HackSkillsController extends Controller
{

    public function index()
    {
        return Inertia::render('Admin/HackSkills/Index',[
            'skills' => HackSkill::query()->paginate(6)
        ]);
    }


    public function create()
    {
        return Inertia::render('Admin/HackSkills/Create');
    }


    public function store(HackSkillsStoreRequest $request,HackSkill $skill,StoreAction $action)
    {
        $action->store($skill,$request->validated());
    }


    public function show(HackSkill $hackSkill)
    {
        return Inertia::render('Admin/HackSkills/Show',[
            'skill' => $hackSkill
        ]);
    }


    public function edit(HackSkill $hackSkill)
    {
        //
    }


    public function update(Request $request, HackSkill $hackSkill,UpdateAction $action)
    {
        $action->update($hackSkill,$request->all());
    }


    public function destroy(HackSkill $hackSkill,DeleteAction $action)
    {
        $action->delete($hackSkill);
    }
}
