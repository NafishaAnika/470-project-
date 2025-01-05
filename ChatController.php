<?php


namespace App\Http\Controllers;


use App\Models\Chat;
use App\Models\Donor;
use App\Models\Receiver;
use Illuminate\Http\Request;


class ChatController extends Controller
{
   /**
    * Show the chat interface between a donor and a receiver.
    *
    * @param  int  $donor_id
    * @param  int  $receiver_id
    * @return \Illuminate\View\View
    */
   public function create($donor_id, $receiver_id)
   {
       try {
           $donor = Donor::findOrFail($donor_id);
           $receiver = Receiver::findOrFail($receiver_id);
          
           $chats = Chat::where([
               ['donor_id', $donor_id],
               ['receiver_id', $receiver_id]
           ])->orderBy('created_at', 'asc')->get();


           return view('chat.create', compact('donor', 'receiver', 'chats'));
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Unable to start chat.');
       }
   }


   /**
    * Store a new message in the chat.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $donor_id
    * @param  int  $receiver_id
    * @return \Illuminate\Http\RedirectResponse
    */
   public function store(Request $request, $donor_id, $receiver_id)
   {
       try {
           $request->validate([
               'message' => 'required|string|max:1000',
           ]);


           Chat::create([
               'donor_id' => $donor_id,
               'receiver_id' => $receiver_id,
               'message' => $request->message,
           ]);


           return back()->with('success', 'Message sent successfully');
       } catch (\Exception $e) {
           return back()->with('error', 'Failed to send message.');
       }
   }


   /**
    * Show the chat interface between a donor and a receiver.
    *
    * @param  int  $donor_id
    * @param  int  $receiver_id
    * @return \Illuminate\View\View
    */
   public function show($donor_id, $receiver_id)
   {
       $donor = Donor::findOrFail($donor_id);
       $receiver = Receiver::findOrFail($receiver_id);
      
       $chats = Chat::where([
           ['donor_id', $donor_id],
           ['receiver_id', $receiver_id]
       ])->orderBy('created_at', 'asc')->get();


       return view('chat.show', compact('donor', 'receiver', 'chats'));
   }


   //Receiver chat
   public function index($receiver_id)
   {
       $receiver = Receiver::findOrFail($receiver_id);
       $chats = Chat::where('receiver_id', $receiver_id)->orWhere('donor_id', $receiver_id)->get();


       return view('chat.index', compact('receiver', 'chats'));
   }
   public function sendMessage(Request $request, $chatPartnerId)
{
   $request->validate([
       'message' => 'required|string|max:255',
   ]);


   // Get the authenticated user (either donor or receiver)
   $user = auth()->user();


   if (!$user) {
       return redirect()->route('donor.login')->with('error', 'Please log in to send a message.');
   }


   // Determine if the user is a donor or receiver
   $isDonor = $user instanceof Donor; // Check if the logged-in user is a Donor model
   $senderId = $user->id;


   try {
       // Save the chat message
       $chat = new Chat();
       if ($isDonor) {
           $chat->donor_id = $senderId; // Donor sending a message
           $chat->receiver_id = $chatPartnerId;
       } else {
           $chat->donor_id = $chatPartnerId; // Receiver sending a message
           $chat->receiver_id = $senderId;
       }
       $chat->message = $request->message;
       $chat->save();


       // Redirect back to the chat page
       return redirect()->route('chat.show', [
           'donorId' => $isDonor ? $senderId : $chatPartnerId,
           'receiverId' => $isDonor ? $chatPartnerId : $senderId,
       ])->with('success', 'Message sent successfully.');
   } catch (\Exception $e) {
       \Log::error('Error sending message: ' . $e->getMessage());
       return back()->with('error', 'Failed to send message.');
   }
}

}
