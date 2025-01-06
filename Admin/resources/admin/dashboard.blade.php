<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 30px;
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

        .container {
            width: 85%;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h2, .section h3 {
            color: #2c3e50;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #34495e;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons a,
        .action-buttons form button {
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

        .action-buttons a:hover,
        .action-buttons form button:hover {
            background-color: #16a085;
        }

        .action-buttons form button {
            background-color: #e74c3c;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .logout-button {
                margin-top: 10px;
            }

            table th, table td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Dashboard</h1>
        <div class="header-buttons">
            <!-- Complaint Button -->
            <a href="{{ route('admin.complaints') }}">Complaint</a>
            <!-- Blood Bank Button -->
            <a href="{{ route('admin.bloodbank') }}">Blood Bank</a>
            <!-- Logout Button -->
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <div class="section">
            <h2>Welcome to the Admin Dashboard</h2>
        </div>

        <div class="section">
            <h3>Blood Donor Management</h3>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Blood Group</th>
                        <th>Area</th>
                        <th>City</th>
                        <th>Last Donation Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($donors) && count($donors) > 0)
                        @foreach ($donors as $donor)
                            <tr>
                                <td>{{ $donor->id }}</td>
                                <td>{{ $donor->name }}</td>
                                <td>{{ $donor->contact_number }}</td>
                                <td>{{ $donor->email }}</td>
                                <td>{{ $donor->blood_group }}</td>
                                <td>{{ $donor->area }}</td>
                                <td>{{ $donor->city }}</td>
                                <td>{{ $donor->last_donated_date }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.donor.edit', $donor->id) }}">Edit</a>
                                    <form action="{{ route('admin.donor.delete', $donor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this donor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" style="text-align: center;">No donors found in the system.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Admin Panel</p>
    </footer>

</body>
</html>
