<?php

namespace App\Modules\Admin\Skills\Controllers;

use App\Services\CrudService\CrudInterface;
use App\Modules\Admin\Skills\Models\Skill;
use App\Modules\Admin\Skills\Requests\SkillStoreRequest;
use App\Modules\Admin\Skills\Requests\SkillUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class SkillsController extends Controller
{
    private $crud;

    public function __construct(CrudInterface $crud)
    {
        $this->crud = $crud;
    }

    public function index():Response
    {
        $skills =   Skill::all();

        return  Inertia::render('Admin/Skills/Index',[
            'skills' => $skills
        ]);
    }


    public function create():Response
    {
        return  Inertia::render('Admin/Skills/Create');
    }


    public function store(SkillStoreRequest $request,Skill $skill):RedirectResponse
    {

        $this->crud->create($skill,$request->validated());

        return redirect()->route('skills.index')->with(['message' => 'Успешно']);

    }


    public function show(Skill $skill):Response
    {
        return Inertia::render('Admin/Skills/Update',[
            'skill' => $skill
        ]);
    }

    public function update(SkillUpdateRequest $request, Skill $skill):RedirectResponse
    {
        $this->crud->update($skill,$request->validated());

        return redirect()->route('skills.index')->with([
            'message' => 'Успешно'
        ]);
    }


    public function destroy(Skill $skill)
    {
        $this->crud->delete($skill);
    }
}
