<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6e6; /* Soft red background */
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #e74c3c; /* Vibrant red */
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 26px;
            position: relative;
        }

        /* Left-aligned Home button */
        header a {
            position: absolute;
            left: 20px;
            top: 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .container img {
            max-width: 100%;
            border-radius: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #e74c3c; /* Red border */
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #e74c3c; /* Bold red */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #c0392b; /* Darker red on hover */
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #e74c3c; /* Red text for the link */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        Blood Donation Portal
        <a href="{{ route('welcome')}}">Dashboard</a>
    </header>
    <div class="container">
        <img src="{{ asset('images/bd4.jpg') }}" alt="Blood Bank Logo">
        <h2>Receiver Login</h2>
        <form method="POST" action="{{ url('receiver/login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <a href="{{ url('receiver/register') }}">Don't have an account? Register here</a><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>