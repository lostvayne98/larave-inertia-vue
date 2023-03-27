<?php

namespace App\Modules\Admin\Heroes\Controllers;


use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\CrudService\CrudInterface;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use App\Modules\Admin\Heroes\Controllers\Actions\CreateHeroCombatSkillAction;
use App\Modules\Admin\Heroes\Controllers\Actions\CreateHeroHackSkillAction;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\Heroes\Requests\HeroesStoreRequest;
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


       $combatSkills =  CombatSkills::query()->orderBy('id')->get();
       $hackSkills = HackSkill::query()->orderBy('id')->get();

        return Inertia::render('Admin/Heroes/Create',[
            'combats' => $combatSkills,
            'hacks' => $hackSkills
        ]);
    }


    public function store(HeroesStoreRequest $request,Heroes $heroes,
                          CreateHeroCombatSkillAction $combatSkillAction,
                          CreateHeroHackSkillAction $hackSkillAction):RedirectResponse
    {
        $data = $request->validated();


            $hero =  $this->crud->create($heroes,$data);

            $combatSkillAction->handle($hero,$data);

            $hackSkillAction->handle($hero,$data);

            return redirect()->route('heroes.index')->with(['message' => 'Успешно']);




    }


    public function show(Heroes $hero): \Inertia\Response
    {
        return Inertia::render('Admin/Heroes/Show',[
            'hero' => $hero
        ]);
    }


    public function edit(Heroes $hero): \Inertia\Response
    {
        return Inertia::render('Admin/Heroes/Update',[
            'hero' => $hero
        ]);
    }


    public function update(Request $request, Heroes $hero,UpdateAction $action):RedirectResponse
    {

        $this->crud->update($hero,$request->all());

        return redirect()->route('heroes.index')->with(['message' => 'Успешно']);

    }


    public function destroy(Heroes $hero):RedirectResponse
    {
        $this->crud->delete($hero);

        return redirect()->route('heroes.index')->with(['message' => 'Успешно']);

    }
}
