<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receiver Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 30px;
        }

        h1 {
            color: #c0392b;
            text-align: center;
        }

        table {
            width: 60%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 20px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e1e1e1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .logout-btn {
            background-color: #2ecc71;
        }

        .logout-btn:hover {
            background-color: #27ae60;
        }

        .messages-btn {
            background-color: #f39c12;
        }

        .messages-btn:hover {
            background-color: #e67e22;
        }
        .bank-btn {
            background-color:rgb(185, 114, 0);
        }

        .bank-btn:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to the Receiver Dashboard, {{ $receiver->name }}!</h1>

        <h3>Your Information:</h3>
        
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $receiver->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $receiver->email }}</td>
            </tr>
            <tr>
                <th>Blood Group</th>
                <td>{{ $receiver->blood_group }}</td>
            </tr>
            <tr>
                <th>Area</th>
                <td>{{ $receiver->area }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $receiver->city }}</td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td>{{ $receiver->contact_number }}</td>
            </tr>
            <tr>
                <th>Need Blood At</th>
                <td>{{ $receiver->need_at }}</td>
            </tr>
        </table>

        <!-- Buttons for Remove, Update, Messages, and Logout -->
        <a href="{{ route('receiver.edit', $receiver->id) }}" class="btn">Update</a>

        <form action="{{ route('receiver.remove', $receiver->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove</button>
        </form>

        <a href="{{ route('chat.index', ['receiver_id' => $receiver->id]) }}" class="btn messages-btn">Messages</a>
        <a href="{{ route('bloodbank.info')}}" class= "btn bank-btn">Bloodbank</a>
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn logout-btn">Logout</button>
        </form>
    </div>

</body>
</html>
