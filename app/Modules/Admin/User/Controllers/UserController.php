<?php

namespace App\Modules\Admin\User\Controllers;

use App\Modules\Admin\ActionsCRUD\DeleteAction;
use App\Modules\Admin\ActionsCRUD\StoreAction;
use App\Modules\Admin\ActionsCRUD\UpdateAction;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\User\Controllers\Actions\SetRoleAction;
use App\Modules\Admin\User\Filter\UserFilter;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\User\Requests\FilterRequest;
use App\Modules\Admin\User\Requests\StoreRequest;
use App\Modules\Admin\User\Requests\UpdateRequest;
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
            'users' => $users,
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


    public function store(StoreRequest $request,User $user,StoreAction $action,SetRoleAction $roleAction)
    {
            //cоздание пользователя

           $model =  $action->store($user,$request->validated());

            $roleAction->handle($model,'user');

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
        $heroes = Heroes::query()->whereNull('user_id')->get();
        return Inertia::render('Admin/User/Update',[
            'user' => $user,
            'heroes' => $heroes
        ]);
    }


    public function update(UpdateRequest $request, User $user,UpdateAction $action)
    {
        $action->update($user,$request->validated());

        return redirect()->route('users.show',$user->id)->with([
            'message' => 'Успешно!'
        ]);
    }


    public function destroy(User $user,DeleteAction $action)
    {
        $action->delete($user);
    }
}
