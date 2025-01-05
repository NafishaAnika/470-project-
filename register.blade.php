<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Bank Registration</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f7fa;
           margin: 0;
           padding: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
           flex-direction: column;
       }


       .registration-container {
           background-color: #fff;
           padding: 40px;
           border-radius: 8px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           width: 100%;
           max-width: 500px;
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


       input, select {
           width: 100%;
           padding: 10px;
           margin: 10px 0 20px 0;
           border: 1px solid #ddd;
           border-radius: 4px;
           font-size: 14px;
       }


       input:focus, select:focus {
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
   </style>
</head>
<body>
   <div class="registration-container">
       <h1>Blood Bank Registration</h1>


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


       <form method="POST" action="{{ route('bloodbank.register.submit') }}">
           @csrf


           <label for="blood_type">Blood Type:</label>
           <input type="text" id="blood_type" name="Blood_Type" value="{{ old('Blood_Type') }}" required>


           <label for="availability">Availability:</label>
           <select id="availability" name="Availability" required>
               <option value="Available">Available</option>
               <option value="Not Available">Not Available</option>
           </select>


           <label for="quantity">Quantity (in units):</label>
           <input type="number" id="quantity" name="Quantity" value="{{ old('Quantity') }}" min="0" required>


           <label for="city">City:</label>
           <input type="text" id="city" name="City" value="{{ old('City') }}" required>


           <label for="contact_no">Contact Number:</label>
           <input type="text" id="contact_no" name="Contact_No" value="{{ old('Contact_No') }}" required>


           <label for="expiry_date">Expiry Date:</label>
           <input type="date" id="expiry_date" name="Expiry_Date" value="{{ old('Expiry_Date') }}" required>


           <label for="email">Email:</label>
           <input type="email" id="email" name="Email" value="{{ old('Email') }}" required>


           <label for="password">Password:</label>
           <input type="password" id="password" name="Password" required>


           <button type="submit">Register</button>
       </form>
   </div>
</body>
</html>
