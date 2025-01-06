<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar styling */
        .sidenav {
            width: 250px;
            background-color: #c0392b;
            color: white;
            padding: 20px;
            position: fixed; 
            height: 100%;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidenav h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .sidenav a, .sidenav form {
            display: block;
            margin: 10px 0;
        }

        .sidenav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #e74c3c;
            transition: background-color 0.3s ease;
        }

        .sidenav a:hover {
            background-color: #d62c1a;
        }

        .sidenav form button {
            color: white;
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sidenav form button:hover {
            background-color: #d62c1a;
        }

        /* Main content */
        .main-content {
            margin-left: 250px; 
            padding: 20px;
            background-color:rgba(249, 249, 249, 0.32);
            flex: 1;
            height: 100%;
            overflow: auto;
            box-sizing: border-box;
        }

        .welcome-message {
            font-size: 18px;
            margin-top: 20px;
        }

        /* Adjust for body content */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: calc(100% - 300px); /* Ensures it doesn't go off the screen */
            margin-left: 30px;
        }

        .content-wrapper h1 {
            margin-top: 20px;
            font-size: 32px;
            font-weight: bold;
        }

        .content-wrapper p {
            font-size: 18px;
        }

        .content-wrapper p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidenav">
        <h2>Dashboard Menu</h2>
        <a href="{{ route('donors.edit') }}">Edit Profile</a>
        <a href="{{ route('donor.find_blood') }}">Find Blood Requests</a>
        <a href="{{ route('bloodbank.info') }}">Bloodbank</a>
        <form method="POST" action="{{ route('donor.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">
            <h1>Donor Dashboard</h1>
            <p class="welcome-message">Welcome, {{ $donor->name }}!</p>
            <p><strong>Last Donated Date:</strong> {{ $donor->last_donated_date ? $donor->last_donated_date->format('d M Y') : 'No donations yet' }}</p>
        </div>
    </div>
</body>
</html>
