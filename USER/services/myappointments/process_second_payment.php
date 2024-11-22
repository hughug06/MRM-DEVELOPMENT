<?php 
require '../../../Database/database.php';

$booking_id = $_POST['booking_id'];
$reference_number = $_POST['reference_number'];
$payment = $_POST['due_payment'];

echo $booking_id;
echo $reference_number;
echo $payment;

$upd = "update service_payment set second_reference = '$reference_number', second_payment = '$payment' where booking_id = '$booking_id'";

$result = mysqli_query($conn ,$upd);


echo "SUCCESS";

?>