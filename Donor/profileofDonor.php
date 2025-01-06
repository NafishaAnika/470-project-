<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Profile</title>
    <style>
        /* Add styles as needed */
    </style>
</head>
<body>
    <h1>Donor Profile</h1>

    <div>
        <p><strong>Name:</strong> {{ $donor->name }}</p>
        <p><strong>Email:</strong> {{ $donor->email }}</p>
        <p><strong>Blood Group:</strong> {{ $donor->blood_group }}</p>
        <p><strong>Contact Number:</strong> {{ $donor->contact_number }}</p>
        <p><strong>Area:</strong> {{ $donor->area }}</p>
        <p><strong>City:</strong> {{ $donor->city }}</p>
        <p><strong>Last Donated Date:</strong> {{ $donor->last_donated_date }}</p>
    </div>

    <a href="{{ route('donors.edit', $donor->id) }}">Edit Profile</a>
</body>
</html>
#