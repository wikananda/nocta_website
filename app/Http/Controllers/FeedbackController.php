<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Reply;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'game' => 'required',
            'type' => 'required',
            'title' => 'required',
            'feedback' => 'required',
        ]);

        $feedback = new Feedback($validateData);
        $feedback->user_id = auth()->id();
        $feedback->save();

        return back()->with('success', 'Feedback submitted successfully');
    }

    public function reply(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $validateData = $request->validate([
            'title' => 'required',
            'reply' => 'required',
        ]);

        $reply = new Reply($validateData);
        $reply->feedback_id = $feedback->id;
        $reply->save();

        return back()->with('success', 'Reply sent successfully');
    }

    public function show($game, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $user = User::findOrFail($feedback->user_id);
        return view('admin.admin-feedback-view', ['feedback' => $feedback, 'game' => $game, 'user' => $user]);
    }
}