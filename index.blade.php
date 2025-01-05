<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Bank Dashboard</title>
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
      
       table {
           width: 80%;
           margin: 20px auto;
           border-collapse: collapse;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
       }
      
       th, td {
           padding: 12px;
           text-align: center;
           border: 1px solid #ddd;
       }


       th {
           background-color: #4CAF50;
           color: white;
       }


       tr:nth-child(even) {
           background-color: #f2f2f2;
       }


       tr:hover {
           background-color: #ddd;
       }


       td {
           font-size: 14px;
       }


       .update-btn {
           background-color: #4CAF50;
           color: white;
           padding: 6px 12px;
           border: none;
           border-radius: 4px;
           cursor: pointer;
       }


       .update-btn:hover {
           background-color: #45a049;
       }


       .logout-btn {
           background-color: #f44336;
           color: white;
           padding: 10px 20px;
           border: none;
           border-radius: 4px;
           cursor: pointer;
           margin: 20px auto;
           display: block;
           width: 200px;
           text-align: center;
       }


       .logout-btn:hover {
           background-color: #e53935;
       }
       .remove-button {
           background-color: #f44336; /* Red background */
           color: white;
           padding: 6px 12px;
           border: none;
           border-radius: 4px;
           cursor: pointer;
       }


       .remove-button:hover {
           background-color: #e53935; /* Darker red on hover */
       }
       /* Add responsiveness */
       @media (max-width: 768px) {
           table {
               width: 95%;
           }
           th, td {
               font-size: 12px;
               padding: 8px;
           }
       }
   </style>
</head>
<body>


   <h1>Welcome to the Blood Bank Dashboard</h1>


   <!-- Logout Button -->
   <<form action="{{ route('bloodbank.login') }}" method="GET">
       @csrf
       <button type="submit" class="logout-btn">Logout</button>
   </form>


   <table>
       <thead>
           <tr>
               <th>Blood Type</th>
               <th>Availability</th>
               <th>Quantity</th>
               <th>Contact No</th>
               <th>Expiry Date</th>
               <th>City</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($bloodBanks as $bloodBank)
               <tr>
                   <td>{{ $bloodBank->Blood_Type }}</td>
                   <td>{{ $bloodBank->Availability }}</td>
                   <td>{{ $bloodBank->Quantity }}</td>
                   <td>{{ $bloodBank->Contact_No }}</td>
                   <td>{{ $bloodBank->Expiry_Date }}</td>
                   <td>{{ $bloodBank->City }}</td>
                   <td>
                       <!-- Update Button Form -->
                       <form action="{{ route('bloodbank.edit', $bloodBank->TYPE_ID) }}" method="GET">
                           <button type="submit" class="update-btn">Update</button>
                       </form>
                  
                       <form action="{{ route('admin.removeBloodBank', ['TYPE_ID' => $bloodBank->TYPE_ID]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this blood bank?');">
                           @csrf
                           @method('DELETE') <!-- This tells Laravel it's a DELETE request -->
                           <button type="submit" class="remove-button">Remove</button>
                       </form>
                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>


</body>
</html>


