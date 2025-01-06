<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        header {
            width: 100%;
            padding: 15px 30px;
            background-color: #2c3e50;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header .title {
            font-size: 24px;
            font-weight: 600;
        }

        header .dashboard-button {
            padding: 10px 15px;
            background-color: #16a085;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        header .dashboard-button:hover {
            background-color: #1abc9c;
        }

        .login-form {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            margin-top: 30px;
        }

        .login-form h1 {
            color: #2980b9;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .login-form button:hover {
            background-color: #2980b9;
        }

        .login-form a {
            text-decoration: none;
            color: #3498db;
            font-size: 14px;
        }

        .login-form a:hover {
            color: #2980b9;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .login-form {
                width: 90%;
            }

            header .title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="title">Admin Panel</div>
        <a href="{{ route('welcome') }}" class="dashboard-button">Dashboard</a>
    </header>

    <div class="login-form">
        <h1>Admin Login</h1>
        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
