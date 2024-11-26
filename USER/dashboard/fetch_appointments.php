<?php
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';

$userid = $_SESSION['user_id'];
echo $userid;
// Updated SQL query to join the relevant tables and select necessary columns
$sql_select = "SELECT service_booking.date, service_booking.start_time, service_booking.end_time, 
                      service_booking.booking_status, service_booking.payment_status, service_booking.payment,
                      user_info.first_name, user_info.pin_location
               FROM service_booking
               INNER JOIN user_info ON user_info.user_id = service_booking.user_id
               INNER JOIN service_availability ON service_availability.availability_id = service_booking.availability_id
               
               ";

$result = $conn->query($sql_select);
$appointments = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Skip appointments with canceled status
        if ($row['booking_status'] === 'canceled') {
            continue;
        }

        // Add the appointment to the array
        $appointments[] = [
            'title' => $row['first_name'] . " - " . $row['pin_location'], // Use first_name and pin_location as title
            'start' => $row['date'] . 'T' . $row['start_time'],  // Ensure proper formatting
            'end' => $row['date'] . 'T' . $row['end_time'],    // Ensure proper formatting
            'extendedProps' => [
                'first_name' => $row['first_name'],
                'pin_location' => $row['pin_location'],
                'date' => $row['date'],
                'start_time' => $row['start_time'],
                'end_time' => $row['end_time'],
                'payment_status' => $row['payment_status'],
                'booking_status' => $row['booking_status'],
                'payment' => $row['payment']
            ]
        ];
    }
}

// Return the appointments as a JSON array
echo json_encode($appointments);
$conn->close();
?>
