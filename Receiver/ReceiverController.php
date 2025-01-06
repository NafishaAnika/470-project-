<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Receiver;
class ReceiverController extends Controller
{
    // Define the dashboard method
    public function dashboard()
    {
        // Retrieve the authenticated receiver's data
        $receiver = Auth::guard('receiver')->user(); // Fetch authenticated receiver
        
        // Pass the receiver data to the view
        return view('receiver.dashboard', compact('receiver'));
    }
    public function showRegisterForm()
    {
        return view('receiver.register');
    }
    
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:receivers,email',
            'password' => 'required|min:6|confirmed',
            'blood_group' => 'required|string|max:3',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'need_at' => 'required|date',
        ]);
    
        // Create a new receiver
        Receiver::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'blood_group' => $request->blood_group,
            'area' => $request->area,
            'city' => $request->city,
            'contact_number' => $request->contact_number,
            'need_at' => $request->need_at,
        ]);
    
        // Redirect to login or dashboard
        return redirect()->route('receiver.login')->with('success', 'Registration successful.');
    }

    public function edit($id)
    {
        $receiver = Receiver::findOrFail($id);
        return view('receiver.edit', compact('receiver'));
    }


    // Handle updating the receiver's data
    public function update(Request $request, $id)
    {
        $receiver = Receiver::findOrFail($id);
        $receiver->update($request->all());

        return redirect()->route('receiver.dashboard')->with('success', 'Information updated successfully.');
    }


    // Handle the deletion of the receiver's data
    public function destroy($id)
    {
        $receiver = Receiver::findOrFail($id);
        $receiver->delete();

        return redirect()->route('welcome')->with('success', 'Receiver removed successfully.');
    }
    public function logout()
    {
        // Log the user out
        Auth::logout();
    
        // Redirect to the welcome page
        return redirect()->route('welcome');
    }
    



}
