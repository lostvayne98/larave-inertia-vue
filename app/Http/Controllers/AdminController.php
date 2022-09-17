<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::role('admin')->get();

        return  Inertia::render('Admin/Index',[
            'admins' => $admins
        ]);
    }


    public function create()
    {
        return Inertia::render('Admin/Create');
    }


    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'password_admin' => $request->password,
            'hero_id' => $request->hero_id
        ]);


        $user->assignRole('admin');

        return redirect()->route('admins.index');
    }


    public function show(User $admin)
    {

        return Inertia::render('Admin/Show',[
            'admin' => $admin
        ]);
    }


    public function edit(User $admin)
    {

        return Inertia::render('Admin/Update',[
            'admin' => $admin
        ]);

    }


    public function update(Request $request,User $admin)
    {
        $admin->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'password_admin' => $request->password
        ]);
        return redirect()->route('admins.index');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
    }
}
