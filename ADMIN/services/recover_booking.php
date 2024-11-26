<?php
require_once '../../Database/database.php';

$payment_id = $_POST['payment_id'];
$booking_id = $_POST['booking_id'];
$new_reference = $_POST['new_reference_number'];


echo "<p><strong>Payment ID:</strong> $payment_id</p>";
echo "<p><strong>Booking ID:</strong> $booking_id</p>";
echo "<p><strong>New Reference Number:</strong> $new_reference</p>";

$sql1 = "update service_booking set booking_status = 'pending' where booking_id = '$booking_id'";
$sql2 = "update service_payment set first_reference = '$new_reference' where payment_id = '$payment_id'";

if(mysqli_query($conn , $sql1) && mysqli_query($conn , $sql2)){
    header("Location: appointment.php");
    exit();
}
else{
    echo "failed";
}
?>