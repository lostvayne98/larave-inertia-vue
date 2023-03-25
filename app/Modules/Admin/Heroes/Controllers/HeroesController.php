<?php

namespace App\Modules\Admin\Heroes\Controllers;

use App\Modules\Admin\ActionsCRUD\DeleteAction;
use App\Modules\Admin\ActionsCRUD\StoreAction;
use App\Modules\Admin\ActionsCRUD\UpdateAction;
use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\HackSkills\Models\HackSkill;
use App\Modules\Admin\Heroes\Controllers\Actions\CreateHeroCombatSkillAction;
use App\Modules\Admin\Heroes\Controllers\Actions\CreateHeroHackSkillAction;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\Heroes\Requests\HeroesStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HeroesController extends Controller
{

    public function index()
    {
        $heroes = Heroes::query()->orderBy('id')->paginate(5);
        return Inertia::render('Admin/Heroes/Index',[
            'heroes' => $heroes
        ]);
    }


    public function create()
    {
       $combatSkills =  CombatSkills::query()->orderBy('id')->get();
       $hackSkills = HackSkill::query()->orderBy('id')->get();

        return Inertia::render('Admin/Heroes/Create',[
            'combats' => $combatSkills,
            'hacks' => $hackSkills
        ]);
    }


    public function store(HeroesStoreRequest $request,Heroes $heroes,
                          StoreAction $action,
                          CreateHeroCombatSkillAction $combatSkillAction,
                          CreateHeroHackSkillAction $hackSkillAction)
    {
        $data = $request->validated();
        try {
            $hero =  $action->store($heroes,$data);

            $combatSkillAction->handle($hero,$data);

            $hackSkillAction->handle($hero,$data);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }


    }


    public function show(Heroes $hero)
    {
        return Inertia::render('Admin/Heroes/Show',[
            'hero' => $hero
        ]);
    }


    public function edit(Heroes $hero)
    {
        return Inertia::render('Admin/Heroes/Update',[
            'hero' => $hero
        ]);
    }


    public function update(Request $request, Heroes $hero,UpdateAction $action)
    {
        $action->update($hero,$request->all());
    }


    public function destroy(Heroes $hero,DeleteAction $action)
    {
        $action->delete($hero);
    }
}
