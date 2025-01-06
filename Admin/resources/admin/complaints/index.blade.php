<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Complaints Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
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

        header h1 {
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

        .container {
            width: 85%;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h2 {
            color: #2c3e50;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
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

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            table th, table td {
                font-size: 14px;
                padding: 10px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Complaints Dashboard</h1>
        <div class="header-buttons">
            <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
        </div>
    </header>

    <div class="container">
        <div class="section">
            <h2>List of Complaints</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Complainee</th>
                        <th>Complaint</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>{{ $complaint->receiver->name ?? 'N/A' }}</td>
                            <td>{{ $complaint->complaint_text }}</td>
                            <td>{{ $complaint->status }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('admin.complaint.view', $complaint->id) }}">View</a>
                                <form action="{{ route('admin.complaint.resolve', $complaint->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to resolve this complaint?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit">Resolve</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Admin Panel</p>
    </footer>

</body>
</html>
