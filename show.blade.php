<!-- chat.show.blade.php -->
<div class="container">
   <h1>Chat with {{ $receiver->name }}</h1>
   <div class="chat-box">
       @foreach($chats as $chat)
           <p>
               <strong>
                   @if($chat->donor_id == auth()->id())
                       You
                   @else
                       {{ $receiver->name }}
                   @endif
               </strong>: {{ $chat->message }}
               <small>({{ $chat->created_at->format('M d, Y H:i') }})</small>
           </p>
       @endforeach
   </div>
   <form action="{{ route('chat.store', ['donor_id' => $donor_id, 'receiver_id' => $receiver_id]) }}" method="POST">
       @csrf
       <textarea name="message" required></textarea>
       <button type="submit">Send</button>
   </form>
</div>


<style>
   .container {
       max-width: 800px;
       margin: 0 auto;
       padding: 20px;
   }


   .chat-box {
       border: 1px solid #ddd;
       padding: 20px;
       margin-bottom: 20px;
       border-radius: 5px;
       max-height: 400px;
       overflow-y: auto;
   }


   .chat-box p {
       margin: 10px 0;
       padding: 10px;
       border-radius: 5px;
       background-color: #f5f5f5;
   }


   .chat-box strong {
       color: #2c3e50;
   }


   .chat-box small {
       color: #7f8c8d;
       margin-left: 10px;
       font-size: 0.8em;
   }


   form {
       display: flex;
       flex-direction: column;
       gap: 10px;
   }


   textarea {
       padding: 10px;
       border: 1px solid #ddd;
       border-radius: 5px;
       min-height: 80px;
   }


   button {
       padding: 10px 20px;
       background-color: #3498db;
       color: white;
       border: none;
       border-radius: 5px;
       cursor: pointer;
   }


   button:hover {
       background-color: #2980b9;
   }
</style>


