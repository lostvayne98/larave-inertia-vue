<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaiseResource;
use App\Models\CombatSkills;
use App\Models\HackSkills;
use App\Models\HeroCombat;
use App\Models\Heroes;
use App\Models\HeroHack;
use App\Models\Raise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RaiseController extends Controller
{
    public function index (Raise $raise) {

    $rise = Raise::with('Heroes','Users')->get();

        return Inertia::render('Raise/Index',[
            'raises' => $rise
        ]);
    }
    //принять

    public function accept(Request $request,Raise $raise){

        $app = $raise->app;
        $findcombat = CombatSkills::where('name','=',$app)->first();
        $findhack = HackSkills::where('name','=',$app)->first();
        $hero  = Heroes::where('hero_id','=',$raise->hero_id)->first();

        if($findcombat){
           $heroCombat =  HeroCombat::where('combat_skills_id','=',$findcombat->id)->get();
           $amount = $heroCombat->amount;
           $amount++;
            $heroCombat->update(['amount' => $amount]);
            $raise->update([
                'application' => true
            ]);
            return response()->json([
                'message' => 'Успешно'
            ]);
        }
        if($findhack){
            $heroHack =  HeroHack::where('hack_skills_id','=',$findhack->id)->get();
            $amount = $heroHack->amount;
            $amount++;
            $heroHack->update(['amount' => $amount]);
            $raise->update([
                'application' => true
            ]);
            return response()->json([
                'message' => 'Успешно'
            ]);
        }
        return response()->json([
            'message' => 'какое-то значение не передалось'
        ]);
    }


}
