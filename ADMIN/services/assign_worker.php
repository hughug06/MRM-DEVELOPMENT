<?php
require '../../Database/database.php';
session_start();

if (isset($_POST['pick'])) {
    $booking_id = $_POST['booking_id'];
    $admin_id = $_POST['admin_id'];
    $client_id = $_POST['client_id'];
    $availability_id = $_POST['availability_id'];
    $worker_id = $_POST['worker_id'];
    $account_id = $_POST['account_id'];
    // Echo the variables in a readable format
    $sql = "INSERT INTO `worker_ongoing`(`booking_id`, `admin_id`, `client_id`, `availability_id`, `worker_id`)
            VALUES ('$booking_id','$admin_id','$client_id','$availability_id','$worker_id')";
    $sql2 = "UPDATE worker_availability SET is_available='0' WHERE account_id= $account_id";
    $sql3 = "UPDATE service_booking SET booking_status='ongoing' , payment_status = 'delivery_payment' WHERE booking_id= $booking_id";
    $sql4 = "UPDATE kanban SET status='pick_up' WHERE booking_id= $booking_id";

    $result = mysqli_query($conn , $sql);
    $result2 = mysqli_query($conn , $sql2);
    $result3 = mysqli_query($conn , $sql3);
    $result4 = mysqli_query($conn , $sql4);


    echo "SUCCESS";
} else {
    echo "No data received.";
}

// Close connection
$conn->close();
?>
