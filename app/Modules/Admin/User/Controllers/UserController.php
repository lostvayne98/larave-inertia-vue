<?php

namespace App\Modules\Admin\User\Controllers;


use App\Modules\Admin\User\Controllers\Actions\UpdateHero\UpdateHeroInUserInterface;
use App\Services\CrudService\CrudInterface;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\User\Controllers\Actions\SetRole\SetRoleInterface;
use App\Modules\Admin\User\Filter\UserFilter;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\User\Requests\FilterRequest;
use App\Modules\Admin\User\Requests\StoreRequest;
use App\Modules\Admin\User\Requests\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserController extends Controller
{
    private $crud;

    public function __construct(CrudInterface $crud)
    {
        $this->crud = $crud;
    }

    public function index(FilterRequest $request): \Inertia\Response
    {
        $filter = app()->make(UserFilter::class,['queryParams' => array_filter($request->validated())]);

        $users = User::filter($filter)->role('user')->paginate(5);


        return Inertia::render('Admin/User/Index',[
            'users' => $users,
        ]);
    }


    public function create(): \Inertia\Response
    {
        $heroes = Heroes::query()->whereNull('user_id')->get();

        return Inertia::render('Admin/User/Create',
        [
            'heroes' => $heroes
        ]);
    }


    public function store(StoreRequest $request,User $user,SetRoleInterface $roleAction):RedirectResponse
    {
            //cоздание пользователя
           $model =  $this->crud->create($user,$request->validated());


            $roleAction->setRole($model,'user');

            return redirect()->route('users.index');

    }


    public function show(User $user): \Inertia\Response
    {

        $user =  $this->crud->read($user,$user->id);
        $user->load('hero');

        return Inertia::render('Admin/User/Show',[
           'user' => $user
        ]);
    }


    public function edit(User $user): \Inertia\Response
    {
        $heroes = Heroes::query()->whereNull('user_id')->get();
        return Inertia::render('Admin/User/Update',[
            'user' => $user,
            'heroes' => $heroes
        ]);
    }


    public function update(UpdateRequest $request, User $user,UpdateHeroInUserInterface $heroInUser):RedirectResponse
    {

        $this->crud->update($user,$request->validated());
        $heroInUser->updateHero($user,$request->hero_id);

        return redirect()->route('users.show',$user->id)->with([
            'message' => 'Успешно!'
        ]);
    }


    public function destroy(User $user):RedirectResponse
    {
        $this->crud->delete($user);
        return redirect()->route('users.index')->with(['message' => 'Успешно!']);
    }
}
