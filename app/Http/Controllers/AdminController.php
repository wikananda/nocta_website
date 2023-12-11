<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function index(){
        return view('admin.dashboard');
    }

    public function feedback(){
        return view('admin.feedback');
    }

    public function games(){
        return view('admin.games');
    }

}
