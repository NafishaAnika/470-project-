<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(182, 75, 75);
            color: #333;
            padding: 0;
            margin: 0;
        }

        h1 {
            color: #c0392b;
            font-size: 36px;
        }

        /* Navbar styles */
        .navbar {
            background-color: #c0392b;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #3498db;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #2980b9;
        }

        /* Adjust body content to not overlap with navbar */
        body {
            padding-top: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container to hold the form and image side by side */
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Form styles */
        .form-container {
            flex: 1;
            margin-right: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e74c3c;
        }

        .description {
            margin-bottom: 20px;
            color: #555;
        }

        .cta {
            margin-top: 15px;
            font-size: 16px;
        }

        .cta a {
            color: #3498db;
            text-decoration: none;
        }

        .cta a:hover {
            text-decoration: underline;
        }

        /* Image styles */
        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="{{ route('welcome') }}">Home</a>
    </div>

    <!-- Login Form -->
    <div class="container">
        <!-- Form Container -->
        <div class="form-container">
            <h1>Donor Login</h1>
            <p class="description">Welcome back! Log in to your donor account and help save lives.</p>

            <form action="{{ route('donor.login') }}" method="POST">
                @csrf
                <input type="text" name="email" placeholder="Enter your email" required><br>
                <input type="password" name="password" placeholder="Enter your password" required><br>
                <button type="submit">Login</button>
            </form>

            <div class="cta">
                <p>Don't have an account? <a href="{{ route('donor.register') }}">Sign up as a blood donor</a></p>
            </div>
        </div>

        <!-- Image Container -->
        <div class="image-container">
            <img src="{{ asset('images/bd5.jpg') }}" alt="Donor Logo">
        </div>
    </div>
</body>
</html>
