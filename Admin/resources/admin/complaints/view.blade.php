<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 70%;
            max-width: 600px;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        p strong {
            color: #34495e;
        }

        form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        .info {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Complaint Details</h2>
        <p class="info"><strong>Complainee: </strong>{{ $complaint->receiver->name ?? 'N/A' }}</p>
        <p class="info"><strong>Complaint Text: </strong>{{ $complaint->complaint_text }}</p>
        <p class="info"><strong>Status: </strong>{{ $complaint->status }}</p>
        
        <form action="{{ route('admin.complaint.resolve', $complaint->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to resolve this complaint?');">
            @csrf
            @method('PATCH')
            <button type="submit">Resolve Complaint</button>
        </form>
    </div>
</body>
</html>
