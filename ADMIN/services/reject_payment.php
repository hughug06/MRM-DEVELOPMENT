<?php 
require_once '../../Database/database.php';
session_start();

    $booking_id = isset($_POST['booking_id']) ? htmlspecialchars($_POST['booking_id']) : null;
    $user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
    $availability_id = isset($_POST['availability_id']) ? htmlspecialchars($_POST['availability_id']) : null;
    $reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : null;

    $checkrole = "SELECT role FROM accounts WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $checkrole);

    if ($result) {
        // Check if any row is returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the role
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];

        }
    }
if($role=="agent"){
    $sql = "UPDATE service_booking SET booking_status='canceled' WHERE booking_id='$booking_id'";
    $sql2 = "insert into cancel_reason(booking_id , reason)
                                VALUES('$booking_id','$reason')";
    $sql3 = "UPDATE service_count SET service_count='0' WHERE user_id='$user_id'";       
    $sql4= "UPDATE service_availability SET is_available='1' WHERE availability_id='$availability_id'";   
    $sql5= "UPDATE kanban SET kanban_status='cancelled' WHERE booking_id='$booking_id'";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5) ) {
        echo json_encode(['success' => true, 'message' => 'SUCCESS']);
    }
}
else{
    $sql = "UPDATE service_booking SET booking_status='canceled' WHERE booking_id='$booking_id'";
    $sql2 = "insert into cancel_reason(booking_id , reason)
                                VALUES('$booking_id','$reason')";
    $sql3 = "UPDATE service_count SET service_count='0' WHERE user_id='$user_id'";       
    $sql4= "UPDATE service_availability SET is_available='1' WHERE availability_id='$availability_id'";   

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
        echo json_encode(['success' => true, 'message' => 'SUCCESS']);
    }
    
} 
           

?>  