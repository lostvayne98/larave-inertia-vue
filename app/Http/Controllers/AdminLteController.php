<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
class AdminLteController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function Test(){
        return Inertia::render('Test',[
            'title' => 'Home'
        ]);


    }
 public function index()
 {

     return Inertia::render('Index',[
        'title' => 'Home'
     ]);


 }

}
