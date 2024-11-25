<?php 
require '../../../Database/database.php';

$booking_id = $_POST['booking'];
$reference_number = $_POST['reference_number'];
$payment = $_POST['due'];
    $upd = "update service_payment set third_reference = '$reference_number', third_payment = '$payment' , date_done = CURRENT_DATE  where booking_id = '$booking_id'";
$result = mysqli_query($conn ,$upd);
echo "SUCCESS";

?>