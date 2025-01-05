<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chat with {{ $receiver->name }}</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f9f9f9;
           padding: 20px;
       }


       .container {
           max-width: 800px;
           margin: 0 auto;
           background-color: white;
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
       }


       .chat-header {
           background-color: #c0392b;
           color: white;
           padding: 10px;
           border-radius: 5px;
           margin-bottom: 20px;
       }


       .chat-header h2 {
           margin: 0;
       }


       .messages {
           max-height: 400px;
           overflow-y: auto;
           margin-bottom: 20px;
           padding-right: 10px;
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
           background-color:rgb(245, 240, 240);
           color: white;
           margin-right: auto;
       }


       .message-info {
           font-size: 0.8em;
           color:rgb(1, 8, 8);
           margin-bottom: 5px;
       }


       .message-input {
           width: 100%;
           padding: 10px;
           border-radius: 5px;
           border: 1px solid #ddd;
           margin-bottom: 10px;
       }


       .send-btn {
           background-color: #c0392b;
           color: white;
           padding: 10px 15px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
       }


       .send-btn:hover {
           background-color: #e74c3c;
       }


       .back-btn {
           background-color: #3498db;
           color: white;
           padding: 10px 15px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           margin-bottom: 20px;
       }


       .back-btn:hover {
           background-color: #2980b9;
       }
   </style>
</head>
<body>


<div class="container">
<button class="back-btn" onclick="window.location.href='{{ route('donor.find_blood') }}';">Back</button>




   <div class="chat-header">
       <h2>Chat with {{ $receiver->name }}</h2>
   </div>


   <div class="messages">
       @foreach ($chats as $chat)
           <div class="message @if($chat->donor_id == auth()->user()->id) donor @else receiver @endif">
               <!-- Display sender's name -->
               <div class="message-info">
                   @if($chat->donor_id == auth()->user()->id)
                       You (Donor)
                   @else
                       {{ $receiver->name }} (Receiver)
                   @endif
               </div>
               {{ $chat->message }}
           </div>
       @endforeach
   </div>


   <form action="{{ route('chat.store', ['donor_id' => auth()->user()->id, 'receiver_id' => $receiver->id]) }}" method="POST">
       @csrf
       <textarea name="message" class="message-input" placeholder="Type your message..." required></textarea>
       <button type="submit" class="send-btn">Send</button>
   </form>
</div>


</body>
</html>


