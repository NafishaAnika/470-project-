<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Chat with {{ $receiver->name }}</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f9f9f9;
           padding: 20px;
       }


       h2 {
           text-align: center;
           color: #c0392b;
       }


       .messages {
           max-width: 800px;
           margin: 20px auto;
           background-color: white;
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
           height: 400px;
           overflow-y: auto;
       }


       .message {
           background-color: #f2f2f2;
           padding: 10px;
           margin: 10px 0;
           border-radius: 5px;
           width: fit-content;
           max-width: 80%;
       }


       .message.donor {
           background-color: #3498db;
           color: white;
           margin-left: auto;
       }


       .message.receiver {
           background-color: #e74c3c;
           color: white;
           margin-right: auto;
       }


       .message strong {
           font-weight: bold;
           color: #333;
       }


       .message p {
           margin: 5px 0 0;
       }


       .back-btn {
           display: inline-block;
           background-color: #3498db;
           color: white;
           padding: 10px 20px;
           text-decoration: none;
           border-radius: 5px;
           margin: 20px 0;
           cursor: pointer;
       }


       .back-btn:hover {
           background-color: #2980b9;
       }


       .message-form {
           margin-top: 20px;
           display: flex;
           justify-content: space-between;
       }


       .message-form input {
           width: 80%;
           padding: 10px;
           border-radius: 5px;
           border: 1px solid #ccc;
       }


       .message-form button {
           background-color: #3498db;
           color: white;
           padding: 10px 20px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
       }


       .message-form button:hover {
           background-color: #2980b9;
       }
   </style>
</head>
<body>


   <h2>Chat with {{ $receiver->name }}</h2>


   <div class="messages">
       @foreach ($chats as $chat)
           <div class="message @if($chat->donor_id == auth()->user()->id) donor @else receiver @endif">
               <strong>{{ $chat->donor_id == auth()->user()->id ? 'You (Donor)' : $receiver->name . ' (Receiver)' }}:</strong>
               <p>{{ $chat->message }}</p>
           </div>
       @endforeach
   </div>


   <!-- Message form for the receiver -->
   <div class="message-form">
       <form action="{{ route('chat.send', ['receiverId' => $receiver->id]) }}" method="POST">
           @csrf
           <input type="text" name="message" placeholder="Type your message..." required>
           <button type="submit">Send</button>
       </form>
   </div>


   <!-- Back button -->
   <a href="{{ route('donor.find_blood') }}" class="back-btn">Back</a>


</body>
</html>
