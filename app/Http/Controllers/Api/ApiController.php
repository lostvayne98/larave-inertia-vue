<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeroResource;
use App\Http\Resources\UserResource;
use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\Heroes;
use App\Models\Raise;
use App\Models\RaiseChar;
use App\Models\RaiseChars;
use App\Models\RaiseCombat;
use App\Models\RaiseEnergy;
use App\Models\RaiseFirewall;
use App\Models\RaiseHack;
use App\Models\RaiseSkill;
use App\Models\RaiseSkillCombat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
   public function user(){

       $hero = HeroResource::collection(Heroes::with('user','heroHack','heroCombat','CombatSkills','HackSkills')
       ->where('user_id',Auth::user()->id)->get());
   }

    //add amount

    public function addAmounthack(Request $request){

       $user = Auth::user();
       $hero = Heroes::where('user_id',$user->id)->first();

        RaiseHack::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
            'skill_hack' => $request->skill_hack
        ]);
        return response()->json([
            'message' => 'ok'
        ]);
    }

    public function addAmountCombat(Request $request){

        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();

        RaiseCombat::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
            'skill_combat' => $request->skill_combat
        ]);

        return response()->json([
            'message' => 'ok'
        ]);

    }

    //add skill
    public function addHack(Request $request){
        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();

        RaiseSkill::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
            'app' => $request->skill // передать должен id скилла
        ]);

        return response()->json([
            'message' => 'ok'
        ]);


    }

    public function addCombat(Request $request){
        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();

        RaiseSkillCombat::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
            'app' => $request->skill_combat //передать должен id скилла
        ]);

        return response()->json([
            'message' => 'ok'
        ]);

    }
    //add chars
    public function addLife(Request $request){
        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();
        RaiseChars::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,

        ]);

            return response()->json([
                'message' => 'ok'
            ]);
    }

    public function addEnergy(Request $request){
        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();

        RaiseEnergy::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'ok'
        ]);
    }

    public function addFirewall(Request $request){
        $user = Auth::user();
        $hero = Heroes::where('user_id',$user->id)->first();

        RaiseFirewall::create([
            'user_id' => $user->id,
            'hero_id' => $hero->id,
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'ok'
        ]);

    }

    public function getHackSkills(){
       $hackSkills = HackSkills::all();

       return response()->json([
           'hack_skills' => $hackSkills
       ]);
    }

    public function getCombatSkills(){
       $combatSkills = CombatSkills::all();

       return response()->json([
           'combatSkills' => $combatSkills
       ]);
    }




}
