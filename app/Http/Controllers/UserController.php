<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateHero;
use App\Models\HeroCombat;
use App\Models\Heroes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(){

            $users = User::orderByDesc('created_at')->CursorPaginate(5);

        return Inertia::render('Users/Index',[
            'title' => 'Пользователи',
            'users' => $users,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heroes = Heroes::where('user_id','=',null)->get();

        return Inertia::render('Users/Create',[
            'title' => 'Пользователи',
            'heroes' => $heroes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'password_admin' => $request->password,
            'hero_id' => $request->hero_id
        ]);


        $user->assignRole('player');


        if($user->hero_id    !=    null)  {
            $hero = Heroes::where('id','=',$user->hero_id)->first();
            $hero->update([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('users.index');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->hero_id != null){
        $hero =$user->Heroes()->first();

            // amount
            $hack = $hero->heroHack()->get();

            // amount
            $combat  =  $hero->heroCombat()->get();
            //название скилла
            $CSkills = $hero->CombatSkills()->get();
            //название скилла
            $HSkills = $hero->HackSkills()->get();

        return Inertia::render('Users/Show',[
            'title' => $user->name,
            'user' => $user,
            'hero' => $hero,
            'combatSkills' => $CSkills,
            'hackSkills' => $HSkills,
            'amountHacks' => $hack,
            'amountCombats' => $combat
        ]);

        }
        return Inertia::render('Users/Show',[
            'title' => $user->name,
            'user' => $user,
            ]);

    }

    public function updateAmountHack(Request $request,Heroes  $hero){
        $hero->heroHack()->update([
            'amount' => $request->amountHack
        ]);

    }
    public function updateAmountCombat(Request $request,HeroCombat $heroCombat){

     $com =   $heroCombat->amount;
     $sum = $com  ;
     $sum++;
        $heroCombat->update([
           'amount' => $sum
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $heroes = Heroes::where('user_id','=',null)->get();

        return Inertia::render('Users/Update',[
            'title' => $user->name,
            'user' => $user,
            'heroes' => $heroes
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {



        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'password_admin' => $request->password,
            'hero_id' => $request->hero_id
        ]);

       if($user->hero_id != null){

           $user->Heroes()->update([
               'user_id' => $user->id
           ]);

       }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();



    }
}
