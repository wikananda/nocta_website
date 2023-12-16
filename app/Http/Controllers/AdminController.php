<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use App\Models\User;

class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function Dashboard(){
        $userCount = User::count();
        $testerCount = User::where('tester-game1', 1)
                            ->orWhere('tester-game2', 1)
                            ->count();
        $game1TesterCount = User::where('tester-game1', 1)->count();
        $game2TesterCount = User::where('tester-game2', 1)->count();
        $game1FeedbackCount = Feedback::where('game', 'Before Silence')->count();
        $game2FeedbackCount = Feedback::where('game', 'Gravity Jump')->count();
        $feedbackCount = Feedback::count();

        return view('admin.admin-dashboard', ['userCount' => $userCount, 
                                            'testerCount' => $testerCount,
                                            'game1TesterCount' => $game1TesterCount,
                                            'game2TesterCount' => $game2TesterCount,
                                            'feedbackCount' => $feedbackCount,
                                            'game1FeedbackCount' => $game1FeedbackCount,
                                            'game2FeedbackCount' => $game2FeedbackCount]);
    }

    public function Index(){
        return view('admin.admin-login');
    }

    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successfully');
        }else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Admin Logout Successfully');
    }

    public function showGameFeedbacks($game){
        $feedbacks = Feedback::where('game', $game)->get();
        return view('admin.admin-game-feedback', ['feedbacks' => $feedbacks, 'game' => $game]);
    }

}
