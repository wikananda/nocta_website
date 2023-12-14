<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateTesterStatus(Request $request, $gameId)
    {
        $user = $request->user();
        if ($user->select('tester-game1') == 0 and $gameId == 1)
        {
            $user->select('tester-game1') = 1;
        }
        elseif ($user->select('tester-game2') == 0 and $gameId == 2)
        {
            $user->select('tester-game2') = 1;
        }
        else {
            return back()->with('status', 'You are already a tester');
        }
        return back()->with('success', 'You become a tester!');
    }
}
