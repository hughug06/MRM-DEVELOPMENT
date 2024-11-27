<?php 
require '../../../Database/database.php';

// $booking_id = $_POST['booking'];
// $reference_number = $_POST['reference_number'];
// $payment = $_POST['due'];
//     $upd = "update service_payment set third_reference = '$reference_number', third_payment = '$payment' , date_done = CURRENT_DATE  where booking_id = '$booking_id'";
// $result = mysqli_query($conn ,$upd);

// echo json_encode(['success' => true]);
// // echo "SUCCESS";




// Validate if POST data exists
if (!isset($_POST['booking'], $_POST['reference_number'], $_POST['due'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Required data is missing.'
    ]);
    exit;
}

// Extract and sanitize POST data
$booking_id = $_POST['booking'];
$reference_number = $_POST['reference_number'];
$payment = $_POST['due'];

// Prepare the SQL query
$upd = "UPDATE service_payment 
        SET third_reference = '$reference_number', 
            third_payment = '$payment', 
            date_done = CURRENT_DATE  
        WHERE booking_id = '$booking_id'";

// Execute the query and respond with JSON
if (mysqli_query($conn, $upd)) {
    echo json_encode([
        'success' => true,
        'message' => 'Payment and completion date updated successfully.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error updating payment: ' . mysqli_error($conn)
    ]);
}
?>