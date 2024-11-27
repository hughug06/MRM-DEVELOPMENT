<?php 
require_once '../../Database/database.php';
session_start();

    $booking_id = isset($_POST['booking_id']) ? htmlspecialchars($_POST['booking_id']) : null;
    $user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
    $availability_id = isset($_POST['availability_id']) ? htmlspecialchars($_POST['availability_id']) : null;
    $reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : null;

    $checkrole = "SELECT role FROM accounts WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $checkrole);
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
        $updated_stocks = $currents_stocks + $quantity;
        $stock_update = "UPDATE products SET stock='$updated_stocks' WHERE ProductName = '$brand'";     
    } 
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
    $sql5 = "INSERT INTO notification (message, `from`, user_id)
             VALUES ('Booking rejected', 'payment checking', '$user_id')";
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)
    && mysqli_query($conn, $stock_update)) {
        echo json_encode(['success' => true, 'message' => 'SUCCESS']);
    }
    
} 
           

?>  