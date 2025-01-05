<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use Auth;
use App\Models\BloodBank;


class BloodBankController extends Controller
{
   public function index()
   {
       // Fetch all the bloodbank records
       $bloodBanks = BloodBank::all();


       // Pass the data to the view
       return view('bloodbank.index', compact('bloodBanks'));
   }


   public function showLoginForm()
   {
       return view('bloodbank.login'); // Create this login view
   }


   public function login(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);


       $bloodbank = BloodBank::where('Email', $request->email)->first();


       if ($bloodbank && Hash::check($request->password, $bloodbank->Password)) {
           // Login successful, redirect to dashboard or desired page
           return redirect()->route('bloodbank');
       } else {
           // Login failed, redirect back with error
           return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
       }
   }
   public function edit($id)
   {
       $bloodBank = BloodBank::where('TYPE_ID', $id)->firstOrFail();
       return view('bloodbank.edit', compact('bloodBank'));
   }


   public function update(Request $request, $id)
   {
       // Find the blood bank by TYPE_ID (or any other primary key column)
       $bloodBank = BloodBank::where('TYPE_ID', $id)->firstOrFail();


       // Validate the incoming data
       $request->validate([
           'Blood_Type' => 'required|string|max:10',
           'Availability' => 'required|string|max:20',
           'Quantity' => 'required|integer',
           'Contact_No' => 'required|string|max:15',
           'Expiry_Date' => 'required|date',
           'City' => 'required|string|max:255',
           'Email' => 'required|email|max:100',
       ]);


       // Manually assign each field to ensure proper update
       $bloodBank->Blood_Type = $request->Blood_Type;
       $bloodBank->Availability = $request->Availability;
       $bloodBank->Quantity = $request->Quantity;
       $bloodBank->Contact_No = $request->Contact_No;
       $bloodBank->Expiry_Date = $request->Expiry_Date;
       $bloodBank->City = $request->City;
       $bloodBank->Email = $request->Email;


       // Save the updated data
       $bloodBank->save();


       // Redirect back to the blood bank index page with a success message
       return redirect()->route('bloodbank')->with('success', 'Blood bank updated successfully!');
   }


   public function logout(Request $request)
   {
       // Log the user out
       Auth::logout();


       // Invalidate the session
       $request->session()->invalidate();


       // Regenerate the session token to prevent session fixation attacks
       $request->session()->regenerateToken();


       // Redirect the user to the login page
       return redirect()->route('bloodbank.login');
   }


   public function showRegistrationForm()
   {
       return view('bloodbank.register');
   }


   public function register(Request $request)
   {
       $request->validate([
           'Blood_Type' => 'required|string|max:255',
           'Availability' => 'required|string',
           'Quantity' => 'required|integer|min:0',
           'City' => 'required|string|max:255',
           'Contact_No' => 'required|string|max:20',
           'Expiry_Date' => 'required|date',
           'Email' => 'required|email|unique:bloodbank',
           'Password' => 'required|string|min:6',
       ]);


       \DB::table('bloodbank')->insert([
           'Blood_Type' => $request->Blood_Type,
           'Availability' => $request->Availability,
           'Quantity' => $request->Quantity,
           'City' => $request->City,
           'Contact_No' => $request->Contact_No,
           'Expiry_Date' => $request->Expiry_Date,
           'Email' => $request->Email,
           'Password' => bcrypt($request->Password),
           'created_at' => now(),
           'updated_at' => now(),
       ]);


       return redirect()->route('bloodbank.login')->with('success', 'Registration successful. Please log in.');
   }
   // BloodBankController.php


   public function removeBloodBank($id)
   {
       $bloodBank = BloodBank::findOrFail($id);
       $bloodBank->delete();


       // Redirect back with a success message
       return redirect()->route('bloodbank')->with('success', 'Blood bank removed successfully.');
   }
   public function showBloodbankInfo()
   {
       $bloodBanks = Bloodbank::all();
       // return view('donor.bloodbankinfo', ['bloodbanks' => $bloodbanks]);


       // Pass the data to the view
       return view('donor.bloodbankinfo', compact('bloodBanks'));
   }


}


