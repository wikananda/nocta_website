<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateTester(Request $request, $gameId)
    {
        $user = $request->user();
        $gameColumn = 'tester-game' . $gameId;
    
        if ($user->$gameColumn == 0) {
            $user->$gameColumn = 1;
            $user->save();
            return back()->with('success', 'You become a tester!');
        } else {
            return back()->with('status', 'You are already a tester');
        }
    }
}
