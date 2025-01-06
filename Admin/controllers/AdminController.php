<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\BloodBank;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\Complaint;
class AdminController extends Controller
{
    // Show Admin Login Form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    // Handle Admin Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }

    // Dashboard to show donor list with search functionality
    public function dashboard(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $donors = Donor::where('name', 'LIKE', "%{$query}%")
                ->orWhere('blood_group', 'LIKE', "%{$query}%")
                ->orWhere('contact_number', 'LIKE', "%{$query}%")
                ->orWhere('city', 'LIKE', "%{$query}%")
                ->orWhere('area', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $donors = Donor::all();
        }

        return view('admin.dashboard', compact('donors'));
    }

    // Edit donor information
    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('admin.donoredit', compact('donor'));
    }

    // Handle the update of a donor's information
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255|regex:/^[\d\+\-\.\(\)\/\s]*$/',
            'email' => 'required|email|unique:donors,email,' . $id,
            'blood_group' => 'required|string|max:10',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'last_donated_date' => 'nullable|date',
        ]);
    
        // Find the donor by ID and update their information
        $donor = Donor::findOrFail($id);
        $donor->update([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'blood_group' => $request->blood_group,
            'area' => $request->area,
            'city' => $request->city,
            'last_donated_date' => $request->last_donated_date,
        ]);
    
        // Redirect to the donor list with success message
        return redirect()->route('admin.dashboard')->with('success', 'Donor information updated successfully.');
    }

    // Handle the deletion of a donor
    public function delete($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Donor deleted successfully.');
    }

    public function showComplaints()
    {
        $complaints = Complaint::all();  // Fetch all complaints
        return view('admin.complaints.index', compact('complaints'));
    }
    public function viewComplaint($id)
    {
         // Fetch the complaint
        $complaint = Complaint::findOrFail($id);

        // Return the view with the complaint data
        return view('admin.complaints.view', compact('complaint'));

    }

    public function resolveComplaint($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->status = 'Resolved';  // Update the complaint status to Resolved
        $complaint->save();

        return redirect()->route('admin.complaints')->with('success', 'Complaint resolved successfully');
    }

    public function bloodbank()
    {
        $bloodBanks = BloodBank::all(); // Adjust this as per your model and data fetching logic
        return view('admin.bloodbank', compact('bloodBanks'));
    }

    public function removeBloodBank($id)
    {
        // Find the blood bank by its ID and delete it
        $bloodBank = BloodBank::findOrFail($id);
        $bloodBank->delete();

        // Redirect back with a success message
        return redirect()->route('admin.bloodbank')->with('success', 'Blood bank removed successfully.');
    }

}
