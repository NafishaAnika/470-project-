<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Blood Bank</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f7fa;
           margin: 0;
           padding: 0;
       }


       h1 {
           text-align: center;
           margin-top: 20px;
           color: #4CAF50;
       }


       .form-container {
           width: 40%;
           margin: 20px auto;
           background-color: #fff;
           padding: 20px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           border-radius: 8px;
       }


       label {
           font-size: 16px;
           font-weight: bold;
           margin-bottom: 10px;
           display: block;
       }


       input[type="text"], input[type="number"], input[type="date"], input[type="email"] {
           width: 100%;
           padding: 8px;
           margin-bottom: 10px;
           border: 1px solid #ddd;
           border-radius: 4px;
           font-size: 14px;
       }


       button {
           width: 100%;
           padding: 10px;
           background-color: #4CAF50;
           color: white;
           border: none;
           border-radius: 4px;
           font-size: 16px;
           cursor: pointer;
       }


       button:hover {
           background-color: #45a049;
       }


       .cancel-btn {
           background-color: #f44336;
       }


       .cancel-btn:hover {
           background-color: #e53935;
       }


   </style>
</head>
<body>


   <h1>Edit Blood Bank Information</h1>


   <div class="form-container">
       <form action="{{ route('bloodbank.update', $bloodBank->TYPE_ID) }}" method="POST">
           @csrf
           @method('PUT')


           <label for="Blood_Type">Blood Type</label>
           <input type="text" id="Blood_Type" name="Blood_Type" value="{{ $bloodBank->Blood_Type }}" required>


           <label for="Availability">Availability</label>
           <input type="text" id="Availability" name="Availability" value="{{ $bloodBank->Availability }}" required>


           <label for="Quantity">Quantity</label>
           <input type="number" id="Quantity" name="Quantity" value="{{ $bloodBank->Quantity }}" required>


           <label for="Contact_No">Contact No</label>
           <input type="text" id="Contact_No" name="Contact_No" value="{{ $bloodBank->Contact_No }}" required>


           <label for="Expiry_Date">Expiry Date</label>
           <input type="date" id="Expiry_Date" name="Expiry_Date" value="{{ $bloodBank->Expiry_Date }}" required>


           <label for="City">City</label>
           <input type="text" id="City" name="City" value="{{ $bloodBank->City }}" required>


           <label for="Email">Email</label>
           <input type="email" id="Email" name="Email" value="{{ $bloodBank->Email }}" required>


           <button type="submit">Update Blood Bank</button>
           <a href="{{ route('bloodbank') }}">
               <button type="button" class="cancel-btn">Cancel</button>
           </a>
       </form>
   </div>


</body>
</html>
