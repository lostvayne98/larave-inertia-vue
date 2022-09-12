<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaiseResource;
use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\HeroCombat;
use App\Models\Heroes;
use App\Models\HeroHack;
use App\Models\Raise;
use App\Models\RaiseCombat;
use App\Models\RaiseHack;
use App\Models\RaiseSkillCombat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\RaiseSkill;
class RaiseController extends Controller
{
    //заявки на хак скиллы повышение +1
    public function raiseHack () {

    $rise = RaiseHack::with('Heroes','Users','HackSkills')->get();
            return Inertia::render('Raise/Index',[
                'raises' => $rise,
            ]);
        }
    //Заявки на повышение обычных скиллов +1

        public function raiseCombat(){

        $raise = RaiseCombat::with('Heroes','Users','CombatSkills')->get();
        return Inertia::render('Raise/Combat',[
           'raises' => $raise
        ]);

        }

        public function AddHack(){

        $addSkill = RaiseSkill::with('Heroes','Users','HackSkills')->get();

        return Inertia::render('Raise/AddHack',[
            'raises' => $addSkill
        ]);

        }
    public function AddCombat(){

        $addSkill = RaiseSkillCombat::with('Heroes','Users','CombatSkills')->get();

        return Inertia::render('Raise/AddCombat',[
            'raises' => $addSkill
        ]);

    }
//принять

        public function acceptAddHack(RaiseSkill $skill){

        $hack = HackSkills::where('id','=',$skill->app)->first();
        $hero = Heroes::where('id','=',$skill->hero_id)->first();

        HeroHack::create([
            'hack_skills_id' => $hack->id,
            'hero_id' => $hero->id
        ]);
            $skill->delete();
        }

    public function acceptAddCombat(RaiseSkillCombat $skill){


        $combat = CombatSkills::where('id','=',$skill->app)->first();
        $hero = Heroes::where('id','=',$skill->hero_id)->first();

        HeroCombat::create([
            'combat_skills_id' => $combat->id,
            'hero_id' => $hero->id
        ]);
        $skill->delete();
    }


        public function acceptCombat(RaiseCombat $combat){

            $heroCombat =   HeroCombat::where('combat_skills_id','=',$combat->skill_combat)->first();

            $amount = $heroCombat->amount;

            $amount++;

            $heroCombat->update([
                'amount'  => $amount
            ]);
            $combat->delete();
        }



    //принять

    public function accept(Request $request,RaiseHack $raise){


     $heroHack =   HeroHack::where('hack_skills_id','=',$raise->skill_hack)->first();

     $amount = $heroHack->amount;

      $amount++;

     $heroHack->update([
          'amount'  => $amount
      ]);
        $raise->delete();
    }
//Отменить
    public function destroy(RaiseHack $raise){

        $raise->delete();
    }

    public function destroyCombat(RaiseCombat $combat){

        $combat->delete();
    }

    public function destroyAddHack(RaiseSkill $skill){

        $skill->delete();
    }

}
