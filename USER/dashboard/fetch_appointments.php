<?php
require_once '../../ADMIN/authetincation.php';
$userid = $_SESSION['account_id'];
// fetch_appointments.php

// Database connection
require_once '../../Database/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments from the database
$sql = "SELECT * FROM appointments where account_id = '$userid'";
$result = $conn->query($sql);
$appointments = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Skip appointments with status "canceled"
        if ($row['status'] === "Canceled") { // Ensure to use === for strict comparison
            continue; // Skip this iteration
        }
        
        // Add the appointment to the array if it's not canceled
        $appointments[] = [
            'title' => $row['service_type'], // Use only service_type as the title
            'start' => $row['date'],
            'end' => $row['date'],
            'extendedProps' => [ // Store other properties in extendedProps
                'location' => $row['location'],
                'brand' => $row['brand'],
                'product' => $row['product'],
                'power' => $row['power'],
                'running_hours' => $row['running_hours'],
                'status' => $row['status'],
                'worker_update' => $row['worker_update'],
                'date' => $row['date'],
                'start_time' => $row['start_time'], // Keep these for modal use
                'end_time' => $row['end_time'],
            ]
        ];
    }
}



// Return the appointments as a JSON array
echo json_encode($appointments);
$conn->close();
?>
