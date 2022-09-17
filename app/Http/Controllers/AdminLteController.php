<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class AdminLteController extends Controller
{

 public function index()
 {
    $user = Auth::user();
     return Inertia::render('Index',[
        'title' => 'Home',
         'user' => $user
     ]);


 }

}
