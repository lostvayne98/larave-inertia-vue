<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
class AdminLteController extends Controller
{

 public function index()
 {

     return Inertia::render('Index',[
        'title' => 'Home'
     ]);


 }

}
