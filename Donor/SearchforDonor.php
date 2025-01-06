<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            padding: 0;
            margin: 0;
        }

        header {
            background-color: #c0392b;
            color: white;
            padding: 15px 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 20px;
            padding: 5px 10px;
            background-color: #e74c3c;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        header a:hover {
            background-color: #b7322c;
        }

        .content {
            padding: 70px 50px 50px; /* Adjust padding to accommodate fixed header */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #c0392b;
            color: white;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar input {
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .search-bar button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <header>
        <h1>Blood Donation Portal</h1>
        <a href="{{ route('welcome') }}">Dashboard</a>
    </header>
    <div class="content">
        <h1>List of Donors</h1>
        <div class="search-bar">
            <form method="GET" action="{{ url('donors/search') }}">
                <input type="text" name="query" placeholder="Search by name, blood group, city, area, or contact" value="{{ request('query') }}">
                <button type="submit">Search</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Last Donated Date</th>
                    <th>Area</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donors as $donor)
                    <tr>
                        <td>{{ $donor->name }}</td>
                        <td>{{ $donor->blood_group }}</td>
                        <td>{{ $donor->contact_number }}</td>
                        <td>{{ $donor->email }}</td>
                        <td>{{ $donor->last_donated_date }}</td>
                        <td>{{ $donor->area }}</td>
                        <td>{{ $donor->city }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No donors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>