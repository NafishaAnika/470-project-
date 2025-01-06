<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Receiver Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Update Your Information</h1>

        <form action="{{ route('receiver.update', $receiver->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $receiver->name }}" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $receiver->email }}" required>

            <label for="blood_group">Blood Group</label>
            <input type="text" name="blood_group" id="blood_group" value="{{ $receiver->blood_group }}" required>

            <label for="area">Area</label>
            <input type="text" name="area" id="area" value="{{ $receiver->area }}" required>

            <label for="city">City</label>
            <input type="text" name="city" id="city" value="{{ $receiver->city }}" required>

            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" value="{{ $receiver->contact_number }}" required>

            <label for="need_at">Need Blood At</label>
            <input type="date" name="need_at" id="need_at" value="{{ $receiver->need_at }}" required>

            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
