<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Feedback;
use App\Models\Reply;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $feedbacks = Feedback::where('user_id', $user->id)->get();
        
        $replies = collect();
        foreach ($feedbacks as $feedback)
        {
            $reply = Reply::where('feedback_id', $feedback->id)->get();
            $replies = $replies->concat($reply);
        }

        return view('profile.edit', [
            'user' => $user,
            'feedbacks' => $feedbacks,
            'replies' => $replies,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        $validated = $request->validated();
        unset($validated['password']);
        $request->user()->fill($validated);

        if ($request->filled('username')) {
            $request->user()->username = $request->username;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->filled('age')) {
            $request->user()->age = $request->age;
        }
    
        if ($request->filled('password')) {
            $request->user()->password = Hash::make($request->password);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
