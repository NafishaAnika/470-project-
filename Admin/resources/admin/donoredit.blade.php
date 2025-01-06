<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #34495e;
            color: white;
            padding: 20px;
            margin-bottom: 30px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 15px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #34495e;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #2c3e50;
        }

        a:hover {
            text-decoration: underline;
        }

        small {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <h1>Edit Donor Information</h1>
    
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Update Donor Form -->
    <form action="{{ route('admin.donor.update', $donor->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $donor->name) }}" required>
        </div>
        
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="contact_number" value="{{ old('contact_number', $donor->contact_number) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $donor->email) }}" required>
        </div>
        
        <div>
            <label for="blood_group">Blood Group:</label>
            <input type="text" name="blood_group" value="{{ old('blood_group', $donor->blood_group) }}" required>
        </div>
        
        <div>
            <label for="area">Area:</label>
            <input type="text" name="area" value="{{ old('area', $donor->area) }}" required>
        </div>

        <div>
            <label for="city">City:</label>
            <input type="text" name="city" value="{{ old('city', $donor->city) }}" required>
        </div>

        <div>
            <label for="last_donated_date">Last Donated Date:</label>
            <input type="text" name="last_donated_date" value="{{ old('last_donated_date', $donor->last_donated_date) }}" required>
            <small>Format: YYYY-MM-DD</small>
        </div>

        <button type="submit">Update Donor</button>
    </form>

    <a href="{{ route('admin.dashboard') }}">Back to Donor List</a>
</body>
</html>
