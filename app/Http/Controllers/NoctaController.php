<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoctaController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function games(){
        return view('games');
    }
}