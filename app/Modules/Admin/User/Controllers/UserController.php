<?php

namespace App\Modules\Admin\User\Controllers;

use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\User\Controllers\Actions\StoreUsersAction;
use App\Modules\Admin\User\Filter\UserFilter;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\User\Requests\FilterRequest;
use App\Modules\Admin\User\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index(FilterRequest $request)
    {
        $filter = app()->make(UserFilter::class,['queryParams' => array_filter($request->validated())]);

        $users = User::filter($filter)->role('user')->paginate(5);

        return Inertia::render('Admin/User/Index',[
            'users' => $users
        ]);
    }


    public function create()
    {
        $heroes = Heroes::whereNull('user_id')->get();
        return Inertia::render('Admin/User/Create',
        [
            'heroes' => $heroes
        ]);
    }


    public function store(StoreRequest $request,StoreUsersAction $action)
    {
            //cоздание пользователя

            $action->handle($request->validated());

            return redirect()->route('users.index');

    }


    public function show(User $user)
    {
        return Inertia::render('Admin/User/Show',[
           'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
