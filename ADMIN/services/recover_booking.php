<?php
require_once '../../Database/database.php';

$payment_id = $_POST['payment_id'];
$booking_id = $_POST['booking_id'];
$new_reference = $_POST['new_reference_number'];
$user_id = $_POST['user_id'];

$service_booking = "SELECT * from service_booking where booking_id = '$booking_id'";
$booking_result = mysqli_query($conn , $service_booking);
$row_booking = mysqli_fetch_assoc($booking_result);
if($row_booking['is_custom_brand'] == 0){
    $updated_stocks = 0;
    $brand = $row_booking['brand'];
    $quantity = $row_booking['quantity'];
    $stock_current = "SELECT * from products where ProductName = '$brand'"; 
    $current_result = mysqli_query($conn , $stock_current);
    $current_row = mysqli_fetch_assoc($current_result);
    $currents_stocks = $current_row['stock'];
    $updated_stocks = $currents_stocks - $quantity;
    $stock_update = "UPDATE products SET stock='$updated_stocks' WHERE ProductName = '$brand'";     
} 

$sql1 = "update service_booking set booking_status = 'pending' where booking_id = '$booking_id'";
$sql2 = "update service_payment set first_reference = '$new_reference' where payment_id = '$payment_id'";
$sql3 = "update service_count set service_count = '1' where user_id = '$user_id'";
$sql4 = "INSERT INTO notification (message, `from`, user_id)
             VALUES ('book recover', 'from canceled status', '$user_id')";

if(mysqli_query($conn , $sql1) && mysqli_query($conn , $sql2) && mysqli_query($conn , $sql3) 
&& mysqli_query($conn , $sql4) && mysqli_query($conn , $stock_update)){
    header("Location: appointment.php");
    exit();
}
else{
    echo "failed";
}
?>