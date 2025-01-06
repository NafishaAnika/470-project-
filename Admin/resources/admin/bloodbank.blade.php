<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .header-buttons {
            display: flex;
            gap: 15px;
        }

        .header-buttons a,
        .header-buttons form button {
            padding: 10px 15px;
            background-color: #1abc9c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        .header-buttons a:hover,
        .header-buttons form button:hover {
            background-color: #16a085;
        }

        .logout-button {
            background-color: #e74c3c;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: left;
            }

            .container {
                width: 90%;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Blood Bank Information</h1>
        <!-- Navigation Buttons -->
        <div class="header-buttons">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.complaints') }}">Complaints</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <h2>Blood Bank Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Availability</th>
                    <th>Quantity</th>
                    <th>Contact Number</th>
                    <th>Expiry Date</th>
                    <th>City</th>
                    <th>Actions</th> <!-- Added a column for action buttons -->
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
                            <!-- Remove Button -->
                            <form action="{{ route('admin.removeBloodBank', ['TYPE_ID' => $bloodBank->TYPE_ID]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this blood bank?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-button">Remove</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2025 Admin Panel</p>
    </footer>

</body>
</html>