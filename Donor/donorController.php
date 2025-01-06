<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Receiver;


class DonorController extends Controller
{
    public function showDonor($id)
    {
        // Fetch donor details using the provided id
        $donor = Donor::findOrFail($id);

        // Pass donor data to the view
        return view('donor.profile', compact('donor'));
    }

    public function dashboard()
    {
        $donor = auth()->user(); // Retrieve the authenticated donor
        return view('donor.dashboard', compact('donor'));
    }

    // Show the form to edit the donor profile
    public function edit()
    {
        $donor = auth()->guard('donor')->user();
        if (!$donor) {
            return redirect()->route('donor.login');
        }
        return view('donor.edit', compact('donor'));
    }

    // Update the donor profile
    public function update(Request $request, $id)
    {
        $donor = auth()->guard('donor')->user();
        
        if (!$donor || $donor->id != $id) {
            return redirect()->route('donor.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:donors,email,' . $donor->id,
            'blood_group' => 'required|string|max:5',
            'contact_number' => 'required|string|max:15',
            'area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'last_donated_date' => 'required|date',
        ]);

        $donor->update($request->all());

        return redirect()->route('donor.dashboard')
            ->with('success', 'Profile updated successfully!');
    }


    public function showRegistrationForm()
    {
        return view('donor.register');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'blood_group' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
                'contact_number' => 'required|string|max:255|regex:/^[\d\+\-\.\(\)\/\s]*$/',
                'email' => 'required|email|max:255|unique:donors,email',
                'area' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'last_donated_date' => 'nullable|date',
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Encrypt password
            $validatedData['password'] = Hash::make($validatedData['password']);


            // Create a new donor record
            $donor = Donor::create($validatedData);

            if (!$donor) {
                throw new \Exception('Failed to create donor record');
            }

      

            // Redirect with success message
            return redirect()->back()->with('success', 'Registration successful!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again.')
                ->withInput();
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // If a search query exists, filter donors based on the query
        if ($query) {
            $donors = Donor::where('name', 'LIKE', "%{$query}%")
                ->orWhere('blood_group', 'LIKE', "%{$query}%")
                ->orWhere('contact_number', 'LIKE', "%{$query}%")
                ->orWhere('city', 'LIKE', "%{$query}%")
                ->orWhere('area', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // Otherwise, return all donors
            $donors = Donor::all();
        }

        return view('donors_search', compact('donors'));
    }

    

    public function findBloodRequests()
    {
        // Fetch all receivers who have made blood requests
        $receivers = Receiver::all(); // You can add filters if needed, e.g., based on blood group or location

        // Pass the data to the view
        return view('donor.find_blood_requests', compact('receivers'));
    }

}
