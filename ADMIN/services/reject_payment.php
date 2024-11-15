<?php 
require_once '../../Database/database.php';
$booking_id = $_POST['booking_id'];
$reason = $_POST['reason'];
echo $booking_id;

$sql = "UPDATE service_booking SET booking_status='canceled' WHERE booking_id='$booking_id'";
$sql2 = "insert into cancel_reason(booking_id , reason)
                             VALUES('$booking_id','$reason')";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
    // Add success alert or AJAX code here if needed
    header("Location: appointment.php");
    exit();
} else {
    // Optionally, log the error for debugging
    // echo "Error: " . mysqli_error($conn);

    // Add failure alert or AJAX code here if needed
    header("Location: appointment.php");
    exit();
}

?>  