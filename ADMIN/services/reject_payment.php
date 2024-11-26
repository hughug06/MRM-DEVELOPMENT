<?php 
require_once '../../Database/database.php';

$booking_id = isset($_POST['booking_id']) ? htmlspecialchars($_POST['booking_id']) : null;
$user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
$availability_id = isset($_POST['availability_id']) ? htmlspecialchars($_POST['availability_id']) : null;
$reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : null;

 // Echo the variables


 
$sql = "UPDATE service_booking SET booking_status='canceled' WHERE booking_id='$booking_id'";
$sql2 = "insert into cancel_reason(booking_id , reason)
                             VALUES('$booking_id','$reason')";
$sql3 = "UPDATE service_count SET service_count='0' WHERE user_id='$user_id'";       
$sql4= "UPDATE service_availability SET is_available='1' WHERE availability_id='$availability_id'";                      

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) ) {
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