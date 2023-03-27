<?php

namespace App\Modules\Admin\HackSkills\Controllers;


use App\Modules\Admin\CrudService\CrudInterface;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use App\Modules\Admin\HackSkills\Requests\HackSkillsStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HackSkillsController extends Controller
{
    private $crud;

    public function __construct(CrudInterface $crud)
    {
        $this->crud = $crud;
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/HackSkills/Index',[
            'skills' => HackSkill::query()->paginate(6)
        ]);
    }


    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/HackSkills/Create');
    }


    public function store(HackSkillsStoreRequest $request,HackSkill $skill):RedirectResponse
    {
        $this->crud->create($skill,$request->validated());
        return redirect()->route('hack-skills.index')->with(['message' => 'Успешно']);

    }


    public function show(HackSkill $hackSkill): \Inertia\Response
    {
        return Inertia::render('Admin/HackSkills/Show',[
            'skill' => $hackSkill
        ]);
    }


    public function edit(HackSkill $hackSkill)
    {
        //
    }


    public function update(Request $request, HackSkill $hackSkill):RedirectResponse
    {
        $this->crud->update($hackSkill,$request->all());
        return redirect()->route('hack-skills.index')->with(['message' => 'Успешно']);

    }


    public function destroy(HackSkill $hackSkill):RedirectResponse
    {
        $this->crud->delete($hackSkill);
        return redirect()->route('hack-skills.index')->with(['message' => 'Успешно']);
    }
}
