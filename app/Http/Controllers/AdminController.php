<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Reply;

class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function Dashboard(){
        $userCount = User::count();
        $testerCount = User::where('tester_game1', 1)
                            ->orWhere('tester_game2', 1)
                            ->count();
        $game1TesterCount = User::where('tester_game1', 1)->count();
        $game2TesterCount = User::where('tester_game2', 1)->count();
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

    public function Details(){
        $users = User::all();
        $userCount = User::count();
        $testerCount = User::where('tester_game1', 1)
                            ->orWhere('tester_game2', 1)
                            ->count();
        $game1TesterCount = User::where('tester_game1', 1)->count();
        $game2TesterCount = User::where('tester_game2', 1)->count();
        $game1FeedbackCount = Feedback::where('game', 'Before Silence')->count();
        $game2FeedbackCount = Feedback::where('game', 'Gravity Jump')->count();
        $feedbackCount = Feedback::count();

        return view('admin.admin-details', ['users' => $users,
                                            'userCount' => $userCount, 
                                            'testerCount' => $testerCount,
                                            'game1TesterCount' => $game1TesterCount,
                                            'game2TesterCount' => $game2TesterCount,
                                            'feedbackCount' => $feedbackCount,
                                            'game1FeedbackCount' => $game1FeedbackCount,
                                            'game2FeedbackCount' => $game2FeedbackCount]);
    }

    public function UserDetails($id){
        $user = User::findOrFail($id);
        $feedbacks = Feedback::where('user_id', $id)->get();
        $replies = collect();

        foreach ($feedbacks as $feedback) {
            $repliesForFeedback = Reply::where('feedback_id', $feedback->id)->get();
            $replies = $replies->concat($repliesForFeedback);
        }
        return view('admin.admin-user-details', ['user' => $user, 'feedbacks' => $feedbacks, 'replies' => $replies]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.details')->with('success', 'User deleted successfully');
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
