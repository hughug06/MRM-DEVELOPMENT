<?php
// get_available_slots.php
require_once '../authetincation.php';
include '../../Database/database.php'; // Include your database connection



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_date = $_POST['appointment_date'];

    // Query to fetch available time slots for the selected date
    $sql = "SELECT 	availability_id , date , start_time, end_time
            FROM service_availability
            WHERE date = '$appointment_date' AND is_available = 1";
    $result = mysqli_query($conn, $sql);
   
    
    $slots = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row;
        }
    }
   
    // Return the available slots as a JSON response
    echo json_encode($slots);
}
?>
