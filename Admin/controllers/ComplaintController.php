<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint; // Assuming you have a Complaint model

class ComplaintController extends Controller
{
    public function create($donor_id, $receiver_id)
    {
        return view('complaint_create', compact('donor_id', 'receiver_id'));
    }

    public function store(Request $request)
    {
        // Validate the complaint data
        $validated = $request->validate([
            'complaint_text' => 'required|string|max:1000',
            'donor_id' => 'required|exists:donors,id',
            'receiver_id' => 'required|exists:receivers,id',
        ]);

        // Store the complaint
        $complaint = new Complaint();
        $complaint->donor_id = $request->donor_id;
        $complaint->receiver_id = $request->receiver_id;
        $complaint->complaint_text = $request->complaint_text;
        $complaint->save();

        // Redirect back with a success message
        return redirect()->route('donor.find_blood', ['donor_id' => $request->donor_id, 'receiver_id' => $request->receiver_id])
                         ->with('status', 'Complaint submitted successfully!');
    }
}
