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

// Validate if the reference number already exists
$select = "SELECT * FROM service_payment WHERE first_reference = ? OR second_reference = ? OR third_reference = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, 'sss', $reference_number, $reference_number, $reference_number);
mysqli_stmt_execute($stmt);
$select_result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($select_result) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Reference number duplicate, please re-input'
    ]);
    exit;
}

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