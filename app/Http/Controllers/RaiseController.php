<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RaiseController extends Controller
{
    public function index () {

        return Inertia::render('Raise/Index',[

        ]);
    }
}
