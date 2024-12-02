<?php
require '../../Database/database.php';
session_start();

if (isset($_POST['pick'])) {
    $booking_id = $_POST['booking_id'];
    $admin_id = $_POST['admin_id'];
    $client_id = $_POST['client_id'];
    $availability_id = $_POST['availability_id'];
    $user_id = $_POST['user_id'];
    // Echo the variables in a readable format
    $sql = "INSERT INTO `worker_ongoing`(`booking_id`, `admin_id`, `client_id`, `availability_id`, `worker_id`)
            VALUES ('$booking_id','$admin_id','$client_id','$availability_id','$user_id')";
    if(mysqli_query($conn , $sql)){
        $working_work_id =  mysqli_insert_id($conn);
    }
    $sql2 = "UPDATE worker_availability SET is_available='0' WHERE user_id= $user_id";
    $sql3 = "UPDATE service_booking SET booking_status='ongoing' , payment_status = 'delivery_payment' WHERE booking_id= $booking_id";
    $sql4 = "UPDATE kanban SET kanban_status='pick_up' WHERE booking_id= $booking_id";
     $notification = "INSERT INTO notification (message, `from`, user_id)
             VALUES ('Booking approved', 'payment approved', '$client_id')";

    
    $sql5 = "INSERT INTO `service_history`(`booking_id`, `working_id`)
            VALUES ('$booking_id','$working_work_id')";
             

    $result2 = mysqli_query($conn , $sql2);
    $result3 = mysqli_query($conn , $sql3);
    $result4 = mysqli_query($conn , $sql4);
    $result5 = mysqli_query($conn , $notification);
    $result6 = mysqli_query($conn , $sql5);

    if($result2 && $result3 && $result4 && $result5){
        echo json_encode(['success' => true,]);
    }else{
        echo json_encode(['success' => false, 'message' => 'Error in SQL']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error In function']);
}

// Close connection
$conn->close();
?>
