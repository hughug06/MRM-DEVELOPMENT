<?php 
require '../../../Database/database.php';

// $booking_id = $_POST['booking_id'];
// $reference_number = $_POST['reference_number'];
// $payment = $_POST['due_payment'];

// $upd = "update service_payment set second_reference = '$reference_number', second_payment = '$payment' where booking_id = '$booking_id'";

// $result = mysqli_query($conn ,$upd);


// echo json_encode(['success' => true]);
// // echo "SUCCESS";



// Validate if POST data exists
if (!isset($_POST['booking_id'], $_POST['reference_number'], $_POST['due_payment'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Required data is missing.'
    ]);
    exit;
}

// Extract data from POST
$booking_id = $_POST['booking_id'];
$reference_number = $_POST['reference_number'];
$payment = $_POST['due_payment'];

// Prepare the SQL query
$upd = "UPDATE service_payment 
        SET second_reference = '$reference_number', 
            second_payment = '$payment' 
        WHERE booking_id = '$booking_id'";

// Execute the query and handle success or error
if (mysqli_query($conn, $upd)) {
    echo json_encode([
        'success' => true,
        'message' => 'Payment updated successfully.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error updating payment: ' . mysqli_error($conn)
    ]);
}
?>