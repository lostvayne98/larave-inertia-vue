<?php

namespace App\Modules\Admin\Heroes\Controllers;



use App\Modules\Admin\Heroes\Requests\UpdateRequest;
use App\Services\CrudService\CrudInterface;
use App\Modules\Admin\Heroes\Controllers\Actions\CreateAmountSkills;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\Heroes\Requests\HeroesStoreRequest;
use App\Modules\Admin\Skills\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HeroesController extends Controller
{
    private $crud;

    public function __construct(CrudInterface $crud)
    {
        $this->crud = $crud;
    }

    public function index(): \Inertia\Response
    {
        $heroes = Heroes::query()->orderBy('id')->paginate(5);


        return Inertia::render('Admin/Heroes/Index',[
            'heroes' => $heroes
        ]);
    }


    public function create(): \Inertia\Response
    {


       $combatSkills =  Skill::query()->Combats()->orderBy('id')->get();
       $hackSkills = Skill::query()->Hacks()->orderBy('id')->get();

        return Inertia::render('Admin/Heroes/Create',[
            'combats' => $combatSkills,
            'hacks' => $hackSkills
        ]);
    }


    public function store(HeroesStoreRequest $request,Heroes $heroes,CreateAmountSkills $amountSkills):RedirectResponse
    {
        $hero =  $this->crud->create($heroes,$request->except('hack_skills','combat_skills'));
        $amountSkills->handle($hero,$request->only('hack_skills','combat_skills'));

        return redirect()->route('heroes.index')->with(['message' => 'Успешно']);

    }


    public function show(Heroes $hero): \Inertia\Response
    {
        $hero->load([
           'user',
           'skills',
           'skills.skill'
        ]);
        return Inertia::render('Admin/Heroes/Show',[
            'hero' => $hero
        ]);
    }


    public function edit(Heroes $hero): \Inertia\Response
    {
        $hero->load('skills');
        return Inertia::render('Admin/Heroes/Update',[
            'hero' => $hero
        ]);
    }


    public function update(UpdateRequest $request, Heroes $hero):RedirectResponse
    {

        $this->crud->update($hero,$request->validated());

        return redirect()->route('heroes.index')->with(['message' => 'Успешно']);

    }


    public function destroy(Heroes $hero):RedirectResponse
    {
        $this->crud->delete($hero);

        return redirect()->route('heroes.index')->with(['message' => 'Успешно']);

    }
}
