<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Bank Login</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f7fa;
           margin: 0;
           padding: 0;
           padding-top: 50px; /* Adjust this to match the header height */
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
           flex-direction: column;
       }


       .header {
           width: 100%;
           background-color: #4CAF50;
           padding: 10px 0;
           text-align: center;
           position: fixed;
           top: 0;
           left: 0;
           margin: 0;
           z-index: 1000;
       }


       .header button {
           background-color: #fff;
           color: #4CAF50;
           padding: 10px 20px;
           border: 1px solid #4CAF50;
           border-radius: 4px;
           cursor: pointer;
           font-size: 16px;
           transition: background-color 0.3s;
       }


       .header button:hover {
           background-color: #45a049;
           color: white;
       }


       .main-container {
           display: flex;
           align-items: center;
           justify-content: center;
           background-color: #fff;
           padding: 40px;
           border-radius: 8px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           width: 100%;
           max-width: 800px;
       }


       .login-container {
           flex: 1;
           padding: 20px;
       }


       .logo-container {
           flex: 1;
           display: flex;
           justify-content: center;
           align-items: center;
       }


       .logo-container img {
           max-width: 100%;
           max-height: 200px;
       }


       h1 {
           text-align: center;
           margin-bottom: 30px;
           color: #4CAF50;
       }


       label {
           font-size: 14px;
           margin-bottom: 8px;
           display: block;
       }


       input[type="email"],
       input[type="password"] {
           width: 100%;
           padding: 10px;
           margin: 10px 0 20px 0;
           border: 1px solid #ddd;
           border-radius: 4px;
           font-size: 14px;
       }


       input[type="email"]:focus,
       input[type="password"]:focus {
           border-color: #4CAF50;
           outline: none;
       }


       button[type="submit"] {
           background-color: #4CAF50;
           color: white;
           width: 100%;
           padding: 12px;
           border: none;
           border-radius: 4px;
           font-size: 16px;
           cursor: pointer;
           transition: background-color 0.3s;
       }


       button[type="submit"]:hover {
           background-color: #45a049;
       }


       .error-messages {
           color: red;
           margin-bottom: 20px;
       }


       .error-messages ul {
           list-style-type: none;
           padding-left: 0;
       }


       .error-messages li {
           margin-bottom: 10px;
       }


       @media (max-width: 600px) {
           .main-container {
               flex-direction: column;
               padding: 20px;
           }


           .logo-container {
               margin-bottom: 20px;
           }


           h1 {
               font-size: 1.5rem;
           }
       }
   </style>
</head>
<body>
   <!-- Header Section -->
   <div class="header">
       <form action="{{ route('welcome') }}" method="GET">
           <button type="submit">Dashboard</button>
       </form>
   </div>
      
   <!-- Main Container -->
   <div class="main-container">
       <!-- Logo Section -->
       <div class="logo-container">
           <img src="{{ asset('images/bd3.jpg') }}" alt="Blood Bank Logo">
       </div>


       <!-- Login Form Section -->
       <div class="login-container">
           <h1>Blood Bank Login</h1>


           <!-- Display Validation Errors -->
           @if ($errors->any())
               <div class="error-messages">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif


           <form method="POST" action="{{ route('bloodbank.login.submit') }}">
               @csrf


               <div>
                   <label for="email">Email:</label>
                   <input type="email" id="email" name="email" value="{{ old('email') }}" required>
               </div>


               <div>
                   <label for="password">Password:</label>
                   <input type="password" id="password" name="password" required>
               </div>


               <button type="submit">Login</button>
               <p style="text-align: center; margin-top: 20px;">
                   Not a member yet? <a href="{{ route('bloodbank.register') }}" style="color: #4CAF50;">Register now!</a>
               </p>
           </form>
       </div>
   </div>
</body>
</html>


