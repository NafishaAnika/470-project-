<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Blood Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .header {
            background-color: #c0392b;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header .dashboard-btn {
            background-color: white;
            color: #c0392b;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .header .dashboard-btn:hover {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-btn {
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            background-color: #2980b9;
        }
        .contact-btn {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .contact-btn:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Blood Requests</h1>
        <a href="{{ route('donor.dashboard') }}" class="dashboard-btn">Dashboard</a>
    </div>

    <div class="container">
        @if($receivers->isEmpty())
            <p>No blood requests found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Blood Group</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>Need At</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receivers as $receiver)
                        <tr>
                            <td>{{ $receiver->name }}</td>
                            <td>{{ $receiver->blood_group }}</td>
                            <td>{{ $receiver->city }}</td>
                            <td>{{ $receiver->area }}</td>
                            <td>{{ $receiver->need_at }}</td>
                            <td>{{ $receiver->contact_number }}</td>
                            <td>
                                @auth('donor')
                                    <a href="{{ route('complaint.create', ['donor_id' => auth()->id(), 'receiver_id' => $receiver->id]) }}" 
                                       class="action-btn">Complain</a>
                                    <a href="{{ route('chat.create', ['donor_id' => auth()->id(), 'receiver_id' => $receiver->id]) }}" 
                                       class="contact-btn">Contact</a>
                                @else
                                    <p>Please log in to contact.</p>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
#