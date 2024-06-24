<!-- resources/views/attendance/bluetooth.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bluetooth Attendance System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Bluetooth Attendance System</h1>
        <div class="mt-3">
            <button id="checkInBtn" class="btn btn-primary">Check In</button>
            <button id="checkOutBtn" class="btn btn-secondary">Check Out</button>
        </div>
        <div id="status" class="mt-3"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/bluetooth.js') }}"></script> <!-- Include bluetooth.js -->
</body>
</html>
