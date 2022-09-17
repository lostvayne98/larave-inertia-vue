<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaiseResource;
use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\HeroCombat;
use App\Models\Heroes;
use App\Models\HeroHack;
use App\Models\Raise;
use App\Models\RaiseChars;
use App\Models\RaiseCombat;
use App\Models\RaiseEnergy;
use App\Models\RaiseFirewall;
use App\Models\RaiseHack;
use App\Models\RaiseSkillCombat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\RaiseSkill;
class RaiseController extends Controller
{
    //повышение жизней
    public function chars()
    {
        $raise = RaiseChars::with('Heroes', 'Users')->get();
        return Inertia::render('Raise/AddAmountChar', [
            'raises' => $raise,
            'title' => 'Повышение жизни'
        ]);
    }

    //повышение firewall
    public function charsFirewall()
    {
        $raise = RaiseFirewall::with('Heroes', 'Users')->get();

        return Inertia::render('Raise/AddAmountFirewall', [
            'raises' => $raise,
            'title' => 'Повышение Firewall'
        ]);
    }

    //повышение firewall
    public function charsEnergy()
    {
        $raise = RaiseEnergy::with('Heroes', 'Users')->get();

        return Inertia::render('Raise/AddAmountFirewall', [
            'raises' => $raise,
            'title' => 'Повышение Энергии'
        ]);
    }


        public function AddLife(RaiseChars $char){

        $hero = Heroes::where('id',$char->hero_id)->first();
        $life = $hero->life;
        $life++;
        $hero->update([
            'life' => $life
        ]);
            $char->delete();
        }

        //Повышение энергии
    public function AddEnergy(RaiseEnergy $char){
        $hero = Heroes::where('id',$char->hero_id)->first();
        $energy = $hero->energy;
        $energy++;
        $hero->update([
            'life' => $energy
        ]);

        $char->delete();
    }
    //Повышение firewall
    public function AddFirewall(RaiseFirewall $char){
        $hero = Heroes::where('id',$char->hero_id)->first();
        $firewall = $hero->firewall;
        $firewall++;
        $hero->update([
            'life' => $firewall
        ]);
        $char->delete();
    }

    public function destroyLife(RaiseChars $char){

        $char->delete();
    }
    public function DestroyEnergy(RaiseEnergy $char){
        $char->delete();
    }
    public function DestroyFirewall(RaiseFirewall $char){
        $char->delete();
    }


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

    //Увеличение скиллов

        public function AddHack(){

        $addSkill = RaiseSkill::with('Heroes','Users','HackSkills')->get();

        return Inertia::render('Raise/AddHack',[
            'raises' => $addSkill
        ]);

        }

        //Увеличение скиллов
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
//принять ув.скилла
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



    //принять увеличение

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
    public function destroyHack(RaiseCombat $combat){

        $combat->delete();
    }

    public function destroyAddHack(RaiseSkill $skill){

        $skill->delete();
    }
    public function destroyAddCombat(RaiseSkill $skill){

        $skill->delete();
    }

}
