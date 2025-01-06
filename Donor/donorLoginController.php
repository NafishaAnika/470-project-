<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DonorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('donor.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('donor')->attempt($credentials)) {
            // Redirect to donor dashboard or home page
            return redirect()->intended('donor/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::guard('donor')->logout(); // Log out the donor

        // Redirect to the login page or home page
        return redirect()->route('donor.login');
    }

}
