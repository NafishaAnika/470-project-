<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodbank Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Header styling */
        .header {
            background-color: #c0392b;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header a {
            text-decoration: none;
            color: white;
            background-color: #e74c3c;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #d62c1a;
        }

        /* Table and search bar styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #c0392b;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #search-bar {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Bloodbank Info</h1>
        <a href="{{ route('donor.dashboard') }}">Dashboard</a>
    </div>

    <!-- Search Bar -->
    <input
        type="text"
        id="search-bar"
        onkeyup="filterTable()"
        placeholder="Search for blood type, availability, city, etc..."
    >

    <!-- Table -->
    <table id="bloodbank-table">
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Availability</th>
                <th>Quantity</th>
                <th>Contact No</th>
                <th>Expiry Date</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bloodBanks as $bloodBank)
                <tr>
                    <td>{{ $bloodBank->Blood_Type }}</td>
                    <td>{{ $bloodBank->Availability }}</td>
                    <td>{{ $bloodBank->Quantity }}</td>
                    <td>{{ $bloodBank->Contact_No }}</td>
                    <td>{{ $bloodBank->Expiry_Date }}</td>
                    <td>{{ $bloodBank->City }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function filterTable() {
            const input = document.getElementById("search-bar");
            const filter = input.value.toLowerCase();
            const table = document.getElementById("bloodbank-table");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let found = false;
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j] && cells[j].innerText.toLowerCase().includes(filter)) {
                        found = true;
                        break;
                    }
                }
                rows[i].style.display = found ? "" : "none";
            }
        }
    </script>
</body>
</html>
