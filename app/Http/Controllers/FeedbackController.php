<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

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
}
