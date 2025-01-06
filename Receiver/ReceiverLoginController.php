<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiverLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('receiver.login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Authentication logic
        if (auth()->guard('receiver')->attempt($request->only('email', 'password'))) {
            return redirect()->route('receiver.dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
