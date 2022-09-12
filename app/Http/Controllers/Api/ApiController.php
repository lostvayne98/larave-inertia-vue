<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Heroes;
use App\Models\Raise;
use App\Models\RaiseChar;
use App\Models\RaiseSkill;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function ApiUser (User $user)
    {
        if ($user->hero_id != null) {
             $user->Heroes()->first();

            return $user;
        }
        return   $user;
    }

        //Заявка на повышение кол-во скилла
    public function apiSkillAmount(Request $request){

        $user = Auth::user()->id;

        $hero =  Heroes::where('user_id','=',$user)->first();

        $app = 1;
        $id = $hero->id;
     $raise =   Raise::create([
         'user_id' => $user,
         'hero_id' => $id,
         'skill_amount' => $app,
         'description' => 'dfffff',
         'application' => 0
         /*   'user_id' => $user,
            'hero_id' => $id,
            'skill_amount' => $app,
            'description' => 'dfsdfsdfsgg',
            'application' => false*/
        ]);
     dd($raise);
        return response()->json(['message' => 'kek']);

    }
    //Заявка на повышение кол-ва характиристики
    public function apiChar(Request $request){
        $user = Auth::user()->id;
        $hero =  Heroes::where('user_id','=',$user)->first();
        $id = $hero->id;
        RaiseChar::create([
            'user_id' => $user,
            'hero_id' => $id,
            'description' => $request->description,
            'app' => $request->char,
            'application' => false
        ]);
    }

    public function apiSkill(Request $request){

        $user = Auth::user()->id;
        $hero =  Heroes::where('user_id','=',$user)->first();
        $id = $hero->id;
        RaiseSkill::create([
            'user_id' => $user,
            'hero_id' => $id,
            'description' => $request->description,
            'app' => $request->skill,
            'application' => false
        ]);
    }


}
