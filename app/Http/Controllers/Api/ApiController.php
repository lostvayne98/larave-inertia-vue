<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Heroes;
use App\Models\Raise;
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

        //Заявка на повышение
    public function apiSkill(Request $request){

        $user = Auth::user()->id;
        $hero =  Heroes::where('user_id','=',$user)->first();
        $id = $hero->id;
        Raise::create([
            'user_id' => $user,
            'hero_id' => $id,
            'description' => $request->description,
            'app' => $request->app,
            'application' => false
        ]);
    }


}
